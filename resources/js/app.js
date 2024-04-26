import { createApp } from "vue";
import App from "./App.vue";
import router from "./routes";
import Layout from "./components/Layout.vue";
import Preload from "./components/PreLoader.vue";
import { LoadingPlugin } from "vue-loading-overlay";
import "vue-loading-overlay/dist/css/index.css";

const app = createApp(App);

// Create a global event bus
const eventBus = createApp({});
app.config.globalProperties.eventBus = eventBus;

app.use(router);
app.use(LoadingPlugin);

// Register the Layout and Preload components globally
app.component("Layout", Layout);
app.component("Preload", Preload);

app.mount("#app");
