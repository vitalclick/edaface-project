

export default class HSFileAttach {
	constructor(elem, settings) {
		this.elem = elem;
		this.defaults = {
			textTarget: null,
			maxFileSize: 1024, // Infinity - off file size detection
			errorMessage: 'File is too big!',
			mode: 'simple',
			targetAttr: null
		};
		this.settings = settings;
	}
	
	init() {
		const context = this,
			$el = context.elem,
			dataSettings = $el.attr('data-hs-file-attach-options') ? JSON.parse($el.attr('data-hs-file-attach-options')) : {},
			options = Object.assign({}, context.defaults, dataSettings, context.settings);
		
		let $target = $(options.textTarget);
		
		$el.on('change', function () {
			if ($el.val() === '') {
				return;
			}
			
			if (this.files[0].size > (options.maxFileSize * 1024)) {
				alert(options.errorMessage);
				
				return;
			}
			
			if (options.mode === 'image') {
				context._image($el, $target, options);
			} else {
				context._simple($el, $target);
			}
		});
	}
	
	_simple(el, target) {
		target.text(el.val().replace(/.+[\\\/]/, ''));
	}
	
	_image(el, target, settings) {
		let reader;
		
		if (el[0].files && el[0].files[0]) {
			reader = new FileReader();
			
			reader.onload = function (e) {
				target.attr(settings.targetAttr, e.target.result);
			};
			
			reader.readAsDataURL(el[0].files[0]);
		}
	}
}
