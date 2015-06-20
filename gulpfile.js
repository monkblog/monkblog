var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function (mix) {
    var assetsFolder = 'public/assets',
        sassOptions = {includePaths: ['resources/assets/bower_components/foundation/scss']},
        commonCss = ['../css/general_foundicons.css', '../css/general_foundicons_ie7.css'],
        bowerPath = '../bower_components',
        adminJs = [bowerPath + '/showdown/dist/showdown.min.js', 'admin.js'],
        appJs = ['app.js'],
        commonJs = [bowerPath + '/jquery/dist/jquery.min.js', bowerPath + '/foundation/js/foundation.min.js'],
        outputJs = 'public/assets/js',
        outputCss = 'public/assets/css';

    //Compile css
    mix.sass(commonCss.concat(['main.scss']),
            outputCss + '/main.css',
            sassOptions)
        .sass(commonCss.concat(['admin.scss']),
            outputCss + '/admin.css',
            sassOptions);

    //Concat js
    mix.scripts(commonJs.concat(adminJs),
            outputJs + '/admin.js',
            'resources/assets/js/')
        .scripts(commonJs.concat(appJs),
            outputJs + '/app.js',
            'resources/assets/js/');

    //Move fonts
    mix.copy('resources/assets/fonts',
        assetsFolder + '/fonts');

    //Version assets
    mix.version([
        assetsFolder + '/css/admin.css',
        assetsFolder + '/css/main.css',
        assetsFolder + '/js/admin.js',
        assetsFolder + '/js/app.js']);
});
