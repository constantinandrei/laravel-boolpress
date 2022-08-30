<template>
    <div>
        <TheNav></TheNav>
        <ThePosts></ThePosts>
    </div>
    
</template>

<script>
    import TheNav from './TheNav.vue';
    import ThePosts from './ThePosts.vue';
    export default {
        components: {TheNav, ThePosts}
    }
</script>
