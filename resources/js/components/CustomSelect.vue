<template>
    <div class="dropdown" ref="dropdownRef">
        <div class="d-flex align-items-center cursor-pointer p-2 border rounded-lg shadow-md"
            :class="{ 'bg-disabled': isDisabled, 'bg-active': !isDisabled }" @click="toggleDropdown">
            <div class="d-flex flex-nowrap overflow-auto">
                <div v-if="selectedOptions.length > 0" class="selected-options-container">
                    <div v-for="option in selectedOptions" :key="option.value"
                        class="selected-option-item">
                        <img v-if="option.profilePicture" :src="option.profilePicture" :alt="option.label"
                            class="rounded-circle" style="width: 2rem; height: 2rem; object-fit: cover;" />
                        <div v-else
                            :class="`d-flex align-items-center justify-content-center rounded-circle text-white ${colorMap[option.value % colorMap.length]}`"
                            style="width: 2rem; height: 2rem;">
                            {{ getInitials(option.label) }}
                        </div>
                    </div>
                </div>
                <span v-else>{{ placeholder }}</span>
            </div>
        </div>
        <div v-if="showDropdown" class="dropdown-menu show" style="max-height: 350px; overflow-y: auto;">
            <div class="p-2">
                <input type="text" class="form-control" placeholder="Search..." v-model="search" />
            </div>
            <div v-if="selectedOptions.length > 0" class="dropdown-header">Assigned</div>
            <div v-for="option in selectedOptions" :key="option.value" class="dropdown-item d-flex align-items-center">
                <img v-if="option.profilePicture" :src="option.profilePicture" :alt="option.label"
                    class="rounded-circle me-2" style="width: 2rem; height: 2rem; object-fit: cover;" />
                <div v-else
                    :class="`d-flex align-items-center justify-content-center rounded-circle text-white me-2 ${colorMap[option.value % colorMap.length]}`"
                    style="width: 2rem; height: 2rem;">
                    {{ getInitials(option.label) }}
                </div>
                <span class="flex-grow-1">{{ option.label }}</span>
                <button class="btn btn-link text-danger" @click.stop="removeOption(option)">
                    <i class="fas fa-times" style="color: grey;"></i>
                </button>
            </div>
            <div class="dropdown-header">Suggestions</div>
            <div v-for="option in filteredOptions" :key="option.value" class="dropdown-item d-flex align-items-center"
                @click="selectOption(option)">
                <img v-if="option.profilePicture" :src="option.profilePicture" :alt="option.label"
                    class="rounded-circle me-2" style="width: 2rem; height: 2rem; object-fit: cover;" />
                <div v-else
                    :class="`d-flex align-items-center justify-content-center rounded-circle text-white me-2 ${colorMap[option.value % colorMap.length]}`"
                    style="width: 2rem; height: 2rem;">
                    {{ getInitials(option.label) }}
                </div>
                <span>{{ option.label }}</span>
            </div>
        </div>
        <Modal v-if="showModal" :isVisible="showModal" @close="showModal = false" />
    </div>
</template>


<script setup>
import { ref, computed, onMounted, watch } from 'vue';
import Modal from './Modal.vue';
import './style.scss';

const props = defineProps({
    options: {
        type: Array,
        required: true,
        default: () => []
    },
    maxSelection: {
        type: Number,
        default: 3
    },
    selectedOptions: {
        type: Array,
        required: true,
        default: () => []
    },
    onSelectChange: {
        type: Function,
        required: true
    },
    placeholder: {
        type: String,
        default: 'Select...'
    },
    isDisabled: {
        type: Boolean,
        default: false
    }
});

const showDropdown = ref(false);
const showModal = ref(false);
const search = ref('');
const dropdownRef = ref(null);

const colorMap = [
    'bg-danger',
    'bg-success',
    'bg-primary',
    'bg-warning',
    'bg-info',
    'bg-secondary',
    'bg-black'
];

const getInitials = (label) => {
    const names = label.split(' ');
    return names[0][0] + (names[1] ? names[1][0] : '');
};

const filteredOptions = computed(() => {
    return props.options.filter(option =>
        option.label.toLowerCase().includes(search.value.toLowerCase())
    ).filter(option => !props.selectedOptions.some(o => o.value === option.value));
});

const selectOption = (option) => {
    if (props.selectedOptions.length >= props.maxSelection && !props.selectedOptions.some(o => o.value === option.value)) {
        showModal.value = true;
        return;
    }

    let updatedSelections;
    if (props.selectedOptions.some(o => o.value === option.value)) {
        updatedSelections = props.selectedOptions.filter(o => o.value !== option.value);
    } else {
        updatedSelections = [...props.selectedOptions, option];
    }

    props.onSelectChange(updatedSelections);
};

const removeOption = (option) => {
    const updatedSelections = props.selectedOptions.filter(o => o.value !== option.value);
    props.onSelectChange(updatedSelections);
};

const toggleDropdown = () => {
    if (!props.isDisabled) {
        showDropdown.value = !showDropdown.value;
    }
};

const handleClickOutside = (event) => {
    if (dropdownRef.value && !dropdownRef.value.contains(event.target)) {
        showDropdown.value = false;
    }
};

onMounted(() => {
    document.addEventListener('mousedown', handleClickOutside);
});

watch(() => showDropdown.value, (newVal) => {
    if (!newVal) {
        search.value = '';
    }
});
</script>

<style scoped>
/* Custom styles */
</style>
