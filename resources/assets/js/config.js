const CONFIG = {
	XSRF_TOKEN: decodeURIComponent(document.cookie.replace(/(?:(?:^|.*;\s*)XSRF-TOKEN\s*\=\s*([^;]*).*$)|^.*$/, "$1")),
	PHOTO_URL: 'http://rubyherbs.ddns.net/api/',
	API_URL:'http://rubyherbs.ddns.net/api/',
	TAB_API:'http://rubyherbs.ddns.net/api/'+'maps',
	SLIDER_API:'http://rubyherbs.ddns.net/api/'+'sliders',
	SIDEBAR_API:'http://rubyherbs.ddns.net/api/'+'sidebars',
	DETAIL_API:'http://rubyherbs.ddns.net/api/'+'details'
}

export { CONFIG };