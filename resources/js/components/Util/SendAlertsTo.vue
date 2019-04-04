<template>
    <div>
        <label class="mb-0">Send alerts to</label><br>
        <small class="d-block form-text text-muted mb-2">
            If a job doesn't run on schedule we'll send the alerts you specify here.
            Alerts can be managed on the <a href="/alerts">Alerts page</a>.
        </small>
        <div class="email-alerts">
            <label class="alert-type">Email</label>
            <div class="d-inline-block" v-if="emailAlerts.data && emailAlerts.data.length">
                <div class="form-check d-inline-block mr-3" v-for="emailAlert in emailAlerts.data" :key="emailAlert.id">
                    <input class="form-check-input" type="checkbox" :id="'emailAlert' + emailAlert.id" :value="emailAlert.id" v-model="selectedEmailAlertsArr">
                    <label class="form-check-label" :for="'emailAlert' + emailAlert.id">{{ emailAlert.email }}</label>
                </div>
            </div>
            <button type="button" class="btn btn-link btn-sm mr-3" @click="showModal">+ Add Email</button>
        </div>
        <div class="slack-alerts">
            <label class="alert-type">Slack Channels</label>
            <div class="d-inline-block" v-if="slackAlerts.data && slackAlerts.data.length">
                <div class="form-check d-inline-block mr-3" v-for="slackAlert in slackAlerts.data" :key="slackAlert.id">
                    <input class="form-check-input" type="checkbox" :id="'slackAlert' + slackAlert.id" :value="slackAlert.id" v-model="selectedSlackAlertsArr">
                    <label class="form-check-label" :for="'slackAlert' + slackAlert.id">{{ slackAlert.slack_team }} #{{ slackAlert.slack_channel }}</label>
                </div>
            </div>
            <a href="/alert/slack" class="btn btn-link btn-sm mr-3">+ Add Slack Channel</a>
        </div>

        <portal to="default">
            <modal
                :show="showNewEmailModal"
                :busy="newEmailForm.busy"
                title="New Email"
                ok-text="Save"
                @cancel="showNewEmailModal = false"
                @ok="saveNewEmail">
                <form @submit.prevent="saveNewEmail">
                    <div class="form-group">
                        <label for="input_email">Email Address</label>
                        <input type="text" id="input_email" class="form-control" placeholder="hi@example.com"
                            v-model="newEmailForm.email"
                            :class="{'is-invalid': newEmailForm.errors.has('email')}">
                        <span class="invalid-feedback" v-show="newEmailForm.errors.has('email')">
                            {{ newEmailForm.errors.get('email') }}
                        </span>
                    </div>
                </form>
            </modal>
        </portal>
    </div>
</template>

<style lang="scss" scoped>
.email-alerts,
.slack-alerts {
    background: #ededf3;
    padding: 0.75rem 1.25rem;
    border-radius: 0.5rem;
    margin-bottom: 1rem;

    label.alert-type {
        display: block;
        font-size: 0.7rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 0.1rem;
    }
    a { margin-bottom: 0; }
}
</style>

<script>
export default {
    props: {
        selectedEmailAlerts: {
            type: Array,
            required: true
        },
        selectedSlackAlerts: {
            type: Array,
            required: true
        }
    },

    data() {
        return {
            emailAlerts: {},
            selectedEmailAlertsArr: [],
            showNewEmailModal: false,
            newEmailForm: new SparkForm({
                team_id: null,
                email: '',
            }),
            slackAlerts: {},
            selectedSlackAlertsArr: [],
        }
    },

    computed: {
        currentTeam() {
            return this.spark.state.currentTeam;
        }
    },

    created() {
        this.selectedEmailAlertsArr = this.selectedEmailAlerts;
        this.selectedSlackAlertsArr = this.selectedSlackAlerts;
        this.newEmailForm.team_id   = this.currentTeam.id;
    },

    mounted() {
        this.getEmailAlerts();
        this.getSlackAlerts();
    },

    methods: {
        getEmailAlerts() {
            axios.get('/api/email-alerts', {
                params: {
                    page: 1,
                    perPage: 999,
                    team_id: this.currentTeam.id,
                }
            })
                .then(response => {
                    this.emailAlerts = response.data;
                });
        },
        showModal() {
            this.showNewEmailModal = true;
            this.newEmailForm.resetStatus();
        },
        saveNewEmail() {
            Spark.post('/api/email-alerts', this.newEmailForm)
                .then(response => {
                    this.newEmailForm.email = '';
                    this.getEmailAlerts();
                    this.showNewEmailModal = false;
                    this.selectedEmailAlertsArr.push(response.data.id);
                });
        },
        getSlackAlerts() {
            axios.get('/api/slack-alerts', {
                params: {
                    page: 1,
                    perPage: 999,
                    team_id: this.currentTeam.id,
                }
            })
                .then(response => {
                    this.slackAlerts = response.data;
                });
        },
    },

    watch: {
        selectedEmailAlertsArr(newVal) {
            this.$emit('update:selectedEmailAlerts', newVal);
        },
        selectedSlackAlertsArr(newVal) {
            this.$emit('update:selectedSlackAlerts', newVal);
        }
    }
}
</script>
