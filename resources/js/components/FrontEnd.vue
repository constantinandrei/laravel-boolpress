<template>
    <div>
        <TheNav></TheNav>
        <router-view></router-view>
    </div>
    
</template>

<script>
    import TheNav from './TheNav.vue';
    export default {
        components: {TheNav}
    }
</script>
