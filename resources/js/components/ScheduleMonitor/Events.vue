<template>
    <div class="card card-default card-no-padding">
        <div class="card-header">
            Recent Pings
        </div>
        <div class="card-body">
            <div v-if="events.data && events.data.length">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Sarted</th>
                            <th>Finished</th>
                            <th>Duration</th>
                            <th class="text-right">Output</th>
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
                            <td>{{ duration(event.duration) }}</td>
                            <td class="text-right">
                                <a href="#" title="View Output" class="mr-3" @click.prevent="getOutput(event)" v-if="event.has_output">
                                    <fa-icon icon="eye" />
                                </a>
                                <span class="text-muted mr-3" v-else>&mdash;</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="p-4" v-else>
                <em>No pings yet...</em>
            </div>
        </div>

        <portal to="default">
            <modal
                :show="showEventOutput"
                title="Scheduled Job Output"
                ok-text="Ok"
                size="large"
                @cancel="showEventOutput = false"
                @ok="showEventOutput = false">
                <pre class="event-output"><code>{{ output }}</code></pre>
            </modal>
        </portal>
    </div>
</template>

<style type="scss" scoped>
.event-output {
    white-space: pre-wrap;
    min-height: 200px;
    max-height: 800px;
    overflow: auto;
    margin-bottom: 0;
}
</style>

<script>
import datetime from '../../mixins/datetime';

export default {
    mixins: [datetime],

    props: ['scheduleMonitor'],

    data() {
        return {
            events: [],
            showEventOutput: false,
            output: '',
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
        getOutput(event) {
            this.showEventOutput = true;
            this.output = 'Loading...';

            axios.get(`/api/schedule-monitor-events/${event.id}`)
                .then(response => {
                    this.output = response.data.data.output;
                });
        }
    }
}
</script>
