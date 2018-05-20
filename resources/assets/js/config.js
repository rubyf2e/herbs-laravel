const CONFIG = {
	XSRF_TOKEN: decodeURIComponent(document.cookie.replace(/(?:(?:^|.*;\s*)XSRF-TOKEN\s*\=\s*([^;]*).*$)|^.*$/, "$1")),
	PHOTO_URL: 'http://rubyherbs.dev.ddns.net/',
	API_URL:'http://rubyherbs.dev.ddns.net/api/',
	TAB_API:'http://rubyherbs.dev.ddns.net/api/'+'maps',
	SLIDER_API:'http://rubyherbs.dev.ddns.net/api/'+'sliders',
	SIDEBAR_API:'http://rubyherbs.dev.ddns.net/api/'+'sidebars',
	DETAIL_API:'http://rubyherbs.dev.ddns.net/api/'+'details'
}

export { CONFIG };