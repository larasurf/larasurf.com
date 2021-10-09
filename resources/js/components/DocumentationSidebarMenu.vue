<script>
export default {
    data() {
        return {
            menuExpanded: false,
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
        }
    },
    mounted() {
        window.addEventListener('scroll', (e) => {
            this.menuExpanded = window.scrollY > 80;
        });
    },
    methods: {
    },
}
</script>

<template>
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
            <div v-for="(item, i) in menu" :key="i" class="mr-3">
                <a :href="`#${item.id}`" class="block menu-item bg-gray-100 font-bold pl-6 py-2 hover:text-gray-400 flex">
                    {{ item.title }}
                </a>
                <a v-for="(subitem, ii) in item.subitems" :key="ii" :href="`#${subitem.id}`" class="block menu-item font-medium pl-9 py-2 hover:text-gray-400">
                    {{ subitem.title }}
                </a>
            </div>
        </div>
    </div>
</template>

<style scoped>
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
