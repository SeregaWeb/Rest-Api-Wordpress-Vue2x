import Popup from './modules/popup-window.js';
import {equalHeights_inrow} from './modules/helpers.js';
import {tabsNavigation} from './modules/navi-tabs.js';

;(function($){

$(document).ready(function(){

	const $HTML                 = $('html');
	const $BODY                 = $('body');
	const $BODY_HTML            = $('body, html');

	window.onload = function(){

		// Example
		const popup_instance = new Popup();
		popup_instance.init();

		// Example
		equalHeights_inrow('.boxs');

		// Example
		tabsNavigation('.tab-container .switchers button', '.panels .panel');

	};


});

})(jQuery);




