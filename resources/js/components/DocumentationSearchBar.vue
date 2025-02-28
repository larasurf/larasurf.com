<script>
import { getDirective as vueDebounce } from 'vue-debounce';

export default {
    data() {
        return {
            currentMatch: null,
            totalMatches: null,
            docsHtml: null,
            searchTerm: '',
        };
    },
    mounted() {
        this.docsHtml = document.querySelector('#documentation-content').innerHTML;

        window.addEventListener('keydown', (e) => {
            if ((e.ctrlKey || e.metaKey) && e.key === 'f') {
                e.preventDefault();

                this.$refs.searchRef.focus();
            }
        });
    },
    methods: {
        escapeHtml(html) {
            return html
                .replace(/&/g, "&amp;")
                .replace(/</g, "&lt;")
                .replace(/>/g, "&gt;")
                .replace(/"/g, "&quot;")
                .replace(/'/g, "&#039;");
        },
        searchChildNodes(nodes) {
            if (this.totalMatches === null) {
                this.totalMatches = 0;
            }

            if (nodes) {
                for (let i = 0; i < nodes.length; i++) {
                    switch (nodes[i].nodeType) {
                        // element
                        case 1: {
                            this.searchChildNodes(nodes[i].childNodes);
                            break;
                        }
                        // text
                        case 3: {
                            const term = this.searchTerm.toLowerCase();

                            if (nodes[i].nodeValue.toLowerCase().includes(term)) {
                                let replaceHtml = '';
                                let nodeValue = nodes[i].nodeValue;
                                let scrollTo = false;

                                while (nodeValue.toLowerCase().includes(term)) {
                                    const index = nodeValue.toLowerCase().indexOf(term);
                                    const strBeforeIndex = this.escapeHtml(nodeValue.substr(0, index));
                                    const termWithCasing = this.escapeHtml(nodeValue.substr(index, term.length));

                                    this.totalMatches++;

                                    let css = 'search-result';

                                    if (this.totalMatches === this.currentMatch) {
                                        css += ' current';
                                        scrollTo = true;
                                    }

                                    replaceHtml += `${strBeforeIndex}<span id="search-result-${this.totalMatches}" class="${css}">${termWithCasing}</span>`;
                                    nodeValue = nodeValue.substring(index + term.length);
                                }

                                const el = document.createElement('span');

                                el.innerHTML = replaceHtml + nodeValue;

                                nodes[i].replaceWith(el);

                                if (scrollTo) {
                                    window.scrollTo({
                                        left: 0,
                                        top: el.getBoundingClientRect().top + window.scrollY - 300,
                                        behavior: 'smooth',
                                    })
                                }
                            }
                            break;
                        }
                    }
                }
            }
        },
        onSearch(term, event) {
            const docsContent = document.querySelector('#documentation-content');
            docsContent.innerHTML = this.docsHtml;

            this.currentMatch = 1;
            this.totalMatches = null;

            this.searchTerm = term || '';

            if (this.searchTerm.length > 2) {
                this.searchChildNodes(docsContent.childNodes);
            }

            if (!this.totalMatches) {
                this.currentMatch = 0;
            }

            window.eventBus.emit('docs-content-updated');
        },
        onNextMatch() {
            if (this.totalMatches) {
                this.currentMatch++;

                if (this.currentMatch > this.totalMatches) {
                    this.currentMatch = 1;
                }

                this.totalMatches = null;

                const docsContent = document.querySelector('#documentation-content');
                docsContent.innerHTML = this.docsHtml;

                this.searchChildNodes(docsContent.childNodes);

                window.eventBus.emit('docs-content-updated');
            }
        },
        onPreviousMatch() {
            if (this.totalMatches) {
                this.currentMatch--;

                if (this.currentMatch <= 0) {
                    this.currentMatch = this.totalMatches;
                }

                this.totalMatches = null;

                const docsContent = document.querySelector('#documentation-content');
                docsContent.innerHTML = this.docsHtml;

                this.searchChildNodes(docsContent.childNodes);

                window.eventBus.emit('docs-content-updated');
            }
        },
    },
}
</script>

<template>
    <div class="py-1 px-3 bg-gray-100 flex">
        <div class="flex justify-center items-center pr-2">
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5.66667 10.3333C8.244 10.3333 10.3333 8.244 10.3333 5.66667C10.3333 3.08934 8.244 1 5.66667 1C3.08934 1 1 3.08934 1 5.66667C1 8.244 3.08934 10.3333 5.66667 10.3333Z" stroke="black" stroke-width="1.33333" stroke-linecap="square" stroke-linejoin="round"/>
                <path d="M9 9L13 13" stroke="black" stroke-width="1.33333" stroke-linecap="square" stroke-linejoin="round"/>
            </svg>
        </div>
        <div>
            <input ref="searchRef" @change="onSearch($refs.searchRef.value, $event)" style="width:14.05rem;" class="border rounded py-1 px-3 bg-white text-gray-700 focus:outline-none focus:shadow-outline" id="docs-search-input" type="search" placeholder="Search Documentation" />
        </div>
        <div v-if="totalMatches === 0" class="py-1 absolute" style="left:18.2rem;">
            0 results
        </div>
        <div v-if="totalMatches" class="py-1 absolute" style="left:18.2rem;">
            {{ currentMatch }} of {{ totalMatches }} results
        </div>
        <div v-if="totalMatches" class="py-1 px-3 flex items-center relative" style="left:10rem;">
            <span class="filter hover:invert-50 cursor-pointer py-1" @click="onNextMatch()">
                <svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.292893 0.292893C0.683417 -0.0976311 1.31658 -0.0976311 1.70711 0.292893L7 5.58579L12.2929 0.292893C12.6834 -0.0976311 13.3166 -0.0976311 13.7071 0.292893C14.0976 0.683418 14.0976 1.31658 13.7071 1.70711L7.70711 7.70711C7.31658 8.09763 6.68342 8.09763 6.29289 7.70711L0.292893 1.70711C-0.0976311 1.31658 -0.0976311 0.683418 0.292893 0.292893Z" fill="#25282B"/>
                </svg>
            </span>
            <span class="filter hover:invert-50 transform rotate-180 ml-2 cursor-pointer py-1" @click="onPreviousMatch()">
                <svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.292893 0.292893C0.683417 -0.0976311 1.31658 -0.0976311 1.70711 0.292893L7 5.58579L12.2929 0.292893C12.6834 -0.0976311 13.3166 -0.0976311 13.7071 0.292893C14.0976 0.683418 14.0976 1.31658 13.7071 1.70711L7.70711 7.70711C7.31658 8.09763 6.68342 8.09763 6.29289 7.70711L0.292893 1.70711C-0.0976311 1.31658 -0.0976311 0.683418 0.292893 0.292893Z" fill="#25282B"/>
                </svg>
            </span>
        </div>
    </div>
</template>

<style scoped>
</style>
