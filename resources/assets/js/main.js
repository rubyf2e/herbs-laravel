import Vue from 'vue';
import VueAwesomeSwiper from 'vue-awesome-swiper'
import vueResource from 'vue-resource'
import * as VueGoogleMaps from 'vue2-google-maps';
import eventBus from './eventBus';
import hamburger from './components/Navbar/hamburger.vue';
import slider from './components/slider.vue';
import detail from './components/detail.vue';
import detailswiper from './components/detailswiper.vue';
import tab from './components/tab.vue';
import sun from './components/sun.vue';
import cloud from './components/cloud.vue';
import gmapmap from './components/gmapmap.vue';
import vuefooter from './components/vuefooter.vue';
import sidebar from './components/Navbar/sidebar.vue';
import tree from './components/tree.vue';
import { CONFIG as SiteConfig } from './config'

Vue.use(VueAwesomeSwiper);
Vue.use(vueResource);
Object.defineProperty(Vue.prototype, '$conf', { value: SiteConfig });

let app = new Vue({
	el: '#app',
	components: {
		tree,
		sun,
		cloud,
		hamburger,
		slider,
		detail,
		gmapmap,
		tab,
		detailswiper,
		vuefooter,
		sidebar
	},
	data() {
		return {
			bus: eventBus
		}
	}
});
