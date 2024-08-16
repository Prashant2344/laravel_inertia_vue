<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    posts: {
        type: Object,
        requited: true
    }
});
</script>
<template>
    <Link href="/">Home</Link>
    <Link href="/posts">Post</Link>
    <p v-for="post in posts">
        <h1>{{ post.title }}</h1>
    </p>
</template>