<template>
	<div class="sun">
		<object :data="this.$conf.PHOTO_URL+'images/svg/sun-2.svg'" type="image/svg+xml" id="sun2">
		</object>
	</div>
</template>
<script>
export default {
	name: 'sun',
	data() {
		return {
			runDeg:0,
			moveType:0,
			moveNum:0,
			moveRangeUp:40,
			moveRangeDown:10,
			moveDeg:0,
			runStyle:null,
			moveStyle:null,
		}
	},
	created() {
	},
	watch: {
	},
	mounted() {
		setInterval(this.run, 50);
		setInterval(this.move, 20);
	},

	methods: {
		run(){
			this.runDeg++;
			this.runStyle = 'rotate('+this.runDeg+'  256 256)';
			this.runDeg   = (this.runDeg === 360) ? 0 : this.runDeg;
			this.runTarget(); 
		},
		runTarget(){
			var target     =  document.getElementById("sun2").contentDocument;
			var settingrun =  target.querySelectorAll(".settingrun");
			for (var i = 0; i < settingrun.length; i++) {
				settingrun[i].setAttribute('transform',this.runStyle);
			}
		},
		move(){
			if(this.moveNum === this.moveRangeUp)
			{
				this.moveType  = -1;
			}
			else if(this.moveNum === this.moveRangeDown)
			{
				this.moveType  = 1;
			}

			if(this.moveType === -1)
			{
				this.moveDeg--;
			}
			else
			{
				this.moveDeg++;
			}

			this.moveNum   = this.moveDeg;
			this.moveStyle = 'translate(0,'+this.moveNum+')';
			this.moveTarget(); 
		},
		moveTarget(){
			var target     =  document.getElementById("sun2").contentDocument;
			var settingrun =  target.querySelectorAll(".mouth");
			for (var i = 0; i < settingrun.length; i++) {
				settingrun[i].setAttribute('transform',this.moveStyle);
			}
		},

	},
	computed: {
	},
}
</script>