/* global Backbone, jQuery, _ */
var oneApp = oneApp || {};

(function (window, Backbone, $, _, oneApp) {
	'use strict';

	oneApp.views = oneApp.views || {}

	oneApp.views['gallery-item'] = oneApp.views.item.extend({
		events: function() {
			return _.extend({}, oneApp.views.item.prototype.events, {
				'click .ttfmake-gallery-item-remove': 'onItemRemove',
				'overlayClose': 'onOverlayClose',
			});
		},

		initialize: function (options) {
			this.template = _.template(ttfMakeSectionTemplates['gallery-item'], oneApp.builder.templateSettings);
		},

		render: function () {
			var html = this.template(this.model)
			this.setElement(html);

			return this;
		},

		onOverlayClose: function(e, textarea) {
			e.stopPropagation();

			this.model.set('description', $(textarea).val());
			this.$el.trigger('model-item-change');
		},

		onItemRemove: function (evt) {
			evt.preventDefault();

			var $stage = this.$el.parents('.ttfmake-gallery-items'),
				$orderInput = $('.ttfmake-gallery-item-order', $stage);

			// Fade and slide out the section, then cleanup view
			this.$el.animate({
				opacity: 'toggle',
				height: 'toggle'
			}, oneApp.builder.options.closeSpeed, function() {
				this.$el.trigger('item-remove', this);
				this.remove();
			}.bind(this));
		}
	});
})(window, Backbone, jQuery, _, oneApp);