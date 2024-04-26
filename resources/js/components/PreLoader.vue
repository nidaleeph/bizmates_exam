<template>
    <div
        v-if="loading"
        class="preloader fixed top-0 left-0 w-full h-full flex items-center justify-center bg-black bg-opacity-80"
    >
        <span class="loader"></span>
    </div>
</template>

<script>
export default {
    props: {
        loading: {
            type: Boolean,
            default: false,
            required: true,
        },
    },
    mounted() {
        console.log("loader");
    },
};
</script>

<style>
.preloader {
    z-index: 9999;
}

.loader {
    width: 48px;
    height: 48px;
    border: 5px solid #fff;
    border-bottom-color: #007bff;
    border-radius: 50%;
    display: inline-block;
    box-sizing: border-box;
    animation: rotation 1s linear infinite;
}

@keyframes rotation {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}
</style>
