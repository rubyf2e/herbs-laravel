 <template>
  <div class="mobile-nav mobile">
    <nav class="menu">
      <input type="checkbox" href="#" class="menu-open" name="menu-open" id="menu-open" @click="toggleCheck"/>
      <label class="menu-open-button" for="menu-open">
       <object v-show="navState" :data="this.$conf.PHOTO_URL+'images/svg/013-close.svg'" type="image/svg+xml" id="close">
       </object>
       <object v-show="!navState" :data="this.$conf.PHOTO_URL+'images/svg/013-settings.svg'" type="image/svg+xml" id="settings">
       </object>
       <span class="hamburger hamburger-1"></span>
     </label>

     <a v-for="item in this.list" class="menu-item" @click="goAnchor(item.url);">
      <img :src="$conf.PHOTO_URL+item.src"></a>

      <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="0" height="0">
        <defs>
          <filter id="shadowed-goo">

            <feGaussianBlur in="SourceGraphic" result="blur" stdDeviation="10" />
            <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="goo" />
            <feGaussianBlur in="goo" stdDeviation="3" result="shadow" />
            <feColorMatrix in="shadow" mode="matrix" values="0 0 0 0 0  0 0 0 0 0  0 0 0 0 0  0 0 0 1 -0.2" result="shadow" />
            <feOffset in="shadow" dx="1" dy="1" result="shadow" />
            <feBlend in2="shadow" in="goo" result="goo" />
            <feBlend in2="goo" in="SourceGraphic" result="mix" />
          </filter>
          <filter id="goo">
            <feGaussianBlur in="SourceGraphic" result="blur" stdDeviation="10" />
            <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="goo" />
            <feBlend in2="goo" in="SourceGraphic" result="mix" />
          </filter>
        </defs>
      </svg>
    </nav>



  </div>
</template>

<script>
import Vue from 'Vue';

export default {
  name: 'mobile-memu',
  data(){
    return {
      navState:false,
      settingStyle:'rotate(0 140 105)',
      settingDeg:0,
      list:[]
    }
  },
  created() {
    this.$bus.$on('navbar-memu', value => {
      this.list = value;
    });
  },
  mounted() {
  },
  watch: {
  },
  methods: {
    run(){
      if($(window).width()<768){
       this.settingDeg++;
       this.settingStyle = 'rotate('+this.settingDeg+'  256 256)';
       this.settingDeg   = (this.settingDeg === 360) ? 0 : this.settingDeg;
       this.runtarget(); 
     }
   },
   runtarget(){
    var settingrun =  document.querySelectorAll(".settingrun");
    for (var i = 0; i < settingrun.length; i++) {
      settingrun[i].setAttribute('transform',this.settingStyle);
    }
  },
  toggleCheck(){
    this.navState = !this.navState;
  },
  getElementTop(element){
    var navbarheight = 0;
    var actualTop    = element.offsetTop;
    var current      = element.offsetParent;
    while (current !== null){
      actualTop += current.offsetTop;
      current = current.offsetParent;
    }
    return actualTop-navbarheight;
  },
  goAnchor(target){
    var distance = this.getElementTop(document.getElementById(target));
    $('#app').animate({scrollTop:distance}, 800); 
  }
},
render() {
  return true;
}
}


</script>