/* globals requirejs */

requirejs(['jquery', 'app', 'layout', 'api', 'bootstrap-alert', 'bootstrap-hover-dropdown', 'bootstrap-dropdown', 'bootstrap-collapse'], function ($, App, Layout, Api) {
    'use strict';
    // Generl layout stuff required by Metronic

    App.init();
    Layout.init();
    Api.init();
});
