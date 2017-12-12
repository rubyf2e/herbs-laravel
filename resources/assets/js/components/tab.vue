  <template>
    <div class="left-box borderbox tab-set">
      <div class="h1">
        <div class="icon">
         <img :src="this.$conf.PHOTO_URL+'images/svg/012-1-plant.svg'">
       </div>
       <h1>哪裡找得到香草</h1>
     </div>

     <div class="tab">
      <div class="tab-container">
        <div class="box drop-shadow" v-on:click="targetSelect(item.id, item.position)" v-for="item in this.list" :id="'tab-box'+item.id" v-bind:class="{ 'active': item.id === targetSelected }">
          <div class="memo-box">
            <div class="title">
             <div class="icon">
              <img :src="$conf.PHOTO_URL+'images/svg/map.svg'">
            </div>
            <div class="name">
              <span>{{item.name}}</span>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
</template>



<script>
export default {
  name: 'tab',
  data() {
   return {
    tabSelected: 0,
    targetSelected: 0,
    locationResults:null,
    centerPosition: [],
    list:[]
  }
},
created() {
 this.fetchApi();
},
mounted: function ()  {

},
watch: {
},
methods: {
  fetchApi(){
   var self = this;
   this.$http.post(self.$conf.TAB_API).then((response) => {
    this.list           = response.data;
    this.centerPosition = JSON.parse(response.data[0].position);

    this.$bus.$emit('google-marker', this.list);
    this.$bus.$emit('google-marker-position', this.centerPosition);
  }, (response) => {

  });
},
tabSelect:function (id) {
  this.tabSelected = id;
},
targetSelect:function (id, position) {
  this.targetSelected = id;
  var value = {
    position:JSON.parse(position),
    detail:this.list[id-1],
  }

  this.$bus.$emit('google-marker-position', value.position); 
  this.$bus.$emit('google-marker-detail', value.detail); 
}
}



}

</script>