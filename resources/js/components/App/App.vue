<template>
    <div>
        <h1 class="h3 mb-4">{{ app.name }}</h1>

        <schedule-monitors :app="app" />
        <alerts :app="app" />
    </div>
</template>

<script>
export default {
    props: ['app'],

    components: {
        'schedule-monitors': require('./ScheduleMonitors.vue'),
        'alerts': require('./Alerts.vue'),
    }
}
</script>
