/* global Backbone, jQuery, _, wp:true */
var oneApp = oneApp || {};

(function (window, Backbone, $, _, oneApp) {
	'use strict';

	oneApp.views = oneApp.views || {};

	oneApp.views.section = Backbone.View.extend({
		template: '',
		className: 'ttfmake-section',
		$headerTitle: '',
		$titleInput: '',
		$titlePipe: '',
		serverRendered: false,
		$document: $(window.document),
		$scrollHandle: $('html, body'),

		events: {
			'click .ttfmake-section-toggle': 'toggleSection',
			'click .ttfmake-section-remove': 'removeSection',
			'keyup .ttfmake-section-header-title-input': 'constructHeader',
			'click .ttfmake-media-uploader-add': 'onMediaAdd',
			'color-picker-change': 'onColorPickerChange',
			'click .ttfmake-overlay-open': 'openConfigurationOverlay',
			'click .ttfmake-overlay-close': 'closeConfigurationOverlay',
			'mediaSelected': 'onMediaSelected',
			'mediaRemoved': 'onMediaRemoved',
			'change .ttfmake-configuration-overlay input[type=text]' : 'updateInputField',
			'keyup .ttfmake-configuration-overlay input[type=text]' : 'updateInputField',
			'change .ttfmake-configuration-overlay input[type=checkbox]' : 'updateCheckbox',
			'change .ttfmake-configuration-overlay select': 'updateSelectField',
		},

		initialize: function (options) {
			this.template = _.template(ttfMakeSectionTemplates[this.model.get('section-type')], oneApp.builder.templateSettings);

			this.model.bind('change', function() {
				$('[name^="ttfmake-section-json"]', this.$el).val(JSON.stringify(this.model.toJSON()));
			}, this);
		},

		render: function () {
			var html = this.template(this.model);
			this.setElement(html);

			return this;
		},

		toggleSection: function (evt) {
			evt.preventDefault();

			var self = this;

			var $this = $(evt.target),
				$section = $this.parents('.ttfmake-section'),
				$sectionBody = $('.ttfmake-section-body', $section);

			if ($section.hasClass('ttfmake-section-open')) {
				$sectionBody.slideUp(oneApp.builder.options.closeSpeed, function() {
					$section.removeClass('ttfmake-section-open');
					self.model.set('state', 'closed');
				});
			} else {
				$sectionBody.slideDown(oneApp.builder.options.openSpeed, function() {
					$section.addClass('ttfmake-section-open');
					self.model.set('state', 'open');
				});
			}
		},

		removeSection: function (evt) {
			evt.preventDefault();

			// Confirm the action
			if (false === window.confirm(ttfmakeBuilderData.confirmString)) {
				return;
			}

			// Fade and slide out the section, then cleanup view and reset stage on complete
			this.$el.animate({
				opacity: 'toggle',
				height: 'toggle'
			}, oneApp.builder.options.closeSpeed, function() {
				oneApp.builder.sections.remove(this.model);
				this.remove();
				oneApp.builder.toggleStageClass();
				oneApp.builder.$el.trigger('afterSectionViewRemoved', this);
			}.bind(this));
		},

		constructHeader: function (evt) {
			if ('' === this.$headerTitle) {
				this.$headerTitle = $('.ttfmake-section-header-title', this.$el);
			}

			if ('' === this.$titleInput) {
				this.$titleInput = $('.ttfmake-section-header-title-input', this.$el);
			}

			if ('' === this.$titlePipe) {
				this.$titlePipe = $('.ttfmake-section-header-pipe', this.$el);
			}

			var input = this.$titleInput.val();

			// Set the input
			this.$headerTitle.html(_.escape(input));

			// Hide or show the pipe depending on what content is available
			if ('' === input) {
				this.$titlePipe.addClass('ttfmake-section-header-pipe-hidden');
			} else {
				this.$titlePipe.removeClass('ttfmake-section-header-pipe-hidden');
			}
		},

		onMediaAdd: function(e) {
			e.preventDefault();
			e.stopPropagation();

			oneApp.builder.initUploader(this, e.target);
		},

		onMediaSelected: function(e, attachment) {
			this.model.set('background-image', attachment.id);
			this.model.set('background-image-url', attachment.url);
		},

		onMediaRemoved: function(e) {
			e.stopPropagation();

			this.model.unset('background-image');
			this.model.unset('background-image-url');
		},

		openConfigurationOverlay: function (evt) {
			evt.preventDefault();

			var self = this,
				$this = $(evt.target),
				$overlay = $($this.attr('data-overlay')),
				$wrapper = $('.ttfmake-overlay-wrapper', $overlay);

			$overlay.show(1, function() {
				$('.wp-color-result', $overlay).click().off('click');
				$( 'body' ).off( 'click.wpcolorpicker' );
				self.setSize($overlay, $wrapper);
				$overlay.find('input,select').filter(':first').focus();
			});

			oneApp.builder.initColorPicker(this);
		},

		onColorPickerChange: function(evt, data) {
			if (data) {
				this.model.set(data.modelAttr, data.color);
			}
		},

		setSize: function($overlay, $wrapper) {
			var $body = $('.ttfmake-overlay-body', $wrapper),
				bodyHeight = $body.height(),
				wrapperHeight;

			wrapperHeight =
				parseInt(bodyHeight, 10) + // Body height
					20 + // Bottom padding
					30 + // Button height
					37; // Header height

			$wrapper
				.height(wrapperHeight)
				.css({
					'margin-top': -1 * parseInt(wrapperHeight/2, 10) + 'px'
				})
		},

		closeConfigurationOverlay: function (evt) {
			evt.preventDefault();

			var $this = $(evt.target),
				$overlay = $this.parents('.ttfmake-overlay');

			$overlay.hide();
		},

		updateInputField: function(evt) {
			var $input				= $(evt.target);
			var modelAttrName = $input.attr('data-model-attr');

			if (typeof modelAttrName !== 'undefined') {
				this.model.set(modelAttrName, $input.val());
			}
		},

		updateCheckbox: function(evt) {
			var $checkbox = $(evt.target);
			var modelAttrName = $checkbox.attr('data-model-attr');

			if (typeof modelAttrName !== 'undefined') {
				if ($checkbox.is(':checked')) {
					this.model.set(modelAttrName, 1);
				} else {
					this.model.set(modelAttrName, 0);
				}
			}
		},

		updateSelectField: function(evt) {
			var $select = $(evt.target);
			var modelAttrName = $select.attr('data-model-attr');

			if (typeof modelAttrName !== 'undefined') {
				this.model.set(modelAttrName, $select.val());
			}
		}
	});
})(window, Backbone, jQuery, _, oneApp);
