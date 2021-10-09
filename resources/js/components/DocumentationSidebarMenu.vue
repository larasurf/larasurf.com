<script>
export default {
    data() {
        return {
            menuExpanded: false,
            menuItemsOnPage: [],
            lastSurfIconPosition: { x: 0, y: 0},
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
        window.addEventListener('scroll', (e) => {
            this.menuExpanded = window.scrollY > 80;
            this.updateSurfIconPosition();
        });

        const options = {
            root: null,
            rootMargin: '0px',
            threshold: [0, 1],
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
        getSurfIconPosition() {


            return null;
        },
        updateSurfIconPosition() {
            const itemOnPage = this.menuItemsOnPage.find((item) => item.isOnPage);

            if (itemOnPage) {
                const menuItem = document.querySelector(`#menu-${itemOnPage.id}`);
                const scrollMenu = document.querySelector('.docs-sidebar-menu');
                const surfIcon = document.querySelector('#menu-surf-icon');

                if (menuItem && scrollMenu) {
                    const pos = menuItem.getBoundingClientRect();

                    this.lastSurfIconPosition = {
                        x: itemOnPage.isSubitem ? 20 : 10,
                        y: pos.y - 50 + scrollMenu.scrollTop,
                    };

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
            }
        },
    },
    watch: {
        menuExpanded: function (newValue, oldValue) {
            if (newValue) {
                setTimeout(() => {
                    this.updateSurfIconPosition();
                }, 150);
            }
        },
    },
}
</script>

<template>
    <div>
        <div :class="{
        'menu-wrapper': true,
        fixed: true,
        'mt-3': menuExpanded,
        expanded: menuExpanded,
    }">
            <div class="flex mb-3">
                <div class="text-2xl font-bold">Documentation</div>
                <div class="text-xl font-bold text-center mt-1 ml-9">v0.1</div>
            </div>
            <div :class="{
                'docs-sidebar-menu': true,
                expanded: menuExpanded,
            }">
                <div id="menu-surf-icon" :class="{
                    twa: true,
                    'twa-ocean': true,
                    relative: true,
                    'z-10': true,
                    hidden: !menuExpanded,
                }" :style="{
                    top: this.lastSurfIconPosition.y + 'px',
                    left: this.lastSurfIconPosition.x + 'px',
                }"></div>
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
</template>

<style scoped>
#menu-surf-icon {
    transition: all 150ms;
}
.documentation-intersection {
    pointer-events: none;
    position: fixed;
    top: 0;
    left: 0;
    height: 50vh;
    width: 100vw;
}
.menu-wrapper {
    transition: top 150ms;
    top: 100px;
}
.menu-wrapper.expanded {
    top: 0;
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
