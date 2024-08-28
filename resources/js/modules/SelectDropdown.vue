<script setup>
import { ref, onMounted } from 'vue';
import CustomSelect from '../Components/CustomSelect.vue';
import Layout from '../Layouts/Layout.vue';

// Example options
const options = [
    { value: 1, label: 'John Doe', profilePicture: 'https://picsum.photos/id/1012/150' },
    { value: 2, label: 'Jane Doe', profilePicture: '' },
    { value: 3, label: 'Bob Smith', profilePicture: 'https://picsum.photos/id/1013/150' },
    { value: 4, label: 'Alice Johnson', profilePicture: 'https://picsum.photos/id/1011/150' },
    { value: 5, label: 'Mike Brown', profilePicture: '' },
];

const selectedOptions = ref([]);

const handleSelectChange = (updatedSelections) => {
    selectedOptions.value = updatedSelections;
};

// Initialize selected options on mount
onMounted(() => {
    selectedOptions.value = [
        { value: 1, label: 'John Doe', profilePicture: 'https://picsum.photos/id/1012/150' },
        { value: 2, label: 'Jane Doe', profilePicture: '' },
    ];
});
</script>

<style scoped>
/* Add any styles if needed */
</style>

<template>
    <Layout>
        <div>
            <CustomSelect :options="options" :maxSelection="3" :selectedOptions="selectedOptions"
                @selectChange="handleSelectChange" />
        </div>
    </Layout>

</template>