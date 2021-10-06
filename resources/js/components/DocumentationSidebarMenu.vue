<script>
export default {
    data() {
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
    methods: {
    },
}
</script>

<template>
    <div>
        <div class="flex mb-3">
            <div class="text-2xl font-bold">Documentation</div>
            <div class="text-xl font-bold text-center mt-1 ml-9">v0.1</div>
        </div>
        <div v-for="(item, i) in menu" :key="i">
            <a :href="`#${item.id}`" class="block menu-item bg-gray-100 font-medium rounded-lg pl-6 py-2 mr-9 hover:text-gray-400">
                {{ item.title }}
            </a>
            <a v-for="(subitem, ii) in item.subitems" :key="ii" :href="`#${subitem.id}`" class="block menu-item font-medium rounded-lg pl-9 py-2 mr-9 hover:text-gray-400">
                {{ subitem.title }}
            </a>
        </div>
    </div>
</template>

<style scoped>
.menu-item {
    width: 264px;
}
</style>
