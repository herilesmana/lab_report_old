
window._ = require('lodash');
window.Popper = require('popper.js').default;
require('toastr');

try {
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
