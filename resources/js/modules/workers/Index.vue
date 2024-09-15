<script setup>
import Layout from '../../Layouts/Layout.vue';
import { Link } from '@inertiajs/vue3';

defineProps({
    workers: {
        type: Object,
        requited: true
    }
});
</script>
<template>
    <Layout>
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
                    <Link href="/workers/create" class="btn btn-info d-none d-lg-block m-l-15"><i
                            class="fa fa-plus-circle"></i> Add New Worker</Link>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Service Provider List </h4>
                    <!-- <h6 class="card-subtitle">Create responsive tables by wrapping any <code>.table</code> in
                        <code>.table-responsive </code></h6> -->
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>S.N</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Type</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(worker,index) in workers" :key="index">
                                    <td><a href="javascript:void(0)">{{ index+1 }}</a></td>
                                    <td>{{worker.name}}</td>
                                    <td>{{worker.email}} </td>
                                    <td>{{worker.type}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- column -->
    </Layout>
</template>