// "use strict";

var Encore = require('./build/webpack.config');

Encore
    .addEntry(
        'html-editors',
        [
            "./resources/assets/js/html-editor-tinymce.js",
            "./resources/assets/js/html-editor.js",
            "./resources/assets/scss/html-editor.scss",
            "./resources/assets/scss/html-editor-tinymce.scss"
        ]
    )
;

var config = Encore.getWebpackConfig();

// webpack.config.js
module.exports = config;
