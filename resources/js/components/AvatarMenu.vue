<script>
export default {
    data() {
        return {
            isOpen: false,
            user: window.user,
            items: [
                {
                    label: 'My Projects',
                    href: '/projects',
                },
                {
                    label: 'Submit a Help Ticket',
                    href: '/suppport',
                },
                {
                    label: 'Billing & Payments',
                    href: '/billing',
                },
                {
                    label: 'Account Settings',
                    href: '/account',
                },
                {
                    label: 'Logout',
                    href: '/logout',
                },
            ],
        };
    },
    mounted() {
        window.addEventListener('resize', this.onWindowResize);
        document.addEventListener('click', this.onDocumentClick)
    },
    methods: {
        onWindowResize() {
            this.isOpen = false;
        },
        onDocumentClick(event) {
            if (!event || !this.$refs.menuRef.contains(event.target)) {
                this.isOpen = false;
            }
        },
        onMenuClick() {
            this.isOpen = !this.isOpen;
        }
    },
}
</script>

<template>
    <div class="font-medium flex items-center justify-end">
        <span class="cursor-pointer" @click="onMenuClick()" ref="menuRef">
            <img class="inline rounded-full w-8 h-8 mr-12" :src="user.avatar_src" :alt="user.nickname"/>
            <span class="pr-3 relative font-bold">{{ user.nickname }}
                <svg class="inline ml-2 relative transition duration-300" :class="{'is-open': isOpen}" style="bottom:.125rem;" width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10 0L5 6L0 0H10Z" fill="#0D0D0D"/>
                </svg>
            </span>
        </span>
        <div id="menu-items" v-show="isOpen" class="absolute bg-white rounded top-0">
            <a class="block hover:bg-gray-100 px-6 py-3 text-gray-600" :class="{
                    'border-t border-gray-100': index !== 0
                }" v-for="(item, index) in items" :key="index" :href="item.href">
                {{ item.label }}
            </a>
        </div>
    </div>
</template>

<style scoped>
svg.is-open {
    transform: rotateX(180deg);
}
#menu-items {
    top: 4.75rem;
    box-shadow: 0px 27px 368px rgba(0, 0, 0, 0.04), 0px 12.4829px 170.138px rgba(0, 0, 0, 0.029667), 0px 7.14244px 97.3488px rgba(0, 0, 0, 0.0250712), 0px 4.33541px 59.09px rgba(0, 0, 0, 0.0215979), 0px 2.61228px 35.6044px rgba(0, 0, 0, 0.0184021), 0px 1.45468px 19.8268px rgba(0, 0, 0, 0.0149288), 0px 0.62565px 8.52737px rgba(0, 0, 0, 0.010333);
}
</style>
