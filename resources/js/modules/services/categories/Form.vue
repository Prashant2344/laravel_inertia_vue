<script setup>
import Layout from '../../../Layouts/Layout.vue';
import { Link, useForm, router } from '@inertiajs/vue3';
import { reactive,ref } from 'vue';
import { Form, Field } from 'vee-validate';
import * as yup from 'yup';
import TextInput from '../../../components/form/TextInput.vue';
// Get CSRF token from the meta tag
const csrfToken = ref(document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

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

    router.post('/workers/store', values, {
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
                                <h3 class="card-title">Person Info</h3>
                                <hr>
                                <div class="row p-t-20">
                                    <TextInput name="name" :message="errors.name" label="Category Name"/>
                                    <TextInput name="status" type="text" label="Status"/>
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <TextInput name="description" type="text" :message="errors.description" label="Description"/>
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