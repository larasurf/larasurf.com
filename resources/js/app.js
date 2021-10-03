import { createApp } from 'vue';

import MainMenu from './components/MainMenu.vue';

require('./bootstrap');

createApp(MainMenu).mount('#main-menu');

const setupCopyButtons = () => {
    const copyButtons = document.querySelectorAll('.copy-code');

    for (let i = 0; i < copyButtons.length; i++) {
        copyButtons[i].addEventListener('click', (e) => {
            if (e && e.target && e.target.dataset && e.target.dataset.code) {
                navigator.clipboard.writeText(e.target.dataset.code);
            }
        });
    }
}

const fadeInContent = () => {
    document.querySelector('body').classList.remove('opacity-0');
}

setupCopyButtons();
fadeInContent();
