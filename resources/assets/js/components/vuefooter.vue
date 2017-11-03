<template>
	<footer>
		<div class="footer borderbox">
			<div class="container">
				<div class="title">
					<span>Designed by Ruby</span>
					<div class="icon">
						<img :src="this.$conf.PHOTO_URL+'images/svg/ruby.svg'">
					</div>
				</div>
			</div>
		</div>
	</footer>
</template>


<script>
export default {
	name: 'footer',
	data() {
		return {
			list:[
			]
		}
	},
	created() {
	},
	watch: {
	},
	mounted() {
	},

	methods: {
	},
	computed: {
	},
}
</script>