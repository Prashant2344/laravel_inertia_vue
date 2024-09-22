<script setup>
import Layout from '../../../Layouts/Layout.vue';
import { Link, useForm, router } from '@inertiajs/vue3';
import { reactive,ref,onMounted } from 'vue';
import { Form, Field } from 'vee-validate';
import * as yup from 'yup';
import TextInput from '../../../components/form/TextInput.vue';
import SelectOption from '../../../components/form/SelectOption.vue';
import FileInput from '../../../components/form/FileInput.vue';
import axios from 'axios';
// Get CSRF token from the meta tag
const csrfToken = ref(document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

const categoryOptions = ref([{value:0,text:'Parent'}]);
const formValues = reactive({
    name: '',
    description: '',
    status:''
});

const schema = yup.object({
    name: yup.string().required(),
    description: yup.string().required()
});

const handleSubmit = (values, { setFieldError, setErrors }) => {
    console.log(values)
    // form.post('/workers/store', {
    //     onError: () => form.reset('password'),
    // });

    router.post('/services/categories/store', values, {
        // onFinish: () => setIsFormSubmitting(false),
        onError: (errors) => {
            console.log(errors)
            if (errors) {
                setErrors(errors);
            }
            // setFieldError('email',errors.email);
        },
        onSuccess: () => console.log("asdfasdf")
    });
}

const getCategories = () => {
    axios.get('/services/categories/getCategories')
    .then((response)=>{
        categoryOptions.value = [
            ...categoryOptions.value,
            ...response.data.map((category) => {
            return {
                value: category.id,
                text: category.name
            }
        })];
    }).catch((error) => {
        console.error("Error fetching categories:", error);
    });
}

onMounted(() => {
    getCategories();
});

const statusOptions = [
    { value: 'active', text: 'Active' },
    { value: 'disable', text: 'Disable' }
];
</script>
<template>
    <Layout>
        <!-- Row -->
        <!-- column -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Service Category</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard 1</li>
                    </ol>
                    <Link href="/services/categories" class="btn btn-info d-none d-lg-block m-l-15"><i
                        class="fa fa-plus-circle"></i> Category List</Link>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <h4 class="m-b-0 text-white">Other Sample form</h4>
                    </div>
                    <div class="card-body">
                        <Form @submit="handleSubmit" :validation-schema="schema" v-slot="{ errors }">
                            <input type="hidden" name="_token" :value="csrfToken">
                            <div class="form-body">
                                <!-- <h3 class="card-title">Person Info</h3> -->
                                <hr>
                                <div class="row">
                                    <TextInput name="name" :message="errors.name" label="Category Name"/>
                                    <SelectOption name="category_id" :options="categoryOptions" label="Parent Category" defaultValue="0"/>
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <SelectOption name="status" :options="statusOptions" label="Status" defaultValue="active"/>
                                    <TextInput name="description" type="text" :message="errors.description" label="Description"/>
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <FileInput name="icon" type="file" label="Category Icon"/>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success" :disabled="formValues.processing">
                                    <i class="fa fa-check"></i>
                                    Save
                                </button>
                                <button type="button" class="btn btn-inverse">Cancel</button>
                            </div>
                        </Form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row -->
    </Layout>
</template>