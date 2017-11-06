/* global Backbone, jQuery, _ */
var oneApp = oneApp || {};

(function (window, Backbone, $, _, oneApp) {
	'use strict';

	oneApp.views = oneApp.views || {}

	oneApp.views['text-item'] = oneApp.views.item.extend({
		el: '',
		elSelector: '',
		className: 'ttfmake-text-column',

		events: function() {
			return _.extend({}, oneApp.views.item.prototype.events, {
				'click .ttfmake-media-uploader-add': 'onMediaOpen',
				'overlayClose': 'onOverlayClose'
			});
		},

		render: function () {
			this.$el.attr('data-model-id', this.model.get('id'));

			return this;
		},

		onOverlayClose: function(e, textarea) {
			e.stopPropagation();

			this.model.set('content', $(textarea).val());
			this.$el.trigger('model-item-change');
		}
	});
})(window, Backbone, jQuery, _, oneApp);
