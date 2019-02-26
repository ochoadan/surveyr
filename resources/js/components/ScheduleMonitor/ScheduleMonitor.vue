<template>
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
                <li class="breadcrumb-item"><a :href="`/app/${scheduleMonitor.app_id}`">{{ scheduleMonitor.app.name }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ scheduleMonitorName }}</li>
            </ol>
        </nav>

        <h1 class="h3 mb-3">
            <template v-if="scheduleMonitor.name">
                {{ scheduleMonitor.name }}<br>
                <span class="d-inline-block text-truncate text-muted small" style="max-width: 100%;" :title="scheduleMonitor.command">{{ scheduleMonitor.command }}</span>
            </template>
            <template v-else>
                <span class="d-inline-block text-truncate" style="max-width: 100%;" :title="scheduleMonitor.command">{{ scheduleMonitor.command }}</span>
            </template>
        </h1>

        <p class="mb-4">
            <span>
                <span class="text-muted">Status:</span>
                <span :class="{ 'text-success': scheduleMonitor.status == 'passing', 'text-danger': scheduleMonitor.status == 'failing' }" v-if="scheduleMonitor.last_run_at">
                    {{ scheduleMonitor.status }}
                </span>
                <span v-else>waiting</span>
            </span>
            <span class="ml-5">
                <span class="text-muted">Schedule:</span>
                <span :title="scheduleMonitor.schedule">{{ humanSchedule(scheduleMonitor.schedule) }}</span>
            </span>
            <span class="ml-5">
                <span class="text-muted">Last run:</span>
                <span v-if="scheduleMonitor.last_run_at" :title="scheduleMonitor.last_run_at + ' ' + scheduleMonitor.timezone">{{ fromNow(scheduleMonitor.last_run_at) }}</span>
                <span v-else>Never</span>
            </span>
            <span class="ml-5">
                <span class="text-muted">Next run:</span>
                {{ humanNextSchedule(scheduleMonitor.schedule) }} ({{ scheduleMonitor.timezone }})
            </span>
        </p>

        <events :schedule-monitor="scheduleMonitor" />
    </div>
</template>

<script>
import _ from 'lodash';
import datetime from '../../mixins/datetime';
import cron from '../../mixins/cron';

export default {
    mixins: [datetime, cron],

    props: ['scheduleMonitor'],

    computed: {
        scheduleMonitorName() {
            return this.scheduleMonitor.name ? this.scheduleMonitor.name : _.truncate(this.scheduleMonitor.command);
        }
    },

    components: {
        'events': require('./Events.vue'),
    }
}
</script>
