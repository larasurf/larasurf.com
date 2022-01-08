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
    const backToTop = document.querySelector('#btn-back-to-top');

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

const setupLightboxExitOnClick = () => {
    document.addEventListener('click', (e) => {
        if (e.target.classList.contains('fslightbox-container')) {
            fsLightbox.close();
        }
    });
};

const fadeInContent = () => {
    document.querySelector('body').classList.remove('opacity-0');
}

const setupSlackInvite = () => {
    document.querySelector('#link-footer-slack-invite').addEventListener('click', (e) => {
        e.preventDefault();

        window.axios.get('/api/slack-invite').then((r) => window.open(r.data.url));
    });
};

const injectGoogleTagManager = () => {
    let innerHtml = null;

    if (window.larasurfEnvironment === 'production') {
        innerHtml = "(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl+ '&gtm_auth=dTxoPW3zcC21eM0fHvKqXQ&gtm_preview=env-1&gtm_cookies_win=x';f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-K4RLG9M');"
    } else if (window.larasurfEnvironment === 'stage') {
        innerHtml = "function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl+ '&gtm_auth=2E-kJeduQAMhTUgQtZxzxg&gtm_preview=env-7&gtm_cookies_win=x';f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-K4RLG9M');";
    }

    if (innerHtml) {
        const script = document.createElement('script');
        script.innerHTML = innerHtml;
        document.body.append(script);
    }
};

const setupCookieConsentGoogleAnalytics = () => {
    const storedPreference = localStorage.getItem('larasurf-cookie-preference');

    if (!storedPreference) {
        const toast = document.querySelector('#cookie-consent-toast');

        document
            .querySelector('#cookie-consent-button-accept-limited')
            .addEventListener('click', (e) => {
                localStorage.setItem('larasurf-cookie-preference', 'limited');
                toast.classList.remove('open');
            });

        document
            .querySelector('#cookie-consent-button-accept-all')
            .addEventListener('click', (e) => {
                localStorage.setItem('larasurf-cookie-preference', 'all');
                toast.classList.remove('open');
                injectGoogleTagManager();
            });

        setTimeout(() => toast.classList.add('open'), 1500);
    } else if (storedPreference === 'all') {
        injectGoogleTagManager();
    }
};

window.addEventListener('load', (e) => {
    setupCodeBlockScrolling();
    setupCopyButtons();
    setupBackToTopButton();
    setupLightboxExitOnClick();
    setupSlackInvite();
    setupCookieConsentGoogleAnalytics();
    fadeInContent();
});
