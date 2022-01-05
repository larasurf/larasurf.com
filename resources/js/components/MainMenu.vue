<script>
export default {
    data() {
        return {
            isOpen: false,
            scrollKeys: [37, 38, 39, 40],
        };
    },
    computed: {
        wheelOption: function() {
            let supportsPassive = false;

            try {
                window.addEventListener('test', null, Object.defineProperty({}, 'passive', {
                    get: function() { supportsPassive = true; }
                }));
            } catch (e) {
                //
            }

            return supportsPassive ? { passive: false } : false;
        },
        wheelEvent: function() {
            return 'onwheel' in document.createElement('div') ? 'wheel' : 'mousewheel';
        },
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

            this.isOpen = !this.isOpen;
        },
        preventDefault(e) {
            e.preventDefault();
        },
        preventDefaultScrollKeys(e) {
            if (this.scrollKeys.includes(e.keyCode)) {
                e.preventDefault();

                return false;
            }
        },
        disableScroll() {
            window.addEventListener('DOMMouseScroll', this.preventDefault, false); // older FF
            window.addEventListener(this.wheelEvent, this.preventDefault, this.wheelOption); // modern desktop
            window.addEventListener('touchmove', this.preventDefault, this.wheelOption); // mobile
            window.addEventListener('keydown', this.preventDefaultScrollKeys, false);
        },
        enableScroll() {
            window.removeEventListener('DOMMouseScroll', this.preventDefault, false); // older FF
            window.removeEventListener(this.wheelEvent, this.preventDefault, this.wheelOption); // modern desktop
            window.removeEventListener('touchmove', this.preventDefault, this.wheelOption); // mobile
            window.removeEventListener('keydown', this.preventDefaultScrollKeys, false);
        },
    },
    watch: {
        isOpen: function(newValue, oldValue) {
            if (oldValue === false && newValue === true) {
                this.disableScroll();
            } else if (oldValue === true && newValue === false) {
                this.enableScroll();
            }
        },
    }
}
</script>

<template>
    <div>
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
            <div v-show="isOpen" class="menu fixed left-0 right-0 bg-white px-6">
                <div class="my-3">
                    <span class="font-medium text-gray-400" >Main Menu</span>
                </div>
                <div class="border-gray-200 border-b mt-3"></div>
                <div class="my-3">
                    <a id="link-nav-docs-mobile" class="font-medium text-black hover:text-gray-400" href="/docs">Documentation</a>
                </div>
                <div class="my-3">
                    <a id="link-nav-how-it-works-mobile" class="font-medium text-black hover:text-gray-400" href="/how-it-works">How it works</a>
                </div>
                <div class="my-3">
                    <span class="font-medium text-black line-through pr-2">Pricing</span> It's free!
                </div>
                <div class="my-3">
                    <a id="link-nav-custom-projects-mobile" class="font-medium text-black hover:text-gray-400" href="/custom-projects">Custom Projects</a>
                </div>
            </div>
        </transition>
    </div>
</template>

<style scoped>
.menu {
    height: 100vh;
    z-index: 100;
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
    height: 100vh;
}

.slide-fade-enter-from,
.slide-fade-leave-to {
    height: 0;
    overflow: hidden;
}
</style>
