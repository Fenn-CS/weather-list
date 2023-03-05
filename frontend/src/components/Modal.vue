<template>
    <TransitionRoot appear :show="isModalOpen" as="template">
        <Dialog as="div" @close="closeModal" class="relative z-10">
            <TransitionChild as="template" enter="duration-300 ease-out" enter-from="opacity-0" enter-to="opacity-100"
                leave="duration-200 ease-in" leave-from="opacity-100" leave-to="opacity-0">
                <div class="fixed inset-0 bg-black bg-opacity-25" />
            </TransitionChild>

            <div class="fixed inset-0 overflow-y-auto">
                <div class="flex min-h-full items-center justify-center p-4 text-center">
                    <TransitionChild as="template" enter="duration-300 ease-out" enter-from="opacity-0 scale-95"
                        enter-to="opacity-100 scale-100" leave="duration-200 ease-in" leave-from="opacity-100 scale-100"
                        leave-to="opacity-0 scale-95">
                        <DialogPanel
                            class="w-full max-w-md transform overflow-hidden rounded-2xl bg-white p-6 text-left align-middle shadow-xl transition-all">
                            <DialogTitle v-if="user" as="h3" class="text-lg font-medium leading-6 text-gray-900">
                                {{ user.name }} Weather Details
                            </DialogTitle>

                            <DialogTitle v-else as="h3" class="text-lg font-medium leading-6 text-gray-900">
                                {{ title }}
                            </DialogTitle>

                            <div v-if="user" class="mt-2">
                                <p class="text-sm text-gray-500">
                                <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                                    <thead class="bg-gray-50">
                                        <th scope="col" class="px-3 py-2 font-medium text-gray-900">Main</th>
                                    </thead>
                                    <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                                        <tr class="px-6 py-4">
                                            <td>
                                                <table class="inner-table">
                                                    <thead>
                                                        <th>Temp</th>
                                                        <th>Feels Like</th>
                                                        <th>Temp Min</th>
                                                        <th>Temp Max</th>
                                                        <th>Pressure</th>
                                                        <th>Humidity</th>
                                                    </thead>
                                                    <tbody>
                                                       <td> {{ user.weather.main.temp }} </td>
                                                       <td> {{ user.weather.main.feels_like }} </td>
                                                       <td> {{ user.weather.main.temp_min }}  </td>
                                                       <td> {{ user.weather.main.temp_max }}  </td>
                                                       <td> {{ user.weather.main.pressure }} </td>
                                                       <td> {{ user.weather.main.humidity }} </td>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                                    <thead class="bg-gray-50">
                                        <th scope="col" class="px-3 py-2 font-medium text-gray-900">Wind</th>
                                    </thead>
                                    <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                                        <tr class="px-6 py-4">
                                            <td>
                                                <table class="inner-table">
                                                    <thead>
                                                        <th>Speed</th>
                                                        <th>Deg</th>
                                                        <th>Gust</th>
                                                    </thead>
                                                    <tbody>
                                                       <td> {{ user.weather.wind.speed }} </td>
                                                       <td> {{ user.weather.wind.deg }} </td>
                                                       <td> {{ user.weather.wind.gust }}  </td>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                                    <thead class="bg-gray-50">
                                        <th scope="col" class="px-3 py-2 font-medium text-gray-900">Clouds</th>
                                    </thead>
                                    <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                                        <tr class="px-6 py-4">
                                            <td>
                                                <table class="inner-table">
                                                    <thead>
                                                        <th>All</th>
                                                        <th>Dt</th>
                                                    </thead>
                                                    <tbody>
                                                       <td> {{ user.weather.clouds.all }} </td>
                                                       <td> {{ user.weather.clouds.dt }} </td>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                                    <thead class="bg-gray-50">
                                        <th scope="col" class="px-3 py-2 font-medium text-gray-900">Area Information</th>
                                    </thead>
                                    <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                                        <tr class="px-6 py-4">
                                            <td>
                                                <table class="inner-table">
                                                    <thead>
                                                        <th>Country</th>
                                                        <th>Sunrise</th>
                                                        <th>Sun set</th>
                                                    </thead>
                                                    <tbody>
                                                       <td> {{ user.weather.sys.country }} </td>
                                                       <td> {{ user.weather.sys.sunrise }} </td>
                                                       <td> {{ user.weather.sys.sunset }}  </td>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                </p>
                            </div>
                            <div v-else class="mt-2">
                                <p class="text-sm text-gray-500">
                                    {{ content }}
                                </p>
                            </div>

                            <div class="mt-4">
                                <button type="button"
                                    class="inline-flex justify-center rounded-md border border-transparent bg-blue-100 px-4 py-2 text-sm font-medium text-blue-900 hover:bg-blue-200 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 focus-visible:ring-offset-2"
                                    @click="closeModal">
                                    Got it, thanks!
                                </button>
                            </div>
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>
  
<script>
import { ref } from 'vue'
import {
    TransitionRoot,
    TransitionChild,
    Dialog,
    DialogPanel,
    DialogTitle,
} from '@headlessui/vue'


export default {

    methods: {
        closeModal() {
            this.$emit('closeModal');
        }
    },
    components: {
        TransitionRoot,
        TransitionChild,
        Dialog,
        DialogPanel,
        DialogTitle
    },
    props: {
        isModalOpen: Boolean,
        title: String,
        content: String,
        user: Object
    }
}
</script>
  