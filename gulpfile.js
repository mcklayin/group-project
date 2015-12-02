var gulp = require('gulp'),
  stylus = require('gulp-stylus'),
  autoprefixer = require('gulp-autoprefixer'),
  //spritesmith  = require('gulp.spritesmith'),
  browserify = require('browserify'),
  source = require('vinyl-source-stream'),
  buffer = require('vinyl-buffer'),
  uglify = require('gulp-uglify'),
  sourcemaps = require('gulp-sourcemaps'),
  debowerify = require('debowerify'),
  gutil = require('gulp-util');
  browserSync = require('browser-sync').create();


var path = {
  stylus:{
    watch: 'html/src/stylus/**/*.styl',
    src: ['html/src/stylus/style.styl', 'html/src/stylus/admin.styl'],
    dest: 'html/dist/css/',
    pup_dest: 'public/css/'
  },
  js: {
    src: 'html/src/js/app.js',
    watch: 'html/src/js/**/*.js',
    //src: [
    //  'resources/vendor/angular/angular.min.js',
    //  'resources/vendor/angular-animate/angular-animate.js',
    //  'resources/vendor/angular-aria/angular-aria.js',
    //  'resources/vendor/angular-material/angular-material.js',
    //  'html/src/js/**/*.js'
    //],
    dest: "html/dist/js/",
    pup_dest: "public/js/"
  },
  html: 'html/dist/**/*.html',
  html_watch: 'html/dist/views/**/*.html',
  html_pup: 'public/views/'
};

//var defaultTasks = Object.keys({
//    calc_alpha: {
//        algorithm: 'binary-tree'
//    }
//});
//
//defaultTasks.forEach(function(taskName) {
//    gulp.task(taskName, function() {
//        var spriteData =
//          gulp.src('./sprites/'+taskName+'/*.png') // путь, откуда берем картинки для спрайта
//            .pipe(spritesmith({
//                imgName: taskName+'.png',
//                cssName: taskName+'.styl',
//                cssFormat: 'stylus',
//                algorithm: taskName.algorithm,
//                algorithmOpts: {sort: false},
//                padding: 10,
//                cssTemplate: 'sprites/stylus.template.mustache'
//                //cssVarMap: function(sprite) {
//                //	sprite.name = sprite.name
//                //}
//            }));
//        spriteData.img.pipe(gulp.dest('./images/')); // путь, куда сохраняем картинку
//        spriteData.css.pipe(gulp.dest('./stylus/sprites/')); // путь, куда сохраняем стили
//    });
//});


gulp.task('browser-sync', function() {
  browserSync.init({
    server: {
        baseDir: "./html/dist/"
    }
  });
});


gulp.task('stylus', function() {
    return gulp.src(path.stylus.src)
      .pipe(stylus({
        compress: true,
        'include css': true
      }))
      .on('error', function(err) {
          console.log(err.toString());
          this.emit('end');
      })
      .pipe(autoprefixer(
        'last 2 version',
        '> 1%',
        'ie 8',
        'ie 9',
        'ios 6',
        'android 4'
      ))
      .pipe(gulp.dest(path.stylus.dest, {ext: '.css'}))
      .pipe(gulp.dest(path.stylus.pup_dest, {ext: '.css'}))
      .pipe(browserSync.stream());
});

gulp.task('html', function() {
  return gulp.src(path.html_watch)
    .pipe(gulp.dest(path.html_pup));
});

gulp.task('js', function() {
  var b = browserify({
    entries: path.js.src,
    debug: true
  });
  return b.bundle()
    .pipe(source('app.js'))
    .pipe(buffer())
    .pipe(sourcemaps.init({loadMaps: true}))
    // Add transformation tasks to the pipeline here.
    .pipe(uglify())
    .on('error', gutil.log)
    .pipe(sourcemaps.write('./'))
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest(path.js.dest))
    .pipe(gulp.dest(path.js.pup_dest))
    .pipe(browserSync.stream());
});
gulp.task('watch', function() {
    gulp.watch(path.stylus.watch, ['stylus']);
    gulp.watch(path.js.watch, ['js']);
    gulp.watch(path.html).on('change', browserSync.reload);
    gulp.watch(path.html_watch, ['html']);
    //defaultTasks.forEach(function(taskName){
    //    gulp.watch('sprites/**/*.png', [taskName]).on('change', browserSync.reload);
    //});
});

gulp.task('default', ['browser-sync', 'watch']);
