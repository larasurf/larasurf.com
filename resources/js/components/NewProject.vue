<script>
export default {
    data() {
        return {
            devMode: false,
            devBranch: 'main',
            templateBranch: 'main',
            devBranchValidationError: false,
            templateBranchValidationError: false,
            projectName: '',
            projectNameValidationError: false,
            projectEnvironments: 'local-stage-production',
            projectStarterKit: 'none',
            projectPortAwsLocal: '4566',
            projectPortAwsLocalValidationError: false,
            projectPortMailUi: '8025',
            projectPortMailUiValidationError: false,
            projectPortApp: '80',
            projectPortAppValidationError: false,
            projectPortAppTls: '443',
            projectPortAppTlsValidationError: false,
            projectPortDatabase: '3306',
            projectPortDatabaseValidationError: false,
            projectPortCache: '6379',
            projectPortCacheValidationError: false,
            projectPortViteHmr: '5173',
            projectPortViteHmrValidationError: false,
            projectIdeHelper: true,
            projectCodeStyleFixer: true,
            projectUseTlsLocally: false,
            projectDusk: false,
            isLoading: false,
        };
    },
    computed: {
        isValid: function () {
            return /^[a-z0-9-]{1,20}$/.test(this.projectName) &&
                this.projectPortAwsLocal &&
                this.projectPortMailUi &&
                this.projectPortApp &&
                this.projectPortAppTls &&
                this.projectPortDatabase &&
                this.projectPortCache &&
                this.projectPortViteHmr &&
                (!this.devMode || (this.devBranch && this.templateBranch));
        }
    },
    mounted() {
        window.larasurfDevMode = () => {
            this.devMode = true;
        };
    },
    methods: {
        onProjectNameChange() {
            this.projectName = this.projectName.replaceAll(/[^[a-z0-9-]/g, '');
        },
        onProjectNameKeydown(e) {
            const isAlpha = e.keyCode >= 65 && e.keyCode <= 90;
            const isNumeric = (e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 96 && e.keyCode <= 105);
            const isDash = e.keyCode === 109 || e.keyCode === 189;
            const isBackspaceDeleteTab = e.keyCode === 8 || e.keyCode === 9 || e.keyCode === 46;
            const isArrowKey = e.keyCode === 37 || e.keyCode === 39;

            if (e.shiftKey || (!isAlpha && !isNumeric && !isDash && !isBackspaceDeleteTab && !isArrowKey)) {
                e.preventDefault();
            }
        },
        onProjectGenerateClick() {
            this.devBranchValidationError = this.devMode && !this.devBranch;
            this.templateBranchValidationError = this.devMode && !this.templateBranch;
            this.projectNameValidationError = !/^[a-z0-9-]{1,20}$/.test(this.projectName);
            this.projectPortAwsLocalValidationError = !this.projectPortAwsLocal;
            this.projectPortMailUiValidationError = !this.projectPortMailUi;
            this.projectPortAppValidationError = !this.projectPortApp;
            this.projectPortAppTlsValidationError = !this.projectPortAppTls;
            this.projectPortDatabaseValidationError = !this.projectPortDatabase;
            this.projectPortCacheValidationError = !this.projectPortCache;
            this.projectPortViteHmrValidationError = !this.projectPortViteHmr;

            const invalid = this.devBranchValidationError ||
                this.templateBranchValidationError ||
                this.projectNameValidationError ||
                this.projectPortAwsLocalValidationError ||
                this.projectPortMailUiValidationError ||
                this.projectPortAppValidationError ||
                this.projectPortAppTlsValidationError ||
                this.projectPortDatabaseValidationError ||
                this.projectPortCacheValidationError ||
                this.projectPortViteHmrValidationError;

            if (invalid) {
                if (this.projectNameValidationError || this.devBranchValidationError || this.templateBranchValidationError) {
                    window.scrollTo(0, 0);
                }
            } else {
                const params = {
                    name: this.projectName,
                    environments: this.projectEnvironments,
                    'starter-kit': this.projectStarterKit,
                    'port-awslocal': this.projectPortAwsLocal,
                    'port-mail-ui': this.projectPortMailUi,
                    'port-app': this.projectPortApp,
                    'port-app-tls': this.projectPortAppTls,
                    'port-database': this.projectPortDatabase,
                    'port-cache': this.projectPortCache,
                    'port-vite-hmr': this.projectPortViteHmr,
                    'ide-helper': this.projectIdeHelper ? 'true' : 'false',
                    'cs-fixer': this.projectCodeStyleFixer ? 'true' : 'false',
                    'local-tls': this.projectUseTlsLocally ? 'true' : 'false',
                    'dusk': this.projectDusk ? 'true' : 'false',
                };

                if (this.devMode) {
                    params['dev-branch'] = this.devBranch;
                    params['template-branch'] = this.templateBranch;
                }

                const query = (new URLSearchParams(params)).toString();

                this.isLoading = true;

                window.location.href = `/generate?${query}`;
            }
        },
    },
}
</script>

<template>
    <div class="flex flex-wrap">
        <div class="w-full">
            <label class="block text-xl font-bold" for="project-name">Project Name</label>
            <input maxlength="20" @keydown="onProjectNameKeydown($event)" @change="onProjectNameChange()" v-model="projectName" id="project-name" class="appearance-none border rounded-lg w-full lg:w-1/2 mt-3 mb-1 py-2 px-3 text-gray-700 focus:outline-none" :class="{
                'border-black': !projectNameValidationError,
                'border-red-400': projectNameValidationError,
            }" placeholder="my-startup-idea"/>
            <img v-if="projectNameValidationError" alt="Error" class="inline w-6 h-6 absolute error-alert" src="/svg/error.svg" />
            <div class="text-sm" :class="{'text-red-400': projectNameValidationError}">
                Lowercase alphanumeric and hyphens only. Maximum of 20 characters.
            </div>
        </div>
        <div class="w-full mt-6" v-if="devMode">
            <label class="block text-xl font-bold" for="dev-branch">LaraSurf Branch</label>
            <input v-model="devBranch" id="dev-branch" class="appearance-none border rounded-lg w-full lg:w-1/2 mt-3 mb-1 py-2 px-3 text-gray-700 focus:outline-none" placeholder="branch" :class="{
                'border-black': !devBranchValidationError,
                'border-red-400': devBranchValidationError,
            }"/>
            <img v-if="devBranchValidationError" alt="Error" class="inline w-6 h-6 absolute error-alert" src="/svg/error.svg" />
        </div>
        <div class="w-full mt-6" v-if="devMode">
            <label class="block text-xl font-bold" for="dev-branch">Template Branch</label>
            <input v-model="templateBranch" id="template-branch" class="appearance-none border rounded-lg w-full lg:w-1/2 mt-3 mb-1 py-2 px-3 text-gray-700 focus:outline-none" placeholder="branch" :class="{
                'border-black': !templateBranchValidationError,
                'border-red-400': templateBranchValidationError,
            }"/>
            <img v-if="templateBranchValidationError" alt="Error" class="inline w-6 h-6 absolute error-alert" src="/svg/error.svg" />
        </div>
        <div class="w-full mt-12">
            <div class="block text-xl font-bold">Environments</div>
            <div class="mt-3">
                <input id="project-environments-local-stage-production" name="project-environments" value="local-stage-production" v-model="projectEnvironments" type="radio" checked/>
                <label for="project-environments-local-stage-production" class="ml-2">Local, Stage, and Production</label>
            </div>
            <div class="mt-3">
                <input id="project-environments-local-stage" name="project-environments" value="local-production" v-model="projectEnvironments" type="radio"/>
                <label for="project-environments-local-stage" class="ml-2">Local and Production</label>
            </div>
            <div class="mt-3">
                <input id="project-environments-local" name="project-environments" value="local" v-model="projectEnvironments" type="radio"/>
                <label for="project-environments-local" class="ml-2">Local</label>
            </div>
        </div>
        <div class="w-full border-b border-gray-200 my-12 w-1/2"></div>
        <div class="w-full lg:w-1/2 pr-0 lg:pr-12">
            <div class="block text-xl font-bold">Starter Kit</div>
            <div class="mt-3">
                <input id="project-starter-kit-none" name="project-starter-kit" value="none" v-model="projectStarterKit" type="radio" checked/>
                <label for="project-starter-kit-none" class="ml-2">None</label>
            </div>
            <div class="mt-3">
                <input id="project-starter-kit-breeze-api" name="project-starter-kit" value="breeze-api" v-model="projectStarterKit" type="radio"/>
                <label for="project-starter-kit-breeze-api" class="ml-2">Breeze (API)</label>
            </div>
            <div class="mt-3">
                <input id="project-starter-kit-breeze-blade" name="project-starter-kit" value="breeze-blade" v-model="projectStarterKit" type="radio"/>
                <label for="project-starter-kit-breeze-blade" class="ml-2">Breeze (Blade)</label>
            </div>
            <div class="mt-3">
                <input id="project-starter-kit-breeze-react" name="project-starter-kit" value="breeze-react" v-model="projectStarterKit" type="radio"/>
                <label for="project-starter-kit-breeze-react" class="ml-2">Breeze (React)</label>
            </div>
            <div class="mt-3">
                <input id="project-starter-kit-breeze-vue" name="project-starter-kit" value="breeze-vue" v-model="projectStarterKit" type="radio"/>
                <label for="project-starter-kit-breeze-vue" class="ml-2">Breeze (Vue)</label>
            </div>
            <div class="mt-3">
                <input id="project-starter-kit-jetstream-inertia-teams" name="project-starter-kit" value="jet-inertia-teams" v-model="projectStarterKit" type="radio"/>
                <label for="project-starter-kit-jetstream-inertia-teams" class="ml-2">Jetstream: Inertia (with teams)</label>
            </div>
            <div class="mt-3">
                <input id="project-starter-kit-jetstream-inertia" name="project-starter-kit" value="jet-inertia" v-model="projectStarterKit" type="radio"/>
                <label for="project-starter-kit-jetstream-inertia" class="ml-2">Jetstream: Inertia (without teams)</label>
            </div>
            <div class="mt-3">
                <input id="project-starter-kit-jetstream-livewire-teams" name="project-starter-kit" value="jet-livewire-teams" v-model="projectStarterKit" type="radio"/>
                <label for="project-starter-kit-jetstream-livewire-teams" class="ml-2">Jetstream: Livewire (with teams)</label>
            </div>
            <div class="mt-3">
                <input id="project-starter-kit-jetstream-livewire" name="project-starter-kit" value="jet-livewire" v-model="projectStarterKit" type="radio"/>
                <label for="project-starter-kit-jetstream-livewire" class="ml-2">Jetstream: Livewire (without teams)</label>
            </div>
        </div>
        <div class="w-full lg:w-1/2 pl-0 lg:pl-12 mt-6 lg:mt-0">
            <div class="block text-xl font-bold">Miscellaneous</div>
            <div class="flex mt-3 text-lg">
                <label class="checkbox bounce">
                    <span class="flex">
                        <span><input v-model="projectIdeHelper" type="checkbox">
                            <svg viewBox="0 0 21 21">
                                <polyline points="5 10.75 8.5 14.25 16 6"></polyline>
                            </svg>
                        </span>
                        <span class="checkbox-content">Laravel IDE Helper</span>
                    </span>
                </label>
            </div>
            <div class="flex mt-3 text-lg">
                <label class="checkbox bounce">
                    <span class="flex">
                        <span><input v-model="projectCodeStyleFixer" type="checkbox">
                            <svg viewBox="0 0 21 21">
                                <polyline points="5 10.75 8.5 14.25 16 6"></polyline>
                            </svg>
                        </span>
                        <span class="checkbox-content">PHP Code Style Fixer</span>
                    </span>
                </label>
            </div>
            <div class="flex mt-3 text-lg">
                <label class="checkbox bounce">
                    <span class="flex">
                        <span><input v-model="projectDusk" type="checkbox">
                            <svg viewBox="0 0 21 21">
                                <polyline points="5 10.75 8.5 14.25 16 6"></polyline>
                            </svg>
                        </span>
                        <span class="checkbox-content">Laravel Dusk</span>
                    </span>
                </label>
            </div>
            <div class="flex mt-3 text-lg">
                <label class="checkbox bounce">
                    <span class="flex">
                        <span><input v-model="projectUseTlsLocally" type="checkbox">
                            <svg viewBox="0 0 21 21">
                                <polyline points="5 10.75 8.5 14.25 16 6"></polyline>
                            </svg>
                        </span>
                        <span class="checkbox-content">Use TLS Locally</span>
                    </span>
                    <span class="ml-8 text-sm">requires <a target="_blank" href="https://github.com/FiloSottile/mkcert">mkcert</a></span>
                </label>
            </div>
        </div>
        <div class="w-full border-b border-gray-200 my-12"></div>
        <div class="w-full">
            <div class="text-xl font-bold">Local Ports</div>
            <div class="text-sm">
                These are the ports on your local machine that will be bound to services run by docker-compose. The specified ports must be available on your local machine. If you aren't sure, proceed with the defaults.
            </div>
            <div class="mt-3 flex">
                <div class="w-1/2 pr-2">
                    <label for="project-port-awslocal" class="block">AWS Local</label>
                    <input id="project-port-awslocal" v-model="projectPortAwsLocal" class="appearance-none border rounded-lg w-full mt-3 mb-1 py-2 px-3 text-gray-700 focus:outline-none" type="number" min="1" :class="{
                        'border-black': !projectPortAwsLocalValidationError,
                        'border-red-400': projectPortAwsLocalValidationError,
                    }"/>
                    <img v-if="projectPortAwsLocalValidationError" alt="Error" class="inline w-6 h-6 absolute error-alert" src="/svg/error.svg" />
                </div>
                <div class="w-1/2 pl-2">
                    <label for="project-port-mail-ui" class="block">Mail UI</label>
                    <input id="project-port-mail-ui" v-model="projectPortMailUi" class="appearance-none border rounded-lg w-full mt-3 mb-1 py-2 px-3 text-gray-700 focus:outline-none" type="number" min="1" :class="{
                        'border-black': !projectPortMailUiValidationError,
                        'border-red-400': projectPortMailUiValidationError,
                    }"/>
                    <img v-if="projectPortMailUiValidationError" alt="Error" class="inline w-6 h-6 absolute error-alert" src="/svg/error.svg" />
                </div>
            </div>
            <div class="mt-3 flex">
                <div class="w-1/2 pr-2">
                    <label for="project-port-app" class="block">Application</label>
                    <input id="project-port-app" v-model="projectPortApp" class="appearance-none border rounded-lg w-full mt-3 mb-1 py-2 px-3 text-gray-700 focus:outline-none" type="number" min="1" :class="{
                        'border-black': !projectPortAppValidationError,
                        'border-red-400': projectPortAppValidationError,
                    }"/>
                    <img v-if="projectPortAppValidationError" alt="Error" class="inline w-6 h-6 absolute error-alert" src="/svg/error.svg" />
                </div>
                <div class="w-1/2 pl-2">
                    <label for="project-port-app-tls" class="block">Application (TLS)</label>
                    <input id="project-port-app-tls" v-model="projectPortAppTls" class="appearance-none border rounded-lg w-full mt-3 mb-1 py-2 px-3 text-gray-700 focus:outline-none" type="number" min="1" :class="{
                        'border-black': !projectPortAppTlsValidationError,
                        'border-red-400': projectPortAppTlsValidationError,
                    }"/>
                    <img v-if="projectPortAppTlsValidationError" alt="Error" class="inline w-6 h-6 absolute error-alert" src="/svg/error.svg" />
                </div>
            </div>
            <div class="mt-3 flex">
                <div class="w-1/2 pr-2">
                    <label for="project-port-database" class="block">Database</label>
                    <input id="project-port-database" v-model="projectPortDatabase" class="appearance-none border rounded-lg w-full mt-3 mb-1 py-2 px-3 text-gray-700 focus:outline-none" type="number" min="1" :class="{
                        'border-black': !projectPortDatabaseValidationError,
                        'border-red-400': projectPortDatabaseValidationError,
                    }"/>
                    <img v-if="projectPortDatabaseValidationError" alt="Error" class="inline w-6 h-6 absolute error-alert" src="/svg/error.svg" />
                </div>
                <div class="w-1/2 pl-2">
                    <label for="project-port-cache" class="block">Cache</label>
                    <input id="project-port-cache" v-model="projectPortCache" class="appearance-none border rounded-lg w-full mt-3 mb-1 py-2 px-3 text-gray-700 focus:outline-none" type="number" min="1" :class="{
                        'border-black': !projectPortCacheValidationError,
                        'border-red-400': projectPortCacheValidationError,
                    }"/>
                    <img v-if="projectPortCacheValidationError" alt="Error" class="inline w-6 h-6 absolute error-alert" src="/svg/error.svg" />
                </div>
            </div>
            <div class="mt-3 flex">
                <div class="w-1/2 pr-2">
                    <label for="project-port-vite-hmr" class="block">Vite HMR</label>
                    <input id="project-port-vite-hmr" v-model="projectPortViteHmr" class="appearance-none border rounded-lg w-full mt-3 mb-1 py-2 px-3 text-gray-700 focus:outline-none" type="number" min="1" :class="{
                        'border-black': !projectPortViteHmrValidationError,
                        'border-red-400': projectPortViteHmrValidationError,
                    }"/>
                    <img v-if="projectPortViteHmrValidationError" alt="Error" class="inline w-6 h-6 absolute error-alert" src="/svg/error.svg" />
                </div>
            </div>
        </div>
        <div class="w-full border-b border-gray-200 my-12 w-1/2"></div>
        <div class="w-full text-right">
            <button
                id="btn-generate-project"
                :disabled="isLoading"
                @click="onProjectGenerateClick()"
                class="transition bg-black hover:bg-white border border-black text-white hover:text-black active:bg-black active:text-white px-6 py-3"
                >
                Generate Project
            </button>
        </div>
    </div>
</template>

<style scoped>
a {
    text-decoration: underline;
    color: #0067C5;
    font-weight: 700;
}
input[type="radio"] {
    margin-left: 2px;
}
.error-alert {
    transform: translate(-2.25rem, 1.25rem);
}
</style>
