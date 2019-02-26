<template>
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ app.name }}</li>
            </ol>
        </nav>

        <h1 class="h3 mb-4">{{ app.name }}</h1>

        <schedule-monitors :app="app" />
        <alerts :app="app" />

        <div class="text-right mb-5">
            <button class="btn btn-light" @click="deleteApp">Delete App</button>
        </div>
    </div>
</template>

<script>
export default {
    props: ['app'],

    methods: {
        deleteApp() {
            if (!confirm('Are you sure you want to delete this app and its monitors? This is a non-recoverable action.')) {
                return;
            }

            axios.delete(`/api/apps/${this.app.id}`)
                .then(response => {
                    window.location = '/home';
                });
        }
    },

    components: {
        'schedule-monitors': require('./ScheduleMonitors.vue'),
        'alerts': require('./Alerts.vue'),
    }
}
</script>
