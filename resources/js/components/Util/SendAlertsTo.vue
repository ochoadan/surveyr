<template>
    <div>
        <label>Send alerts to</label><br>
        <div class="d-inline-block" v-if="emailAlerts.data && emailAlerts.data.length">
            <div class="form-check d-inline-block mr-3" v-for="emailAlert in emailAlerts.data" :key="emailAlert.id">
                <input class="form-check-input" type="checkbox" :id="'emailAlert' + emailAlert.id" :value="emailAlert.id" v-model="selectedAlerts">
                <label class="form-check-label" :for="'emailAlert' + emailAlert.id">{{ emailAlert.email }}</label>
            </div>
        </div>
        <button type="button" class="btn btn-link btn-sm mr-3" @click="showModal">+ Add Email</button>
        <small class="d-block form-text text-muted mt-2">
            If a job doesn't run on schedule we'll send the alerts you specify here.
        </small>

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

<script>
export default {
    props: {
        value: {
            type: Array,
            required: true
        }
    },

    data() {
        return {
            emailAlerts: {},
            selectedAlerts: [],
            showNewEmailModal: false,
            newEmailForm: new SparkForm({
                team_id: null,
                email: '',
            }),
        }
    },

    computed: {
        currentTeam() {
            return this.spark.state.currentTeam;
        }
    },

    created() {
        this.selectedAlerts       = this.value;
        this.newEmailForm.team_id = this.currentTeam.id;
    },

    mounted() {
        this.getEmailAlerts();
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
                    this.selectedAlerts.push(response.data.id);
                });
        }
    },

    watch: {
        selectedAlerts(newVal) {
            this.$emit('input', newVal);
        }
    }
}
</script>
