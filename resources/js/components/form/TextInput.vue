<script setup>
import { Field } from 'vee-validate';
// const model = defineModel({

// })
defineProps({
    name: {
        type: String,
        required: true
    },
    label: {
        type: String,
        required: true
    },
    type: {
        type: String,
        default: 'text'
    },
    message: String
})
</script>

<template>
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">{{ label }}</label>
            <Field :name="name" :type="type" :id="name" class="form-control" :class="{ 'is-invalid': message }"
                :placeholder=label />
            <span class="invalid-feedback">{{ message }}</span>
            <!-- <small class="form-control-feedback"> {{ form.errors.name }} </small> -->
        </div>
    </div>

    <!-- <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Full Name</label>
            <Field name="name" type="text" id="fullname" class="form-control" :class="{ 'is-invalid': errors.name }"
                placeholder="Fullname" />
            <span class="invalid-feedback">{{ errors.name }}</span>
        </div>
    </div> -->
</template>