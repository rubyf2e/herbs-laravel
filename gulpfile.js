var proxy         = 'http://localhost/';
var productionUrl = 'https://rubyherbs.ddns.net/';
var devUrl        = 'http://localhost:3000/';
var gulp          = require('gulp');
var replace       = require('gulp-replace');
var imagemin      = require('gulp-imagemin');
var browserSync   = require('browser-sync').create();

gulp.task('imagemin', function () {
	gulp.src(['resources/assets/images/*.{png,jpg,gif,ico,svg}','resources/assets/images/**/*.{png,jpg,gif,ico,svg}'])
	.pipe(imagemin({
            optimizationLevel: 5, //类型：Number  默认：3  取值范围：0-7（优化等级）
            progressive: true, //类型：Boolean 默认：false 无损压缩jpg图片
            interlaced: true, //类型：Boolean 默认：false 隔行扫描gif进行渲染
            multipass: true //类型：Boolean 默认：false 多次优化svg直到完全优化
          }))
	.pipe(gulp.dest('public/images'));
});

gulp.task('production', function () {
	gulp.src(['resources/assets/js/config.js'])
	.pipe(replace(devUrl, productionUrl))
	.pipe(gulp.dest('resources/assets/js'));
});


gulp.task('default', function () {
	gulp.src(['resources/assets/js/config.js'])
	.pipe(replace(productionUrl, devUrl))
	.pipe(gulp.dest('resources/assets/js'));

	browserSync.init([
		'public/css/**/*.css',
		'public/css/*.css',
		'public/js/**/*.js',
		'public/js/*.js',
		'public/images/svg/*',
		'resources/views/*.php',
		'app/**/*',
		], {
			proxy: proxy
		});
});