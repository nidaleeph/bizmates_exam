<!-- Footer.vue -->

<template>
    <footer class="bg-gray-200 py-4 px-8">
        <div class="container mx-auto flex justify-between items-center h-full">
            <div>
                <router-link to="/about" class="mr-4">About</router-link>
                <router-link to="/privacy" class="mr-4">Privacy</router-link>
                <router-link to="/terms" class="mr-4">Terms</router-link>
            </div>
            <div>
                <router-link to="/feedback" class="mr-4">Feedback</router-link>
                <router-link to="/help-center">Help Center</router-link>
            </div>
        </div>
    </footer>
</template>

<script>
export default {
    name: "Footer",
};
</script>

<style scoped>
footer {
    margin-top: auto;
}
</style>
