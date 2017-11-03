<template>
	<div class="tree" id="treeBox">
		<object  v-show="show" :data="this.$conf.PHOTO_URL+'images/svg/009-rainbow.svg'" type="image/svg+xml" id="treeId" class="treeObject">
		</object>

	</div>
</template>
<script>

export default {
	name: 'trees',
	data() {
		return {
			now:0,
			show:false,
			target:null,
			runStyle:null,
			runType:1,
			runNum:0,
			runRangeUp:0,
			runRangeDown:1.4,
			runDeg:0,
			tree:null,
		}
	},
	created() {
	},
	destroyed() {
		document.getElementById('app').removeEventListener('scroll', this.handleScroll);
	},
	watch: {
		now: function (value) {
			this.show = (value >= this.getElementTop(document.getElementById('treeBox'))-800) ? true :false;
			if(this.show === true)
			{
				this.runNum = this.runRangeUp;
				this.play();	
			}
		}
	},
	mounted() {
		document.getElementById('app').addEventListener('scroll', this.handleScroll);
	},

	methods: {
		play(){
			const self = this;
			setTimeout(function(){
				self.runStyle = 'scale(0)';
				self.runTarget(".apple");
			}, 100);

			setTimeout(function(){
				setInterval(self.bigger, 30)
			}, 3000);
		},
		handleScroll() {
			this.now = document.getElementById('app').scrollTop;
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
		bigger(){
			if(this.runNum < this.runRangeUp)
			{
				this.runType  = 1;
			}
			else if(this.runNum > this.runRangeDown)
			{
				this.runType  = 0;
			}

			if(this.runType === -1)
			{
				this.runDeg = this.runDeg-0.1;
			}
			else if(this.runType === 1)
			{
				this.runDeg = this.runDeg+0.1;
			}

			this.runNum   = this.runDeg;
			this.runStyle = 'scale('+this.runNum+')';
			this.runTarget(".apple"); 
		},
		runTarget(target){
			this.target = document.getElementById("treeId").contentDocument;
			var apple   = this.target.querySelectorAll(target);
			for (var i = 0; i < apple.length; i++) {
				apple[i].setAttribute('transform-origin', 'center');
				apple[i].setAttribute('transform',this.runStyle);
			}
		}
	},
	computed: {
	},
}
</script>