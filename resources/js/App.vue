<template>
    <div id="app">
        <Preload :loading="isLoading"></Preload>
        <router-view></router-view>

        <Footer v-if="!is404ErrorPage" />
    </div>
</template>

<script>
import Footer from "./components/Footer.vue";

export default {
    name: "App",
    components: {
        Footer,
    },
    data() {
        return {
            is404ErrorPage: false,
            isLoading: false,
        };
    },
    watch: {
        $route(to) {
            this.is404ErrorPage = to.name === "NotFound";
        },
    },
    created() {
        this.$root.eventBus = this;
    },
    methods: {
        toggleLoading(isLoading) {
            this.isLoading = isLoading;
        },
    },
};
</script>

<style>
/* Add your main styles here */
</style>
