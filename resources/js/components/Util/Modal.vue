<template>
    <div ref="modal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" :class="{ 'modal-sm': size == 'small', 'modal-lg': size == 'large' }" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" v-if="title">{{ title }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <slot></slot>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" :disabled="busy">{{ cancelText }}</button>
                    <button type="button" class="btn btn-primary" @click="$emit('ok')" :disabled="busy">{{ okText }}</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        show: {
            type: Boolean,
            required: true
        },
        busy: {
            type: Boolean,
            default: false
        },
        title: {
            type: String,
            default: ''
        },
        cancelText: {
            type: String,
            default: 'Cancel'
        },
        okText: {
            type: String,
            default: 'Ok'
        },
        size: {
            type: String,
            default: 'default'
        }
    },

    mounted() {
        $(this.$refs.modal).on('hidden.bs.modal', () => {
            this.$emit('cancel');
        });
    },

    watch: {
        show(newVal) {
            if (newVal) {
                this.$nextTick(() => {
                    $(this.$refs.modal).modal('show');
                });
            } else {
                this.$nextTick(() => {
                    $(this.$refs.modal).modal('hide');
                });
            }
        }
    }
}
</script>
