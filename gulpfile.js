/* gulpfile.js */

var gulp         = require('gulp'),
    concat       = require('gulp-concat'),
    // uglify       = require('gulp-uglify'),
    minify       = require('gulp-minify'),
    babel        = require('gulp-babel');


// scripts loaded in footer of every page
var globalNonEssentialModules = [
    'library/js/src/global/dropdown.js',
    'library/js/src/global/pop-up-search.js',
    'library/js/src/global/read-more-pop.js',
    'library/js/src/global/swoop-to.js',
];
    
// specific to home page
var homeScripts = [
    'library/js/src/jquery.flippy-min.js',
    'library/js/src/grid-slider.js'
];


// ==================================================
// GETS ALL GLOBAL NON-ESSENTIAL MODULES, TACKS ON
// AN INIT FILE, CONCATENATES AND MINIFIES
// ==================================================
gulp.task('scripts_global_nonessential',function(){

    var modules = globalNonEssentialModules;
    modules.push('library/js/src/global-nonessential-init.js');

    standardScriptGulp( modules, "global-nonessential.js");

    /*gulp.src(modules)
        .pipe(concat('global-nonessential.js'))
        .pipe(babel())
        .pipe(minify({
            ext: {
                min: '.min.js'
            },
            ignoreFiles: ['-min.js'],
            noSource: true
        }))
        .pipe(gulp.dest('library/js/dist'));*/

});


// ==================================================
// GETS ALL HOME MODULES, ADDS IN ALL GLOBAL MODULES,
// TACKS ON AN INIT FILE, CONCATENATES AND MINIFIES
// ==================================================
gulp.task('scripts_home_nonessential',function(){

    var modules = homeScripts.concat(globalNonEssentialModules);
    modules.push('library/js/src/home-init.js');

    standardScriptGulp( modules, "home-nonessential.js");

    /*gulp.src(modules)
        .pipe(concat('home-nonessential.js'))
        .pipe(babel())
        .pipe(minify({
            ext: {
                min: '.min.js'
            },
            ignoreFiles: ['-min.js'],
            noSource: true
        }))
        .pipe(gulp.dest('library/js/dist'));*/

});

// ==================================================
// GETS ALL THE SCREENFUL STUFF FOR THE THE SINGLE-
// CURRICULUM PAGE, ADDS IN GLOBAL MODULES, 
// CONCATENATES AND MINIFIES
// ==================================================

gulp.task('scripts_curric_nonessential',function(){

    var curricScripts = [
        'library/js/src/screenfull.js',
        'library/js/src/screenfull-customize.js'
    ];

    var modules = globalNonEssentialModules.concat(curricScripts);
    modules.push('library/js/src/screenfull-customize-init.js');

    standardScriptGulp( modules, "single-curric-nonessential.js");

    /*gulp.src(modules)
        .pipe(concat('single-curric-nonessential.js'))
        .pipe(babel())
        .pipe(minify({
            ext: {
                min: '.min.js'
            },
            ignoreFiles: ['-min.js'],
            noSource: true
        }))
        .pipe(gulp.dest('library/js/dist'));*/

});

// ==================================================
// GETS THE MODULES NEEDED FOR THE ACCOUNT/LOGIN PAGES
// AND COMBINES WITH GLOBAL NONESSENTIAL MODULES
// ==================================================

gulp.task('scripts_account_nonessential',function(){

    var accountModules = [
        'library/js/src/login-hero.js',
        'library/js/src/account-details.js',
    ];

    var modules = globalNonEssentialModules.concat(accountModules);
    modules.push('library/js/src/accounts-init.js');

    standardScriptGulp( modules, "account-nonessential.js");

});

// ==================================================
// COMBINES GLOBAL NONESSENTIAL WITH THE LOGIN-HERO
// SCRIPT TO LOAD ONTO THE CERTIFICATION APPLICATION
// PAGE (WHICH REQUIRES LOGIN TO APPLY)
// ==================================================

gulp.task('scripts_cert_apply_nonessential',function(){

    var thisPage = [
        'library/js/src/login-hero.js'
    ];

    var modules = globalNonEssentialModules.concat(thisPage);
    modules.push('library/js/src/cert-apply-init.js');
    
    standardScriptGulp( modules, "cert-apply-nonessential.js");

});

// ==================================================
// WRAPPER FOR THE BASIC SCRIPT CONCATENATOR, 
// BABELIFIER, MINIFIER FUNCTION I'M RUNNING ON
// ALL THE SCRIPTS
// ==================================================
function standardScriptGulp( modules, dest_file_name ){
    gulp.src(modules)
        .pipe(concat(dest_file_name))
        .pipe(babel())
        .pipe(minify({
            ext: {
                min: '.min.js'
            },
            ignoreFiles: ['-min.js'],
            noSource: true
        }))
        .pipe(gulp.dest('library/js/dist'));
}

// ======================================================
// MASTER SCRIPTS TASK THAT RUNS ALL OTHER SCRIPTS TASKS
// ======================================================
gulp.task('scripts',[
    'scripts_global_nonessential',
    'scripts_home_nonessential',
    'scripts_curric_nonessential',
    'scripts_account_nonessential',
    'scripts_cert_apply_nonessential'
]);