import moment from 'moment-timezone';
import { duration } from 'moment';

export default {
    methods: {
        toLocal(utcTime, timezone = 'UTC') {
            return moment(utcTime).tz(timezone).format('YYYY-MM-DD HH:mm:ss');
        },
        fromNow(utcTime, timezone = 'UTC') {
            return moment(utcTime).tz(timezone).fromNow();
        },
        duration(durationSecs) {
            return moment.duration(durationSecs, 'seconds').humanize();
        }
    }
}
