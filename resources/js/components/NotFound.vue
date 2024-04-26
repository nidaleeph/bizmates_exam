<template>
    <div class="flex flex-col items-center justify-center h-screen">
        <h1 class="text-5xl font-bold text-gray-800 mb-4">404 Not Found</h1>
        <p class="text-lg text-gray-600 mb-8">
            Sorry, the page you are looking for does not exist.
        </p>
        <router-link to="/" class="text-blue-500 hover:underline">
            Go back to home
        </router-link>
    </div>
</template>

<script>
export default {
    name: "NotFound",
};
</script>

<style scoped></style>
