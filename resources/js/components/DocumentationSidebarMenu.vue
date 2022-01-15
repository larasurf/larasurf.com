<script>
export default {
    data() {
        return {
            menuItemsOnPage: [],
            lastMenuItemOnPage: null,
            lastSurfIconPosition: { x: 10, y: -30 },
            enableScrollAdjustment: true,
        };
    },
    computed: {
        menu: () => {
            const menu = [];
            for (let index = 0; index < window.larasurfDocs.length; index++) {
                const item = {};
                item.title = window.larasurfDocs[index].title;
                item.id = window.larasurfDocs[index].id;
                item.subitems = window.larasurfDocs[index].content.filter((block) => block.type === 'heading-1').map((heading) => ({
                    title: heading.text,
                    id: heading.id,
                }));
                menu.push(item);
            }
            return menu;
        },
    },
    mounted() {
        const url = window.location.protocol + '//' + window.location.host + window.location.pathname;

        document.querySelectorAll('a').forEach((el) => {
            if (el.href.startsWith(`${url}#`) && !el.classList.contains('menu-item')) {
                el.addEventListener('click', (e) => {
                    e.preventDefault();

                    window.location.hash = el.href.replace(url, '');
                });
            }
        });

        window.addEventListener('scroll', (e) => {
            const itemOnPage = this.menuItemsOnPage.find((item) => item.isOnPage);

            if (itemOnPage) {
                const menuItem = document.querySelector(`#menu-${itemOnPage.id}`);
                const scrollMenu = document.querySelector('.docs-sidebar-menu');

                if (menuItem && scrollMenu) {
                    const pos = menuItem.getBoundingClientRect();

                    if (this.enableScrollAdjustment) {
                        if (pos.y > screen.height / 2) {
                            scrollMenu.scrollTo({
                                top: menuItem.offsetTop - screen.height / 2 + 100,
                                left: 0,
                                behavior: 'smooth',
                            });
                        } else if (pos.y < 300) {
                            scrollMenu.scrollTo({
                                top: menuItem.offsetTop - 300,
                                left: 0,
                                behavior: 'smooth',
                            });
                        }
                    }
                }
            }
        });

        window.addEventListener('hashchange', (e) => {
            this.onHashChange();
        }, false);

        const options = {
            root: null,
            rootMargin: '0px',
            threshold: [0, .5],
        }

        const observer = new IntersectionObserver(this.onMenuItemIntersect, options);

        for (let i = 0; i < this.menu.length; i++) {
            this.menuItemsOnPage.push({
                id: this.menu[i].id,
                isOnPage: false,
                isSubitem: false,
            });

            observer.observe(document.querySelector(`#${this.menu[i].id}`));
            for (let ii = 0; ii < this.menu[i].subitems.length; ii++) {
                this.menuItemsOnPage.push({
                    id: this.menu[i].subitems[ii].id,
                    isOnPage: false,
                    isSubitem: true,
                });

                observer.observe(document.querySelector(`#${this.menu[i].subitems[ii].id}`));
            }
        }

        if (window.location.hash) {
            this.onHashChange();
        }
    },
    methods: {
        onMenuItemIntersect(entries, observer) {
            entries.forEach((entry) => {
                for (let i = 0; i < this.menuItemsOnPage.length; i++) {
                    if (entry.target.id === this.menuItemsOnPage[i].id) {
                        this.menuItemsOnPage[i].isOnPage = entry.isIntersecting;
                    }
                }
            });

            const itemOnPage = this.menuItemsOnPage.find((item) => item.isOnPage);

            if (itemOnPage) {
                this.lastMenuItemOnPage = itemOnPage;
            }
        },
        isMenuItemEmphasized(id) {
            return this.lastMenuItemOnPage && this.lastMenuItemOnPage.id === id;
        },
        onHashChange() {
            window.setTimeout(() => {
                const el = document.querySelector(window.location.hash);

                if (el) {
                    this.enableScrollAdjustment = false;

                    el.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start',
                    });

                    window.setTimeout(() => {
                        this.enableScrollAdjustment = true;

                        window.setTimeout(() => {
                            window.scrollTo(0, window.scrollY - 10);
                        }, 10)
                    }, 1000);
                }
            }, 150);
        }
    },
}
</script>

<template>
    <div>
        <div class="menu-wrapper fixed">
            <div class="flex mb-3">
                <div class="text-2xl font-bold">Documentation</div>
                <div class="text-xl font-bold text-center mt-1 ml-9">v0.1</div>
            </div>
            <div class="docs-sidebar-menu">
                <div class="static-side-menu flex mt-6">
                    <div class="flex-shrink pt-4 mr-3">
                        <div class="border-l border-gray-100 relative" style="left:0.3rem;top:-0.5rem;height: calc(100% - 1rem);"></div>
                    </div>
                    <div class="flex-grow -mt-6">
                        <div v-for="(item, i) in menu" :key="i">
                            <div class="relative right-3.5 top-6">
                                <svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.292893 0.292893C0.683417 -0.0976311 1.31658 -0.0976311 1.70711 0.292893L7 5.58579L12.2929 0.292893C12.6834 -0.0976311 13.3166 -0.0976311 13.7071 0.292893C14.0976 0.683418 14.0976 1.31658 13.7071 1.70711L7.70711 7.70711C7.31658 8.09763 6.68342 8.09763 6.29289 7.70711L0.292893 1.70711C-0.0976311 1.31658 -0.0976311 0.683418 0.292893 0.292893Z" fill="#25282B"/>
                                </svg>
                            </div>
                            <a :id="`menu-${item.id}`" :href="`#${item.id}`" class="block menu-item text-lg pl-5 py-2 hover:text-gray-400" :class="{'font-bold': isMenuItemEmphasized(item.id)}">
                                {{ item.title }}
                            </a>
                            <a :id="`menu-${subitem.id}`" v-for="(subitem, ii) in item.subitems" :key="ii" :href="`#${subitem.id}`" class="block menu-item pl-8 py-2 hover:text-gray-400" :class="{'font-bold': isMenuItemEmphasized(subitem.id)}">
                                {{ subitem.title }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.menu-wrapper {
    top: 100px;
}
.docs-sidebar-menu {
    max-height: calc(100vh - 15rem);
    overflow-y: scroll;
}
.menu-item {
    width: 240px;
}
</style>
