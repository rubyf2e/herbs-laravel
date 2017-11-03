<template>
  <div :id="mapName" class="map"></div>
</template>

<script>
import Vue from 'vue';
import * as MarkerClusterer from 'marker-clusterer-plus';

export default {
 name: 'google-map',
 props: ['name'],
 created() {
  this.$bus.$on('google-marker-position', position => {
   this.center = position;
 });

  this.$bus.$on('google-marker-detail', detail => {
   this.detail = detail;
 });

  this.$bus.$on('google-marker', list => {
    this.markerCoordinates = list;
  });

},
data () {
  return {
    image : {
      url: this.$conf.PHOTO_URL+'images/svg/pin.svg',
      size: new google.maps.Size(40, 40),
      origin: new google.maps.Point(0, 0),
      anchor: new google.maps.Point(17, 34),
      scaledSize: new google.maps.Size(40, 40)
    },
    mapName: this.name,
    center:[],
    detail:[],
    markerCoordinates:[],
    marker:[],
    markerGroup:[],
    begin:true,
    contant:'',
    infowindow:null,
    mapStyles: [
    {
      "stylers": [
      {
        "hue": "#0B346E"
      }
      ]
    },
    {
      "featureType": "road",
      "elementType": "labels",
      "stylers": [
      {
        "visibility": "off"
      }
      ]
    },
    {
      "featureType": "road",
      "elementType": "geometry",
      "stylers": [
      {
        "lightness": 100
      },
      {
        "visibility": "simplified"
      }
      ]
    }
    ]
  }},

  mounted: function () {
  },

  watch: {
    markerCoordinates:function(value){
     const self = this;
     const element = document.getElementById(this.mapName)
     const options = {
      zoom: 5,
      center: this.center,
      disableDefaultUI: true,
      zoomControl: true,
      mapTypeControl: false,
      scaleControl: true,
      streetViewControl: true,
      rotateControl: true,
      fullscreenControl: true,
      styles:this.mapStyles
    }

    this.map     = new google.maps.Map(element, options);
    this.markerCoordinates.forEach((item, key) => {
     const self  = this;
     this.marker = new google.maps.Marker({ 
      position:JSON.parse(item.position),
      map:this.map,
      icon: this.image,
      optimized: false,
    });

     this.marker.setMap(this.map);

     this.content   = '<div>'+
     '<h1>'+item.name+'</h1>'+
     '<div class="memo-box"><div class="memo"><span>'+item.memo+'</span></div></div></div>'+
     '</div>';

     this.infowindow = new google.maps.InfoWindow({
      content:  this.content,
      maxWidth: 300
    });

     var value = {
      "marker":this.marker,
      "infowindow":this.infowindow,
    }

    this.markerGroup.push(value);

    if(key === 0){
      this.infowindow.open(this.map, this.marker);
    }
  });


    this.markerGroup.forEach((item) => {
     item.marker.addListener('click', function() {
      item.infowindow.open(self.map, item.marker);
    });
   })
  },
  center: function (value) {
   if(this.begin === false){
    this.markerGroup[0].infowindow.close();
    this.infowindow.close();
  }
  
  this.begin = false;
  this.map.setCenter(value);
  this.marker.setPosition(value);
},
detail: function (value) {
  this.infowindow = new google.maps.InfoWindow({
    content: '<div>'+
    '<h1>'+value.name+'</h1>'+
    '<div class="memo-box"><div class="memo"><span>'+value.memo+'</span></div></div></div>'+
    '</div>',
    maxWidth: 300
  });

  const self = this;
  this.marker.addListener('click', function() {
    self.closeMap();
    self.infowindow.open(self.map, self.marker);
  });
  this.infowindow.open(this.map, this.marker);
},
},

methods: {
  closeMap:function (){
    const self = this;
    this.markerGroup.forEach(function(item) {
     item.infowindow.close(self.map, item.marker);
   }); 
  }
},
beforeDestroy: function() {
  this.$bus.$off('google-marker');
}

}
</script> 


