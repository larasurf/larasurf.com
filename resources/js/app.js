import { createApp } from 'vue';

import MainMenu from './components/MainMenu.vue';

require('fslightbox');
require('./bootstrap');

const Emitter = require('tiny-emitter');
window.eventBus = new Emitter();

createApp(MainMenu).mount('#main-menu');

const eventListeners = [];

const codeBlockScrollingEventListener = _.debounce((e) => {
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
}, 50);

const setupCodeBlockScrolling = () => {
    const codeBlocks = document.querySelectorAll('.code');

    for (let i = 0; i < codeBlocks.length; i++) {
        codeBlocks[i].addEventListener('scroll', codeBlockScrollingEventListener);
        eventListeners.push({
            el: codeBlocks[i],
            type: 'scroll',
            fn: codeBlockScrollingEventListener,
        });
    }
};

const copyButtonsEventListener = (e) => {
    if (e && e.target && e.target.dataset && e.target.dataset.code) {
        navigator.clipboard.writeText(e.target.dataset.code);
    }
};

const setupCopyButtons = () => {
    const copyButtons = document.querySelectorAll('.copy-code');

    for (let i = 0; i < copyButtons.length; i++) {
        copyButtons[i].addEventListener('click', copyButtonsEventListener);
        eventListeners.push({
            el: copyButtons[i],
            type: 'click',
            fn: copyButtonsEventListener,
        });
    }
};

const backToTopButtonClickEventListener = (e) => {
    window.scrollTo(0, 0);
};

const backToTopButtonScrollEventListener = (e) => {
    const backToTop = document.querySelector('#btn-back-to-top');

    if (window.scrollY > 50) {
        backToTop.classList.add('scrolled');
    } else {
        backToTop.classList.remove('scrolled');
    }
};

const setupBackToTopButton = () => {
    const backToTop = document.querySelector('#btn-back-to-top');

    if (backToTop) {
        backToTop.addEventListener('click', backToTopButtonClickEventListener);
        eventListeners.push({
            el: backToTop,
            type: 'click',
            fn: backToTopButtonClickEventListener,
        });

        window.addEventListener('scroll', backToTopButtonScrollEventListener);
        eventListeners.push({
            el: window,
            type: 'scroll',
            fn: backToTopButtonScrollEventListener,
        });
    }
};

const lightboxExitOnClickEventListener = (e) => {
    if (e.target.classList.contains('fslightbox-container')) {
        fsLightbox.close();
    }
};

const setupLightboxExitOnClick = () => {
    document.addEventListener('click', lightboxExitOnClickEventListener);
    eventListeners.push({
        el: document,
        type: 'click',
        fn: lightboxExitOnClickEventListener,
    });
};

const fadeInContent = () => {
    document.querySelector('body').classList.remove('opacity-0');
}

const removeEventListeners = () => {
    while (eventListeners.length) {
        const listener = eventListeners.pop();
        listener.el.removeEventListener(listener.type, listener.fn);
    }
};

window.addEventListener('load', (e) => {
    window.eventBus.on('docs-content-updated', () => {
        removeEventListeners();
        setupCodeBlockScrolling();
        setupCopyButtons();
        setupBackToTopButton();
        setupLightboxExitOnClick();
        refreshFsLightbox();
    });

    setupCodeBlockScrolling();
    setupCopyButtons();
    setupBackToTopButton();
    setupLightboxExitOnClick();
    fadeInContent();
});
