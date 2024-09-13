<script setup>
import Layout from '../../Layouts/Layout.vue';
import { Link,useForm } from '@inertiajs/vue3';
import {reactive} from 'vue';
import axios from 'axios';

const form = useForm({
    name:'',
    email:'',
    type:'customer',
    password:''
})

const handleSubmit = () => {
    form.post('/workers/store', {
        onError: () => form.reset('password'),
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
                        <form @submit.prevent="handleSubmit">
                            <div class="form-body">
                                <h3 class="card-title">Person Info</h3>
                                <hr>
                                <div class="row p-t-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Full Name</label>
                                            <input type="text" id="fullname" class="form-control"
                                                placeholder="Fullname" v-model="form.name">
                                            <small class="form-control-feedback"> {{ form.errors.name }} </small>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Email</label>
                                            <input type="text" id="email" class="form-control form-control-danger"
                                                placeholder="Email" v-model="form.email">
                                            <small class="form-control-feedback"> {{ form.errors.email }} </small>
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
                                            <select class="form-control custom-select" v-model="form.type">
                                                <option value="admin">Admin</option>
                                                <option value="worker">Worker</option>
                                                <option value="customer">Customer</option>
                                            </select>
                                            <!-- <small class="form-control-feedback"> Select user type </small> -->
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Password</label>
                                            <input type="password" id="password" class="form-control form-control-danger"
                                                placeholder="Password" v-model="form.password">
                                            <small class="form-control-feedback"> {{ form.errors.password }} </small>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success" :disabled="form.processing">
                                    <i class="fa fa-check"></i>
                                    Save
                                </button>
                                <button type="button" class="btn btn-inverse">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row -->
    </Layout>
</template>