import "@fontsource/plus-jakarta-sans/400.css"
import "@fontsource/plus-jakarta-sans/500.css"
import "@fontsource/plus-jakarta-sans/700.css"
import "@fontsource/plus-jakarta-sans/800.css"
import { createApp } from 'vue';

import MainMenu from './components/MainMenu.vue';

require('./bootstrap');

createApp(MainMenu).mount('#main-menu');
