const CONFIG = {
	XSRF_TOKEN: decodeURIComponent(document.cookie.replace(/(?:(?:^|.*;\s*)XSRF-TOKEN\s*\=\s*([^;]*).*$)|^.*$/, "$1")),
	PHOTO_URL: 'http://127.0.0.1:8080/',
	API_URL:'http://127.0.0.1:8080/',
	TAB_API:'http://127.0.0.1:8080/'+'maps',
	SLIDER_API:'http://127.0.0.1:8080/'+'sliders',
	SIDEBAR_API:'http://127.0.0.1:8080/'+'sidebars',
	DETAIL_API:'http://127.0.0.1:8080/'+'details'
}

export { CONFIG };