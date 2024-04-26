<template>
    <div class="container mx-auto px-4 py-8">
        <img
            src="/image/AdobeStock_309107441_Preview.jpeg"
            alt="Japan Banner"
            class="block mx-auto min-h-96 w-full object-cover"
        />
        <h1 class="text-3xl font-bold text-center mb-4 pt-5">
            Japan Travel Guide
        </h1>

        <p class="text-lg text-center mb-8 max-w-md mx-auto">
            Embark on a voyage of discovery through Japan's diverse landscapes
            and rich culture! Click on a card to unveil the hidden gems of each
            captivating destination, and let the adventure begin.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <router-link
                v-for="city in cities"
                :key="city.route"
                :to="city.route"
            >
                <div
                    class="city-card bg-white rounded-lg shadow-md overflow-hidden"
                >
                    <div class="flex">
                        <img
                            :src="city.image"
                            alt=""
                            class="w-auto flex-shrink-0 h-full"
                        />

                        <div class="flex-grow px-2 py-4">
                            <h2 class="text-xl font-bold mb-2">
                                {{ city.name }}
                            </h2>
                            <p class="text-gray-700">{{ city.description }}</p>
                            <router-link
                                :to="city.route"
                                class="block mt-4 text-blue-500"
                                >Learn more</router-link
                            >
                        </div>
                    </div>
                </div>
            </router-link>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            cities: [
                {
                    name: "Tokyo",
                    description:
                        "Experience the vibrant clash of the ultramodern and the traditional in Tokyo, Japan’s bustling capital. Marvel at neon-lit skyscrapers towering over historic temples and bustling streets.",
                    route: "/tokyo",
                    image: "/image/AdobeStock_265237090_Preview.jpeg",
                },
                {
                    name: "Yokohama",
                    description:
                        "Discover the future-forward charm of Yokohama, a city south of Tokyo. Explore its futuristic port, thrill at the amusement park, and wander through the bustling Chinatown.",
                    route: "/yokohama",
                    image: "/image/AdobeStock_176608770_Preview.jpeg",
                },
                {
                    name: "Kyoto",
                    description:
                        "Step back in time in Kyoto, once the capital of Japan. Immerse yourself in its rich history as you explore classical Buddhist temples, imperial palaces, and traditional wooden houses.",
                    route: "/kyoto",
                    image: "/image/AdobeStock_204364962_Preview.jpeg",
                },
                {
                    name: "Osaka",
                    description:
                        "Experience the dynamic energy of Osaka, a large port city on the island of Honshu. Dive into its modern architecture, vibrant nightlife, and savor its hearty street food scene.",
                    route: "/osaka",
                    image: "/image/AdobeStock_262803806_Preview.jpeg",
                },
                {
                    name: "Sapporo",
                    description:
                        "Embrace winter wonderland vibes in Sapporo, the largest city of the northern island of Hokkaido. Experience the magic of the annual Sapporo Snow Festival, hit the slopes at skiing resorts, and indulge in its vibrant food scene.",
                    route: "/sapporo",
                    image: "/image/AdobeStock_308471636_Preview.jpeg",
                },
                {
                    name: "Nagoya",
                    description:
                        "Uncover the industrial charm of Nagoya, capital of Japan’s Aichi Prefecture. Immerse yourself in its bustling manufacturing and shipping hub located in central Honshu.",
                    route: "/nagoya",
                    image: "/image/AdobeStock_252871660_Preview.jpeg",
                },
            ],
        };
    },
    name: "JapanTravelGuide",
};
</script>

<style scoped>
.city-card {
    height: 200px;
    overflow: hidden;
}

.city-card p {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
}

.city-card img {
    max-width: 50%;
    height: 200px;
}
</style>
