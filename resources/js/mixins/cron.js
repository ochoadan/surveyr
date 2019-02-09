import prettycron from 'prettycron';

export default {
    methods: {
        humanSchedule(schedule) {
            return prettycron.toString(schedule);
        },
        humanNextSchedule(schedule) {
            return prettycron.getNext(schedule);
        },
    }
}