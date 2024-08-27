<script setup>
import Sidebar from './Sidebar.vue';
import Navbar from './Navbar.vue';
import Footer from './Footer.vue';
import { Link } from '@inertiajs/vue3';

</script>
<template>
    <div id="main-wrapper">
        <Navbar></Navbar>
        <hr><hr>
        <Sidebar></Sidebar>
        <div class="page-wrapper">
            <div class="container-fluid">
                <slot></slot>
            </div>
        </div>
        <!-- <Footer></Footer> -->
    </div>
</template>