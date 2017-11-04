<template>
  <div class="container slide">
    <swiper :options="swiperOption" ref="sliderSwiper">
      <swiper-slide v-for="(slide, n) in list" :key="'slide'+n" :index="slide.id"  :data-now="slide.id"  
      v-bind:style="{'background-image': 'url(' +$conf.PHOTO_URL+slide.src + ')'}">
    </swiper-slide> 
    <div class="swiper-pagination" slot="pagination"></div>
  </swiper>

  <div class="mask">
    <object id="words" :data="this.$conf.PHOTO_URL+'images/svg/title.svg'" type="image/svg+xml">
    </object>
  </div>

</div>
</template>
<script>
import { swiper, swiperSlide } from 'vue-awesome-swiper'
import {TweenMax, Power2, TimelineLite} from "gsap";

export default {
  name: 'plant',
  data() {
    return {
      show:true,
      now:0,
      targetSvg:null,
      target:null,
      targetPath:null,
      changeTarget: -1,
      count:0,
      tabSelected:1,
      visible: false,
      swiperOption: {
        pagination: '.swiper-pagination',
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        paginationClickable: true,
        spaceBetween: 0,
        centeredSlides: true,
        autoplay: 10000,
        autoplayDisableOnInteraction: false
      },
      list:[]
    }
  },
  created() {
   this.fetchApi();
 },

 watch: {
  show: function (value) {
    if(value === true)
    {
      this.getWords();  
    }
  },
  now: function (value) {
   this.show = (value <= this.getElementTop(document.getElementById('detail'))*0.5 && $(window).width() > 768) ? true :false;
 }
},
mounted() {
  document.getElementById('app').addEventListener('scroll', this.handleScroll);
  this.getWords();
},
computed: {
  swiper() {
    return this.$refs.sliderSwiper.swiper
  }
},
methods: {
  getWords(){
   const self = this;
   var set = setInterval(() => {
    self.target     =  document.getElementById("words").contentDocument;
    self.targetSvg  =  self.target.querySelector("svg");
    if(self.targetSvg){
     self.targetPath =  self.targetSvg.querySelectorAll("path");
     self.words();
     clearInterval(set);
   }
 }, 100)
 },
 handleScroll() {
  this.now = document.getElementById('app').scrollTop;
},
fetchApi(){
  var xhr = new XMLHttpRequest()
  var self = this
  xhr.open('GET', self.$conf.SLIDER_API)
  xhr.onload = function() {
    self.list = JSON.parse(xhr.responseText)
  }
  xhr.send();
},
getElementTop(element){
  var navbarheight = 0;
  var actualTop    = element.offsetTop;
  var current      = element.offsetParent;
  while (current !== null){
    actualTop += current.offsetTop;
    current = current.offsetParent;
  }
  return actualTop-navbarheight*2;
},
getRandom(min, max){
  return Math.random() * (max - min) + min;
},
words(){
  const self = this;

  var tmax_optionsGlobal = {
    repeat: -1,
    repeatDelay: 5,
    yoyo: true
  };

  var tl = new TimelineMax(tmax_optionsGlobal),
  path        = 'svg *',
  stagger_val = 0.08,
  duration    = 1;

  $.each(this.targetPath, function(i, el) {
    tl.set($(this), {
      x: '+=' + self.getRandom(-500, 500),
      y: '+=' + self.getRandom(-500, 500),
      rotation: '+=' + self.getRandom(-720, 720),
      scale: 0,
      opacity: 0
    });
  });

  var stagger_opts_to = {
    x: 0,
    y: 0,
    opacity: 1,
    scale: 1,
    rotation: 0,
    ease: Power4.easeInOut
  };

  tl.staggerTo(this.targetPath, duration, stagger_opts_to, stagger_val);

  var $svg = $(this.targetSvg);
  $svg.hover(
    function() {
      tl.timeScale(0.3);
    },
    function() {
      tl.timeScale(1.5);
    });
}
}
}
</script>