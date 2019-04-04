
/*
 |--------------------------------------------------------------------------
 | Laravel Spark Bootstrap
 |--------------------------------------------------------------------------
 |
 | First, we will load all of the "core" dependencies for Spark which are
 | libraries such as Vue and jQuery. This also loads the Spark helpers
 | for things such as HTTP calls, forms, and form validation errors.
 |
 | Next, we'll create the root Vue application for Spark. This will start
 | the entire application and attach it to the DOM. Of course, you may
 | customize this script as you desire and load your own components.
 |
 */

require('./bootstrap');

// FontAwesome
import { library } from '@fortawesome/fontawesome-svg-core';
import { faEye, faEnvelope } from '@fortawesome/free-solid-svg-icons';
import { faSlack } from '@fortawesome/free-brands-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
library.add(faEye, faEnvelope, faSlack);
Vue.component('fa-icon', FontAwesomeIcon);

// Portal Vue
import PortalVue from 'portal-vue';
Vue.use(PortalVue);

require('./components/bootstrap');

var app = new Vue({
    mixins: [require('spark')]
});
