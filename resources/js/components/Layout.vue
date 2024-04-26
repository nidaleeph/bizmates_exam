<template>
    <div>
        <!-- Navigation Bar -->
        <nav class="bg-gray-800 py-4">
            <div
                class="container mx-auto flex justify-between items-center px-4"
            >
                <!-- Logo -->
                <router-link to="/" class="text-white text-xl font-bold"
                    >Japan Travel</router-link
                >

                <!-- Menu Links -->
                <div class="flex space-x-4">
                    <router-link to="/about" class="text-white"
                        >About</router-link
                    >
                    <router-link to="/contact" class="text-white"
                        >Contact</router-link
                    >
                </div>
            </div>
        </nav>

        <!-- Router View -->
        <router-view></router-view>
    </div>
</template>

<script>
export default {
    name: "Layout",
};
</script>

<style scoped>
/* Add scoped styles here */
</style>
