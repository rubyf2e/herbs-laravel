const CONFIG = {
	XSRF_TOKEN: decodeURIComponent(document.cookie.replace(/(?:(?:^|.*;\s*)XSRF-TOKEN\s*\=\s*([^;]*).*$)|^.*$/, "$1")),
	PHOTO_URL: 'https://rubyworks.site/herbs-laravel/public/',
	API_URL:'https://rubyworks.site/herbs-laravel/public/api/',
	TAB_API:'https://rubyworks.site/herbs-laravel/public/api/'+'maps',
	SLIDER_API:'https://rubyworks.site/herbs-laravel/public/api/'+'sliders',
	SIDEBAR_API:'https://rubyworks.site/herbs-laravel/public/api/'+'sidebars',
	DETAIL_API:'https://rubyworks.site/herbs-laravel/public/api/'+'details'
}

export { CONFIG };