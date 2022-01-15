import { createApp } from 'vue';
import JSConfetti from 'js-confetti';


import DocumentationSidebarMenu from './components/DocumentationSidebarMenu.vue';
import DocumentationSearchBar from './components/DocumentationSearchBar.vue';

createApp(DocumentationSidebarMenu).mount('#docs-menu');
createApp(DocumentationSearchBar).mount('#docs-search');

const checkboxes = document.querySelectorAll('input[type="checkbox"]');
const jsConfetti = new JSConfetti();

checkboxes.forEach((checkbox) => {
    checkbox.addEventListener('change', function () {
        let allChecked = true;

        for (let i = 0; i < checkboxes.length; i++) {
            if (!checkboxes[i].checked) {
                allChecked = false;

                break;
            }
        }

        if (allChecked) {
            window.setTimeout(() => {
                jsConfetti.addConfetti({
                    emojis: ['⭐'],
                    confettiRadius: 600,
                    emojiSize: 35,
                    confettiNumber: 100
                })
            }, 150);
        }
    });
});
