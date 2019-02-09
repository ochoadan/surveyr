<template>
    <div class="card card-default card-no-padding">
        <div class="card-header">
            Pings
        </div>
        <div class="card-body">
            <div v-if="events.data && events.data.length">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Sarted</th>
                            <th>Finished</th>
                            <th class="text-right">Duration</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="event in events.data" :key="event.id">
                            <td>
                                {{ event.started_at }}
                                <span class="text-muted ml-2">{{ fromNow(event.started_at) }}</span>
                            </td>
                            <td>
                                <span v-if="event.finished_at">
                                    {{ event.finished_at }}
                                    <span class="text-muted ml-2">{{ fromNow(event.finished_at) }}</span>
                                </span>
                            </td>
                            <td class="text-right">{{ duration(event.duration) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="p-4" v-else>
                <em>No pings yet...</em>
            </div>
        </div>
    </div>
</template>

<script>
import datetime from '../../mixins/datetime';

export default {
    mixins: [datetime],

    props: ['scheduleMonitor'],

    data() {
        return {
            events: [],
        }
    },

    mounted() {
        this.getScheduleMonitorEvents();
    },

    methods: {
        getScheduleMonitorEvents() {
            axios.get('/api/schedule-monitor-events', {
                params: {
                    schedule_monitor_id: this.scheduleMonitor.id,
                    recent: true
                }
            })
                .then(response => {
                    this.events = response.data;
                });
        },
    }
}
</script>
