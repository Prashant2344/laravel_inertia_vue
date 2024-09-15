<script setup>
import { Field, useField } from 'vee-validate';

const props = defineProps({
    name: {
        type: String,
        required: true
    },
    label: {
        type: String,
        required: true
    },
    message: String,
});

</script>

<template>
    <div class="col-lg-6 col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ label }}</h4>
                <Field
                    type="file"
                    :name="name"
                    id="input-file-now"
                    class="dropify"
                />
                <span class="invalid-feedback">{{ message }}</span>
            </div>
        </div>
    </div>
</template>

<style scoped>
/* Add any necessary styles here */
.form-control {
    /* Example styles */
}
</style>
