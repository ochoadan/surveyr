
/*
 |--------------------------------------------------------------------------
 | Laravel Spark Components
 |--------------------------------------------------------------------------
 |
 | Here we will load the Spark components which makes up the core client
 | application. This is also a convenient spot for you to load all of
 | your components that you write while building your applications.
 */

require('./../spark-components/bootstrap');

Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('modal', require('./Util/Modal.vue').default);

Vue.component('send-alerts-to', require('./Util/SendAlertsTo.vue').default);

Vue.component('dashboard', require('./Dashboard/Dashboard.vue').default);
Vue.component('app', require('./App/App.vue').default);
Vue.component('schedule-monitor', require('./ScheduleMonitor/ScheduleMonitor.vue').default);
Vue.component('alerts', require('./Alerts/Alerts.vue').default);
