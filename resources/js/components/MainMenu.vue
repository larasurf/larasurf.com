<script>
export default {
    data() {
        return {
            isOpen: false,
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
            <div class="w-1/3 font-extrabold text-right pt-2">
                <a ref="menuRef"
                   @dragexit="(e) => e.preventDefault()"
                   @click.prevent="onMenuClick"
                   href="#"
                   :class="{
                   'transition': true,
                   'bg-black': !isOpen,
                   'hover:bg-black': isOpen,
                   'bg-white': isOpen,
                   'hover:bg-white': !isOpen,
                   'text-white': !isOpen,
                   'hover:text-white': isOpen,
                   'text-black': isOpen,
                   'hover:text-black': !isOpen,
                   'rounded-lg': true,
                   'border-2': true,
                   'border-black': true,
                   'px-6': true,
                   'py-3': true,
                   '-mr-3': true,
               }"
                >{{ menuWord }}</a>
            </div>
        </div>
        <transition name="slide-fade">
            <div v-show="isOpen" class="menu z-50 fixed left-0 bg-white w-screen px-6">
                <div class="border-gray-200 border-b mt-3"></div>
                <div class="my-6">
                    <a class="font-medium text-black hover:text-gray-400" href="/docs">Documentation</a>
                </div>
                <div class="my-6">
                    <a class="font-medium text-black hover:text-gray-400" href="/how-it-works">How it works</a>
                </div>
                <div class="my-6">
                    <span class="font-medium text-black line-through pr-2">Pricing</span> It's free!
                </div>
            </div>
        </transition>
    </div>
</template>

<style scoped>
.menu {
    height: calc(100vh - 72px);
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
