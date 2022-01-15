<script>
import { getDirective as vueDebounce } from 'vue-debounce';
import Emitter from 'tiny-emitter/instance';

export default {
    directives: {
        debounce: vueDebounce('3'),
    },
    data() {
        return {
            currentMatch: null,
            totalMatches: null,
            docsHtml: null,
        };
    },
    computed: {
    },
    mounted() {
        this.docsHtml = document.querySelector('#documentation-content').innerHTML;
    },
    methods: {
        searchChildNodes(term, nodes) {
            if (nodes) {
                for (let i = 0; i < nodes.length; i++) {
                    switch (nodes[i].nodeType) {
                        // element
                        case 1: {
                            this.searchChildNodes(term, nodes[i].childNodes);
                            break;
                        }
                        // text
                        case 3: {
                            if (nodes[i].nodeValue.includes(term)) {
                                const el = document.createElement('span');

                                el.innerHTML = nodes[i].nodeValue.replaceAll(term, `<span class="search-result">${term}</span>`);;
                                nodes[i].replaceWith(el);
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

            if (term && term.length > 2) {
                this.searchChildNodes(term, docsContent.childNodes);
            } else {
                this.currentMatch = null;
                this.totalMatches = null;
            }

            Emitter.emit('docs-content-updated');
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
            <input v-debounce:200ms.fireonempty="onSearch" debounce-events="input" style="width:14.05rem;" class="border rounded py-1 px-3 bg-white text-gray-700 focus:outline-none focus:shadow-outline" id="docs-search-input" type="search" placeholder="Search Documentation" />
        </div>
    </div>
</template>

<style scoped>
</style>
