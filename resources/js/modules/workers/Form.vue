<script setup>
import Layout from '../../Layouts/Layout.vue';
import { Link, useForm, router } from '@inertiajs/vue3';
import { reactive } from 'vue';
import { Form, Field } from 'vee-validate';
import * as yup from 'yup';
import TextInput from '../../components/form/TextInput.vue';
import SelectOption from '../../components/form/SelectOption.vue';
import FileInput from '../../components/form/FileInput.vue';

const formValues = reactive({
    name: '',
    email: '',
    type: 'customer',
    profile: '',
    password: ''
});

const schema = yup.object({
    name: yup.string().required(),
    email: yup.string().email().required(),
    password: yup.string().required().min(8),
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

const userTypeOptions = [
    { value: 'admin', text: 'Admin' },
    { value: 'worker', text: 'Worker' },
    { value: 'customer', text: 'Customer' }
];
</script>
<template>
    <Layout>
        <!-- Row -->
        <!-- column -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Service Provider</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard 1</li>
                    </ol>
                    <Link href="/workers" class="btn btn-info d-none d-lg-block m-l-15"><i
                        class="fa fa-plus-circle"></i> Worker List</Link>
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
                            <div class="form-body">
                                <h3 class="card-title">Person Info</h3>
                                <hr>
                                <div class="row p-t-20">
                                    <TextInput name="name" :message="errors.name" label="Full Name"/>
                                    <TextInput name="email" type="email" :message="errors.email" label="Email"/>
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <SelectOption name="type" :options="userTypeOptions" label="User Type" defaultValue="worker"/>
                                    <TextInput name="password" type="password" :message="errors.password" label="Password"/>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <FileInput name="profile" type="file" label="Profile Picture"/>
                                    
                                    <!--/span-->

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