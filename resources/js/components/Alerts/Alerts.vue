<template>
    <div>
        <email-alerts />
        <slack-alerts />
    </div>
</template>

<script>
export default {
    components: {
        'email-alerts': require('./EmailAlerts.vue'),
        'slack-alerts': require('./SlackAlerts.vue'),
    }
}
</script>
