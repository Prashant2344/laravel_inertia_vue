<script setup>
import Layout from '../../Layouts/Layout.vue';
import { Link, useForm, router } from '@inertiajs/vue3';
import { reactive } from 'vue';
import { Form, Field } from 'vee-validate';
import * as yup from 'yup';

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
    debugger
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
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Full Name</label>
                                            <Field name="name" type="text" id="fullname" class="form-control"
                                                :class="{ 'is-invalid': errors.name }" placeholder="Fullname" />
                                            <span class="invalid-feedback">{{ errors.name }}</span>
                                            <!-- <small class="form-control-feedback"> {{ form.errors.name }} </small> -->
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Email</label>
                                            <Field name="email" type="text" id="email"
                                                class="form-control form-control-danger"
                                                :class="{ 'is-invalid': errors.email }" placeholder="Email" />
                                            <span class="invalid-feedback">{{ errors.email }}</span>
                                            <!-- <small class="form-control-feedback"> {{ form.errors.email }} </small> -->
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- <div class="form-group has-success"> -->
                                        <div class="form-group">
                                            <label class="control-label">User Type</label>
                                            <Field as="select" class="form-control custom-select" name="type">
                                                <option value="admin">Admin</option>
                                                <option value="worker">Worker</option>
                                                <option value="customer">Customer</option>
                                            </Field>
                                            <!-- <small class="form-control-feedback"> Select user type </small> -->
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Password</label>
                                            <Field name="password" type="password" id="password"
                                                class="form-control form-control-danger" placeholder="Password" />
                                            <!-- <small class="form-control-feedback"> {{ form.errors.password }} </small> -->
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title">Profile Picture</h4>
                                                <Field name="profile" type="file" id="input-file-now" class="dropify" />
                                            </div>
                                        </div>
                                    </div>
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