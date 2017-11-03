<template>
	<div class="cloud">
    <object :data="this.$conf.PHOTO_URL+'images/svg/002-sky-3.svg'" type="image/svg+xml" id="cloud">
    </object>
  </div>
</template>


<script>
export default {
	name: 'sun',
	data() {
		return {
      target:null,
      moveType:1,
      moveNum:0,
      moveRangeUp:240,
      moveRangeDown:100,
      moveDeg:0,
      moveStyle:null,
      move2Type:1,
      move2Num:0,
      move2RangeUp:0,
      move2RangeDown:140,
      move2Deg:0,
      move2Style:null,
      setMove:null,
      setMove2:null
    }
  },
  created() {
  },
  watch: {
  },
  mounted() {
      const self = this;
      setTimeout(() => {
       this.target =  document.getElementById("cloud").contentDocument;
       var svg    =  this.target.querySelectorAll('path');
       var $svg   = $(svg);
       var moveStyle = 'translate(125, 0) scale(0.5, 0.5)';
       this.moveTarget(".cloud1", moveStyle); 
       this.moveTarget(".cloud2", moveStyle);
       self.setMove  = setInterval(self.move, 10);
       self.setMove2 = setInterval(self.move2, 10);

       $svg.hover(
        function() {
         clearInterval(self.setMove);
         clearInterval(self.setMove2);
       },
       function() {
        self.setMove  = setInterval(self.move, 10);
        self.setMove2 = setInterval(self.move2, 10);
      });
     }, 200)

  },

  methods: {


    move(){
      if(this.moveNum === this.moveRangeUp)
      {
        this.moveType  = 1;
      }
      else if(this.moveNum === this.moveRangeDown)
      {
        this.moveType  = -1;
      }

      if(this.moveType === 1)
      {
        this.moveDeg--;
      }
      else if(this.moveType === -1)
      {
        this.moveDeg++;
      }

      this.moveNum   = this.moveDeg*1+125;
      this.moveStyle = 'translate('+ this.moveNum+', 0) scale(0.5, 0.5)';
      this.moveTarget(".cloud1", this.moveStyle); 
    },
    move2(){
      if(this.move2Num === this.move2RangeUp)
      {
        this.move2Type  = -1;
      }
      else if(this.move2Num === this.move2RangeDown)
      {
        this.move2Type  = 1;
      }

      if(this.move2Type === -1)
      {
        this.move2Deg--;
      }
      else if(this.move2Type === 1)
      {
        this.move2Deg++;
      }

      this.move2Num   = this.move2Deg*-1+125;
      this.move2Style = 'translate('+this.move2Num +', 0) scale(0.5, 0.5)';
      this.moveTarget(".cloud2", this.move2Style); 
    },
    moveTarget(classTarget, value){
      var settingrun =  this.target.querySelectorAll(classTarget);
      for (var i = 0; i < settingrun.length; i++) {
        settingrun[i].setAttribute('transform',value);
      }
    },
  },
  computed: {
  },
}
</script>