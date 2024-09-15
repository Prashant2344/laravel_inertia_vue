<script setup>
import { ref, watch } from 'vue';
import { Field, useField } from 'vee-validate';

// Define props
const props = defineProps({
    name: {
        type: String,
        required: true
    },
    label: {
        type: String,
        required: true
    },
    options: {
        type: Array,
        required: true
    },
    defaultValue: {
        type: String,
        default: ''
    },
    message: String
});

// // Internal state
// const internalValue = ref(props.defaultValue);

// // Watch for changes in the default value and update internal value
// watch(() => props.defaultValue, (newValue) => {
//     internalValue.value = newValue;
// });

// // Emit changes to parent
// const emit = defineEmits(['update:modelValue']);

// const handleChange = (event) => {
//     emit('update:modelValue', event.target.value);
// };
</script>

<template>
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">{{ label }}</label>
            <Field 
                as="select" 
                :name="name" 
                class="form-control custom-select" 
                :id="name" 
                :class="{ 'is-invalid': message }"
                :value="defaultValue"
            >
                <option 
                    v-for="option in options" 
                    :key="option.value" 
                    :value="option.value"
                >
                    {{ option.text }}
                </option>
            </Field>
            <span class="invalid-feedback">{{ message }}</span>
        </div>
    </div>
</template>
