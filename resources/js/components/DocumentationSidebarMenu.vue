<script>
export default {
    data() {
        return {
            menuItemsOnPage: [],
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
            this.updateSurfIconPosition();
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
        },
        updateSurfIconPosition() {
            const itemOnPage = this.menuItemsOnPage.find((item) => item.isOnPage);

            if (itemOnPage) {
                const menuItem = document.querySelector(`#menu-${itemOnPage.id}`);
                const scrollMenu = document.querySelector('.docs-sidebar-menu');
                const surfIcon = document.querySelector('#menu-surf-icon');

                if (menuItem && scrollMenu) {
                    const pos = menuItem.getBoundingClientRect();

                    if (this.enableScrollAdjustment) {
                        if (pos.y > screen.height / 2) {
                            scrollMenu.scrollTo({
                                top: menuItem.offsetTop - screen.height / 2 + 100,
                                left: 0,
                                behavior: 'smooth',
                            });
                        } else if (surfIcon.getBoundingClientRect().y < 300) {
                            scrollMenu.scrollTo({
                                top: menuItem.offsetTop - 300,
                                left: 0,
                                behavior: 'smooth',
                            });
                        }
                    }

                    this.lastSurfIconPosition = {
                        x: itemOnPage.isSubitem ? 20 : 10,
                        y: pos.y - 186 + scrollMenu.scrollTop,
                    };
                }
            }
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
                        this.updateSurfIconPosition();
                    }, 1000);
                }
            }, 150);
        }
    },
}
</script>

<template>
    <div>
        <div :class="{
        'menu-wrapper': true,
        fixed: true,
    }">
            <div class="flex mb-3">
                <div class="text-2xl font-bold">Documentation</div>
                <div class="text-xl font-bold text-center mt-1 ml-9">v0.1</div>
            </div>
            <div :class="{
                'docs-sidebar-menu': true,
            }">
                <div id="menu-surf-icon" :class="{
                    twa: true,
                    'twa-ocean': true,
                    relative: true,
                    'z-10': true,
                    '-mb-12': true,
                }" :style="{
                    top: this.lastSurfIconPosition.y + 'px',
                    left: this.lastSurfIconPosition.x + 'px',
                }"></div>
                <div class="-mt-3">
                    <div v-for="(item, i) in menu" :key="i" class="mr-3">
                        <a :id="`menu-${item.id}`" :href="`#${item.id}`" class="block menu-item bg-gray-100 font-bold pl-9 py-2 hover:text-gray-400 flex">
                            {{ item.title }}
                        </a>
                        <a :id="`menu-${subitem.id}`" v-for="(subitem, ii) in item.subitems" :key="ii" :href="`#${subitem.id}`" class="block menu-item font-medium pl-12 py-2 hover:text-gray-400">
                            {{ subitem.title }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
#menu-surf-icon {
    transition: all 150ms;
}
.menu-wrapper {
    transition: top 150ms;
    top: 100px;
}
.docs-sidebar-menu {
    max-height: calc(100vh - 12rem);
    overflow-y: scroll;
    transition: max-height 150ms;
}
.docs-sidebar-menu.expanded {
    max-height: calc(100vh - 5rem);
}
.menu-item {
    width: 260px;
}
</style>
