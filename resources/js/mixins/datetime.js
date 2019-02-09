import moment, { duration } from 'moment';

export default {
    methods: {
        fromNow(dateTime) {
            return moment(dateTime).fromNow();
        },
        duration(durationSecs) {
            return moment.duration(durationSecs, 'seconds').humanize();
        }
    }
}