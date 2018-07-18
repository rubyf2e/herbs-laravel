const CONFIG = {
	XSRF_TOKEN: decodeURIComponent(document.cookie.replace(/(?:(?:^|.*;\s*)XSRF-TOKEN\s*\=\s*([^;]*).*$)|^.*$/, "$1")),
	PHOTO_URL: 'https://rubyherbs.ddns.net/',
	API_URL:'https://rubyherbs.ddns.net/api/',
	TAB_API:'https://rubyherbs.ddns.net/api/'+'maps',
	SLIDER_API:'https://rubyherbs.ddns.net/api/'+'sliders',
	SIDEBAR_API:'https://rubyherbs.ddns.net/api/'+'sidebars',
	DETAIL_API:'https://rubyherbs.ddns.net/api/'+'details'
}

export { CONFIG };