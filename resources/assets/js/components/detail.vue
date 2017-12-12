  <template>
    <div class="container detail">
      <div class="bg"></div>
      <div class="box">
        <div class="detailBox" v-for="(item, key) in this.list" v-bind:class="{ left: (key+1)%2 == 0,  right: (key+1)%2 != 0}" v-on:click="tabSelect(item.id)">
          <div class="image">
            <img :src="$conf.PHOTO_URL+item.src" alt="">
          </div>
          <div class="detail">
            <div class="title">
              <div class="icon">
                <img :src="$conf.PHOTO_URL+'images/svg/019-nature.svg'" alt="">
              </div>
              <h1>{{item.title}}</h1>
            </div>

            <div class="memo">
              <p v-html="item.memo">
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  <script>
  export default {
    name: 'detail',
    data() {
     return {
       visible: false,
       tabSelected: 0,
       list:[]
     }
   },
   created() {
     this.fetchApi();
     this.$bus.$on('detail-modal', detailModal => {
      this.visible     = detailModal.visible;
      this.tabSelected = detailModal.tabSelected;
    });
   },
   methods: {
    fetchApi(){
     var self = this;
     this.$http.post(self.$conf.DETAIL_API).then((response) => {
      this.list = response.data;
    }, (response) => {
    });
   },
   tabSelect:function (id) {
    this.tabSelected = id-1;
    this.toggle();
  },
  toggle: function (event) {
   this.visible    = !this.visible;
   const detailModal = {
    visible:this.visible,
    tabSelected:this.tabSelected,
    list:this.list
  };
  this.$bus.$emit('detail-modal', detailModal); 
}
},
}
</script>
