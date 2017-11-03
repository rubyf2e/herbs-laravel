  <template>
    <div class="modalBox detail" v-bind:class="{ active: visible,fadeIn: visible,fadeOut: fadeOut}">
      <div class="box">
        <div class="mask" v-on:click="toggle"></div>
        <carousel-3d  :startIndex="startIndex" ref="detailslide" :height="450" :perspective="0" :inverseScaling="100" :width="700" :space="180" :controls-visible="true"
        :controls-width="50" :controls-height="60" :clickable="true"  v-bind:class="{ active: visible }">
        <slide v-for="(slide, i) in list" :index="i" :key="i">
          <div class="memoContainer borderbox"  v-bind:style="{'background-image': 'url(' +$conf.PHOTO_URL+slide.src + ')'}">
          </div>
        </slide>
      </carousel-3d>
    </div>
  </div>
</div>
</template>
<script>
import { Carousel3d, Slide } from 'vue-carousel-3d';

export default {
  components: {
    Carousel3d,
    Slide
  },

  name: 'slides',
  data() {
   return {
    fadeOut:false,
    startIndex:0,
    slides: 5,
    tabSelected:0,
    visible: false,
    count:0,
    list:[],
  }
},
created() {
  this.$bus.$on('detail-modal', detailModal => {
    this.visible     = detailModal.visible;
    this.tabSelected = detailModal.tabSelected;
    this.list        = detailModal.list[this.tabSelected].slidesrc;
  });
},
watch: {
  tabSelected: function (value) {
    this.startIndex   = value;
  },
},
mounted() {
},

methods: {
  toggle: function (event) {
    const self = this;
    setTimeout(function(){
      self.fadeOut = true;
      setTimeout(function(){
       self.fadeOut = false;  
       self.visible = false;  

       const detailModal = {
        visible:self.visible,
        tabSelected:self.tabSelected,
        list:self.list
      };
      self.$bus.$emit('detail-modal', detailModal);
    }, 150);
    }, 100);

  }
},
computed: {
},
beforeDestroy: function() {
 this.$bus.$off('detail-modal');
}
}
</script>
