<template>
    <div class="flex flex-col">
        <div class="p-4 bg-white shadow-md">
            <h2 class="text-2xl font-bold mb-2 inline-block">
                {{ name }} 5-Day Weather Forecast
            </h2>
            <div class="inline-block ml-4">
                <button
                    @click="toggleForecastVisibility"
                    class="mb-2 px-4 py-2 bg-blue-500 text-white rounded-md"
                    :class="{
                        'bg-green-500': isForecastVisible,
                        'bg-blue-500': !isForecastVisible,
                    }"
                >
                    {{ isForecastVisible ? "Hide Forecast" : "Show Forecast" }}
                </button>
            </div>
            <div v-if="isForecastVisible" class="overflow-x-auto flex">
                <div v-if="weather" class="flex space-x-4">
                    <div
                        v-for="(forecast, index) in weather.list"
                        :key="index"
                        class="bg-gray-100 p-4 rounded-lg shadow-md w-72"
                    >
                        <div class="flex items-center mb-2">
                            <img
                                :src="getWeatherIcon(forecast.weather[0].icon)"
                                alt="Weather Icon"
                                class="w-8 h-8 mr-2"
                            />
                            <p class="text-lg">
                                {{
                                    moment(forecast.dt_txt).format(
                                        "MMMM D, YYYY h:mm:ss a"
                                    )
                                }}
                            </p>
                        </div>
                        <p class="text-gray-600">
                            {{ forecast.weather[0].description }}
                        </p>
                        <p>
                            Temperature:
                            {{ kelvinToCelsius(forecast.main.temp) }}°C
                        </p>
                        <p>
                            Feels Like:
                            {{ kelvinToCelsius(forecast.main.feels_like) }}°C
                        </p>
                        <p>Humidity: {{ forecast.main.humidity }}%</p>
                    </div>
                </div>
                <div v-if="!weather" class="flex justify-center items-center">
                    <p>No weather data available.</p>
                </div>
            </div>
        </div>
        <div class="container mx-auto px-4 py-8 grid grid-cols-2 gap-2">
            <div class="px-4 md:col-span-1 col-span-2">
                <img
                    :src="imageSrc"
                    alt="Nagoya Banner"
                    class="block w-full object-cover mx-auto"
                />
                <div>
                    <h1 class="text-3xl font-bold text-center mb-4 pt-5">
                        {{ name }} Travel Guide
                    </h1>
                    <div
                        v-if="weather && weather.currentForecast"
                        class="ml-8 px-4 pb-4"
                    >
                        <div
                            class="p-4 bg-white shadow-md grid grid-cols-6 gap-4"
                        >
                            <div
                                class="lg:col-span-3 col-span-6 flex flex-col justify-center"
                            >
                                <h2 class="text-2xl font-bold mb-2">
                                    Current Forecast
                                </h2>
                                <div class="flex items-center mb-2">
                                    <img
                                        :src="
                                            getWeatherIcon(
                                                weather.currentForecast
                                                    .weather[0].icon
                                            )
                                        "
                                        alt="Weather Icon"
                                        class="w-8 h-8 mr-2"
                                    />
                                    <p class="text-lg">
                                        {{
                                            moment(
                                                weather.currentForecast.dt *
                                                    1000
                                            ).format("MMMM D, YYYY h:mm:ss a")
                                        }}
                                    </p>
                                </div>
                                <p>
                                    Temperature:
                                    {{
                                        kelvinToCelsius(
                                            weather.currentForecast.main.temp
                                        )
                                    }}°C
                                </p>
                                <p>
                                    Feels Like:
                                    {{
                                        kelvinToCelsius(
                                            weather.currentForecast.main
                                                .feels_like
                                        )
                                    }}°C
                                </p>
                                <p>
                                    Humidity:
                                    {{ weather.currentForecast.main.humidity }}%
                                </p>
                                <p>
                                    Description:
                                    {{
                                        weather.currentForecast.weather[0]
                                            .description
                                    }}
                                </p>
                            </div>
                            <div
                                class="lg:col-span-3 col-span-6 flex justify-center items-center"
                            >
                                <p class="text-lg text-center">
                                    {{ cityDescription }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="md:col-span-1 col-span-2"
                v-if="apiFourSquareData.length > 0"
            >
                <p class="text-xl text-center mb-4 font-semibold">
                    {{ apiFourSquareData.length }} places to visit near this
                    place.
                </p>
                <div
                    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 gap-4"
                >
                    <div
                        v-for="(place, index) in apiFourSquareData"
                        :key="index"
                        class="bg-white rounded-lg shadow-md p-4 h-full flex flex-col"
                    >
                        <h3 class="text-lg font-semibold">
                            {{ place.name }}
                        </h3>
                        <p class="text-gray-600 location-address mb-4">
                            {{ place.location.formatted_address }}
                        </p>
                        <div class="flex items-center mt-auto">
                            <img
                                :src="
                                    place.categories[0].icon.prefix +
                                    '32' +
                                    place.categories[0].icon.suffix
                                "
                                alt="Category Icon"
                                class="w-6 h-6 mr-2 bg-teal-500"
                            />
                            <p class="text-red-500">
                                {{ place.categories[0].name }}
                            </p>
                        </div>
                        <a
                            class="text-blue-500 ml-auto pt-2"
                            href="#"
                            @click="
                                showMapModal(
                                    place.geocodes.main.latitude,
                                    place.geocodes.main.longitude
                                )
                            "
                            >View map</a
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="mapModal" class="modal">
        <div class="modal-content">
            <span class="close" @click="closeMapModal()">&times;</span>
            <iframe
                id="mapFrame"
                width="100%"
                height="600"
                frameborder="0"
                style="border: 0"
                allowfullscreen
            ></iframe>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import moment from "moment";

export default {
    name: "Yokohama",
    data() {
        return {
            weather: null,
            apiFourSquareData: [],
            isForecastVisible: false,
            name: "Yokohama",
            moment: moment,
            imageSrc: "/image/AdobeStock_176608770_Preview.jpeg",
            cityDescription: `Discover the future-forward charm of Yokohama, a city south of Tokyo. Explore its futuristic port, thrill at the amusement park, and wander through the bustling Chinatown.`,
        };
    },
    created() {
        this.$root.eventBus.toggleLoading(true);
        Promise.all([this.fetchWeather(), this.fetchApiFourSquare()])
            .then(() => {
                this.$root.eventBus.toggleLoading(false);
            })
            .catch((error) => {
                console.error(error);
                this.$root.eventBus.toggleLoading(false);
            });
    },
    methods: {
        async fetchWeather() {
            return axios
                .post("/api/weather-forecast", {
                    city: this.name,
                })
                .then((response) => {
                    this.weather = response.data;
                });
        },
        async fetchApiFourSquare() {
            return axios
                .post("/api/apiFourSquare", {
                    city: this.name,
                })
                .then((response) => {
                    this.apiFourSquareData = response.data.results;
                    console.log(this.apiFourSquareData);
                });
        },
        showMapModal(latitude, longitude) {
            var modal = document.getElementById("mapModal");
            var mapFrame = document.getElementById("mapFrame");
            mapFrame.src =
                "https://maps.google.com/maps?q=" +
                latitude +
                "," +
                longitude +
                "&t=&z=15&ie=UTF8&iwloc=&output=embed";
            modal.style.display = "block";
        },
        closeMapModal() {
            var modal = document.getElementById("mapModal");
            modal.style.display = "none";
        },
        kelvinToCelsius(kelvin) {
            return (kelvin - 273.15).toFixed(2);
        },
        getWeatherIcon(icon) {
            return `/icons/${icon}.png`;
        },
        toggleForecastVisibility() {
            this.isForecastVisible = !this.isForecastVisible;
        },
    },
};
</script>

<style scoped>
/* Modal styles */
.modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.4);
}
.modal-content {
    background-color: #fefefe;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    max-width: 1000px;
}
.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}
.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}
.location-address {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    flex-grow: 1;
}
</style>
