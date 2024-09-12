<template>
    <div v-if="isVisible" class="modal show d-block" style="background-color: rgba(0, 0, 0, 0.5);">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Warning</h5>
                    <button type="button" class="btn-close" @click="onClose"></button>
                </div>
                <div class="modal-body">
                    <p>You cannot select more than 3 options.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" @click="onClose">Close</button>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
// import { defineProps, defineEmits } from 'vue';

const props = defineProps({
    isVisible: {
        type: Boolean,
        default: false,
    },
});

const emit = defineEmits(['close']);

const onClose = () => {
    emit('close');
};
</script>