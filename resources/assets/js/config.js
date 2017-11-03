const CONFIG = {
	XSRF_TOKEN: decodeURIComponent(document.cookie.replace(/(?:(?:^|.*;\s*)XSRF-TOKEN\s*\=\s*([^;]*).*$)|^.*$/, "$1")),
	PHOTO_URL: 'http://rubyherbs.ddns.net/',
	API_URL:'http://rubyherbs.ddns.net/',
	TAB_API:'http://rubyherbs.ddns.net/'+'maps',
	SLIDER_API:'http://rubyherbs.ddns.net/'+'sliders',
	SIDEBAR_API:'http://rubyherbs.ddns.net/'+'sidebars',
	DETAIL_API:'http://rubyherbs.ddns.net/'+'details'
}

export { CONFIG };