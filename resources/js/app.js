import { createApp } from 'vue';

import MainMenu from './components/MainMenu.vue';

require('fslightbox');
require('./bootstrap');

createApp(MainMenu).mount('#main-menu');

const setupCodeBlockScrolling = () => {
    const codeBlocks = document.querySelectorAll('.code');

    for (let i = 0; i < codeBlocks.length; i++) {
        codeBlocks[i].addEventListener('scroll', _.debounce((e) => {
            if (e.target.scrollLeft > 0 && e.target.scrollLeft < e.target.scrollWidth - e.target.offsetWidth) {
                e.target.classList.remove('dont-show-gradient-left');
                e.target.parentNode.classList.remove('dont-show-gradient-right');
            } else if (e.target.scrollLeft === 0) {
                e.target.classList.add('dont-show-gradient-left');
                e.target.parentNode.classList.remove('dont-show-gradient-right');
            } else {
                e.target.classList.remove('dont-show-gradient-left');
                e.target.parentNode.classList.add('dont-show-gradient-right');
            }
        }, 50));
    }
};

const setupCopyButtons = () => {
    const copyButtons = document.querySelectorAll('.copy-code');

    for (let i = 0; i < copyButtons.length; i++) {
        copyButtons[i].addEventListener('click', (e) => {
            if (e && e.target && e.target.dataset && e.target.dataset.code) {
                navigator.clipboard.writeText(e.target.dataset.code);
            }
        });
    }
};

const setupBackToTopButton = () => {
    const backToTop = document.querySelector('#back-to-top-button');

    if (backToTop) {
        backToTop.addEventListener('click', (e) => {
            window.scrollTo(0, 0);
        });

        window.addEventListener('scroll', (e) => {
            if (window.scrollY > 50) {
                backToTop.classList.add('scrolled');
            } else {
                backToTop.classList.remove('scrolled');
            }
        });
    }
};

const fadeInContent = () => {
    document.querySelector('body').classList.remove('opacity-0');
}

setupCodeBlockScrolling();
setupCopyButtons();
setupBackToTopButton();
fadeInContent();
