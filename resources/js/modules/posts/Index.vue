<script setup>
import Layout from '../../Layouts/Layout.vue';
import { Link } from '@inertiajs/vue3';

defineProps({
    posts: {
        type: Object,
        requited: true
    }
});
</script>
<template>
    <Layout>
        <!-- column -->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Responsive Table </h4>
                    <h6 class="card-subtitle">Create responsive tables by wrapping any <code>.table</code> in
                        <code>.table-responsive </code></h6>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Invoice</th>
                                    <th>User</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Country</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="post in posts">
                                    <td><a href="javascript:void(0)">Order #26589</a></td>
                                    <td>{{ post.title }}</td>
                                    <td><span class="text-muted"><i class="fa fa-clock-o"></i> Oct 16, 2017</span> </td>
                                    <td>$45.00</td>
                                    <td>
                                        <div class="label label-table label-success">Paid</div>
                                    </td>
                                    <td>EN</td>
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