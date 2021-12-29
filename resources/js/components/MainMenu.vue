<script>
export default {
    data() {
        return {
            isOpen: false,
            user: window.user,
        };
    },
    computed: {
        menuWord: function() {
            return this.isOpen ? 'Close' : 'Menu';
        }
    },
    mounted() {
        window.addEventListener('resize', this.onWindowResize);
    },
    methods: {
        onWindowResize() {
            this.isOpen = false;
        },
        onMenuClick() {
            this.$refs.menuRef.blur();

            const content = document.querySelector('#content');
            const footer = document.querySelector('#footer');

            if (this.isOpen) {
                this.isOpen = false;
                content.style.display = 'block';
                footer.style.display = 'block';
            } else {
                this.isOpen = true;

                window.setTimeout(() => {
                    content.style.display = 'none';
                    footer.style.display = 'none';
                }, 500);
            }
        }
    },
}
</script>

<template>
    <div class="mr-3">
        <div class="flex lg:hidden justify-center mb-3">
            <div class="w-2/3 text-3xl font-extrabold text-left">
                <a href="/" class="transition hover:text-gray-400">LaraSurf</a>
            </div>
            <div class="w-1/3 text-right pt-2">
                <a ref="menuRef"
                   @dragleave="(e) => e.preventDefault()"
                   @click.prevent="onMenuClick"
                   href="#"
                >
                    <transition name="fade">
                        <svg v-if="!isOpen" class="absolute" style="right:1.5rem;" xmlns="http://www.w3.org/2000/svg" width="18" height="12" viewBox="0 0 18 12" fill="none">
                            <path d="M18 12H0V10H18V12ZM18 7H0V5H18V7ZM18 2H0V0H18V2Z" fill="black"/>
                        </svg>
                        <svg v-else class="absolute" style="right:1.75rem;" xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none">
                            <path d="M8.59 0L5 3.59L1.41 0L0 1.41L3.59 5L0 8.59L1.41 10L5 6.41L8.59 10L10 8.59L6.41 5L10 1.41L8.59 0Z" fill="black"/>
                        </svg>
                    </transition>
                </a>
            </div>
        </div>
        <transition name="slide-fade">
            <div v-show="isOpen" class="menu z-50 fixed left-0 right-0 bg-white w-screen px-6">
                <template v-if="!user">
                    <div class="border-gray-100 border-b mt-3"></div>
                    <div class="my-6">
                        <a id="link-nav-sign-up-mobile" class="block px-6 py-3 border border-black text-center bg-black hover:bg-white text-white hover:text-black" href="/continue">
                            Sign Up
                            <span class="ml-2 twa twa-ocean relative"></span>
                        </a>
                    </div>
                    <div class="my-6">
                        <a id="link-nav-login-mobile" class="block px-6 py-3 border border-black text-center bg-white hover:bg-black text-black hover:text-white" href="/continue">Login</a>
                    </div>
                </template>
                <template v-else>
                    <div class="border-gray-100 border-b mt-3"></div>
                    <div class="flex items-center justify-center mt-3">
                        <div class="w-1/3">
                            <img class="rounded-full w-12 h-12" :src="user.avatar_src" :alt="user.nickname"/>
                        </div>
                        <div class="w-2/3 text-right">
                            <span class="pr-3 font-bold">{{ user.nickname }}</span>
                        </div>
                    </div>
                </template>
                <div class="border-gray-200 border-b mt-3"></div>
                <div class="my-3">
                    <a id="link-nav-docs-mobile" class="font-medium text-black hover:text-gray-400" href="/docs">Documentation</a>
                </div>
                <div class="my-3">
                    <a id="link-nav-how-it-works-mobile" class="font-medium text-black hover:text-gray-400" href="/how-it-works">How it works</a>
                </div>
                <div class="my-3">
                    <a id="link-nav-pricing-mobile" class="font-medium text-black hover:text-gray-400" href="/pricing">Pricing</a>
                </div>
                <div class="my-3">
                    <a id="link-nav-hire-us-mobile" class="font-medium text-black hover:text-gray-400" href="/hire-us">Hire Us</a>
                </div>
                <template v-if="user">
                    <div class="border-gray-200 border-b mt-3"></div>
                    <div class="my-3">
                        <a id="link-nav-projects-mobile" class="font-medium text-black hover:text-gray-400" href="/projects">My Projects</a>
                    </div>
                    <div class="my-3">
                        <a id="link-nav-support-mobile" class="font-medium text-black hover:text-gray-400" href="/support">Submit a Help Ticket</a>
                    </div>
                    <div class="my-3">
                        <a id="link-nav-billing-mobile" class="font-medium text-black hover:text-gray-400" href="/billing">Billing & Payments</a>
                    </div>
                    <div class="my-3">
                        <a id="link-nav-account-mobile" class="font-medium text-black hover:text-gray-400" href="/account">Account Settings</a>
                    </div>
                    <div class="border-gray-200 border-b mt-3"></div>
                    <div class="my-3">
                        <a id="link-nav-logout-mobile" class="font-medium text-black hover:text-gray-400" href="/logout">Logout</a>
                    </div>
                </template>
            </div>
        </transition>
    </div>
</template>

<style scoped>
.menu {
    height: calc(100vh - 72px);
}

.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}

.slide-fade-enter-active,
.slide-fade-leave-active {
    transition: all 500ms;
    overflow: hidden;
    height: calc(100vh - 72px);
}

.slide-fade-enter-from,
.slide-fade-leave-to {
    height: 0;
    overflow: hidden;
}
</style>
