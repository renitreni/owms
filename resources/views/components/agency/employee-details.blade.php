<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Other Details') }}
        </h2>
    </x-slot>

    <div id="app" class="pb-12 pt-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-x-auto shadow-sm sm:rounded-lg p-5 pt-8">
                <ul class="list-reset flex border-b">
                    <li class="mr-1" v-bind:class="{'-mb-px': (tab == 1)}">
                        <span @click="tab = 1" class="cursor-pointer bg-white inline-block"
                              v-bind:class="{'border-l border-t border-r rounded-t py-2 px-4 text-blue-dark font-bold': (tab == 1), 'py-2 px-4 hover:text-blue-400 hover:bg-gray-100': (tab != 1)}">Documents</span>
                    </li>
                    <li class="mr-1" v-bind:class="{'-mb-px': (tab == 2)}">
                        <span @click="tab = 2" class="cursor-pointer bg-white inline-block"
                              v-bind:class="{'border-l border-t border-r rounded-t py-2 px-4 text-blue-dark font-bold': (tab == 2), 'py-2 px-4 hover:text-blue-400 hover:bg-gray-100': (tab != 2)}">Flight Details</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <x-slot name="scripts">
        <script>
            const e = new Vue({
                el: '#app',
                data() {
                    return {
                        overview: null,
                        tab: 1,
                    }
                },
                mounted() {
                    var $this = this;
                }
            })
        </script>
    </x-slot>
</x-app-layout>
