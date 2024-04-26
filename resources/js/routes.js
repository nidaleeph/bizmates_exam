import { createRouter, createWebHistory } from "vue-router";
import Layout from "./components/Layout.vue";
import Home from "./components/Home.vue";
import About from "./components/About.vue";
import Contact from "./components/Contact.vue";
import NotFound from "./components/NotFound.vue"; // Import the NotFound component
import Tokyo from "./vue/places/Tokyo.vue"; // Import the Tokyo component
import Yokohama from "./vue/places/Yokohama.vue"; // Import the Tokyo component
import Nagoya from "./vue/places/Nagoya.vue"; // Import the Tokyo component
import Osaka from "./vue/places/Osaka.vue"; // Import the Tokyo component
import Sapporo from "./vue/places/Sapporo.vue"; // Import the Tokyo component
import Kyoto from "./vue/places/Kyoto.vue"; // Import the Tokyo component

const routes = [
    {
        path: "/",
        component: Layout,
        children: [
            { path: "", component: Home },
            { path: "/tokyo", component: Tokyo },
            { path: "/yokohama", component: Yokohama },
            { path: "/nagoya", component: Nagoya },
            { path: "/osaka", component: Osaka },
            { path: "/sapporo", component: Sapporo },
            { path: "/kyoto", component: Kyoto },
            // { path: "/about", component: About },
            // { path: "/contact", component: Contact },
        ],
    },

    // Catch-all route for 404 errors
    {
        path: "/:pathMatch(.*)*",
        name: "NotFound",
        component: NotFound,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
