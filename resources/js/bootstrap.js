// vendor/laravel/spark-aurelius/resources/assets/js/spark-bootstrap.js

/*
 * Load various JavaScript modules that assist Spark.
 */
window.URI = require('urijs');
window.axios = require('axios');
window._ = require('lodash');
window.moment = require('moment');
window.Promise = require('promise');
window.Popper = require('popper.js').default;
window.__ = (key, replace) => {
    var translation = Spark.translations[key] ? Spark.translations[key] : key;

    _.forEach(replace, (value, key) => {
        translation = translation.replace(':'+key, value);
    });

    return translation;
};

/*
 * Define Moment locales
 */
window.moment.defineLocale('en-short', {
    parentLocale: 'en',
    relativeTime : {
        future: "in %s",
        past:   "%s",
        s:  "1s",
        m:  "1m",
        mm: "%dm",
        h:  "1h",
        hh: "%dh",
        d:  "1d",
        dd: "%dd",
        M:  "1 month ago",
        MM: "%d months ago",
        y:  "1y",
        yy: "%dy"
    }
});
window.moment.locale('en');

/*
 * Load jQuery and Bootstrap jQuery, used for front-end interaction.
 */
if (window.$ === undefined || window.jQuery === undefined) {
    window.$ = window.jQuery = require('jquery');
}

require('bootstrap');

/**
 * Load Vue if this application is using Vue as its framework.
 */
if ($('#spark-app').length > 0) {
    require('vue-bootstrap');
}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */
window.axios.defaults.headers.common = {
    'X-Requested-With': 'XMLHttpRequest',
    'X-CSRF-TOKEN': Spark.csrfToken
};

/**
 * Intercept the incoming responses.
 *
 * Handle any unexpected HTTP errors and pop up modals, etc.
 */
window.axios.interceptors.response.use(function (response) {
    return response;
}, function (error) {
    if (error.response === undefined) {
        return Promise.reject(error);
    }

    switch (error.response.status) {
        case 401:
            window.axios.get('/logout');
            $('#modal-session-expired').modal('show');
            break;

        case 402:
            console.log(error.response);
            if (error.response.data.message) {
                $('#upgrade-required-reason').text(error.response.data.message)
            }
            $('#modal-upgrade-required').modal('show');
            break;
    }

    return Promise.reject(error);
});

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo'

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     encrypted: true
// });
