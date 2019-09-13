<template>
    <div>
        <email-alerts />
        <slack-alerts />
    </div>
</template>

<script>
export default {
    components: {
        'email-alerts': require('./EmailAlerts.vue').default,
        'slack-alerts': require('./SlackAlerts.vue').default,
    }
}
</script>
