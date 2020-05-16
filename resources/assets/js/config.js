const CONFIG = {
	XSRF_TOKEN: decodeURIComponent(document.cookie.replace(/(?:(?:^|.*;\s*)XSRF-TOKEN\s*\=\s*([^;]*).*$)|^.*$/, "$1")),
	PHOTO_URL: 'https://rubyherbs.cloud/',
	API_URL:'https://rubyherbs.cloud/api/',
	TAB_API:'https://rubyherbs.cloud/api/'+'maps',
	SLIDER_API:'https://rubyherbs.cloud/api/'+'sliders',
	SIDEBAR_API:'https://rubyherbs.cloud/api/'+'sidebars',
	DETAIL_API:'https://rubyherbs.cloud/api/'+'details'
}

export { CONFIG };