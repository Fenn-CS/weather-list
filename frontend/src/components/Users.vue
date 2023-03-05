<script>
import Modal from "./Modal.vue";
export default {
  data: () => ({
    users: null,
    selectedUser: null,
    modalIsOpen: false
  }),

  created() {
    this.fetchData()
  },
  methods: {
    async fetchData() {
      const url = 'http://localhost:8000/users'
      const response = await (await fetch(url)).json()
      this.users = JSON.parse(JSON.stringify(response))[0]
    },
    toggleModal() {
      this.modalIsOpen = !this.modalIsOpen
    },
    selectUser (user) {
      this.toggleModal()
      this.selectedUser = user
    } 
  },
  components: {
    Modal
  }
}
</script>

<template>
  <!-- Jumbotron -->
  <div
    class="rounded-lg flex-1 grow bg-neutral-100 p-6 text-neutral-700 shadow-lg dark:bg-neutral-600 dark:text-neutral-200 dark:shadow-black/30">
    <h2 class="mb-5 text-3xl font-semibold">Weather-List</h2>
    <p>
      Stay ahead of the weather with our Laravel and VueJS powered app. Keep track of the forecast for a set of users and
      plan your day accordingly. With intuitive design and reliable weather data from top APIs, our app has got you
      covered, rain or shine. Download now and never get caught in the rain again.
    </p>
    <hr class="my-6 h-0.5 border-t-0 bg-neutral-200 opacity-100 dark:opacity-30" />

    <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md m-5">
      <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
        <thead class="bg-gray-50">
          <tr>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Name</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Weather Conditions (Last hour)</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 border-t border-gray-100">
          <tr v-for="user in users" class="hover:bg-gray-50">
            <th class="flex gap-3 px-6 py-4 font-normal text-gray-900">
              <div class="relative h-10 w-10">
                <img class="h-full w-full rounded-full object-cover object-center"
                  :src="'https://ui-avatars.com/api/?name=' + user.name.replace(' ', '+')" alt="user.name" />
              </div>
              <div class="text-sm">
                <div class="font-medium text-gray-700">{{ user.name }}</div>
                <div class="text-gray-400"> Located around {{ user.weather.name }}</div>
              </div>
            </th>
            <td class="px-6 py-4">
              <div class="flex gap-2">
                <span
                  class="inline-flex items-center gap-1 rounded-full bg-blue-50 px-2 py-1 text-xs font-semibold text-blue-600">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
                  </svg>

                  {{ user.weather.main.temp }}
                </span>
                <span
                  class="inline-flex items-center gap-1 rounded-full bg-indigo-50 px-2 py-1 text-xs font-semibold text-indigo-600">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M2.25 15a4.5 4.5 0 004.5 4.5H18a3.75 3.75 0 001.332-7.257 3 3 0 00-3.758-3.848 5.25 5.25 0 00-10.233 2.33A4.502 4.502 0 002.25 15z" />
                  </svg>

                  {{ user.weather.main.humidity }}
                </span>
                <span
                  class="inline-flex items-center gap-1 rounded-full bg-violet-50 px-2 py-1 text-xs font-semibold text-violet-600">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M9 9.563C9 9.252 9.252 9 9.563 9h4.874c.311 0 .563.252.563.563v4.874c0 .311-.252.563-.563.563H9.564A.562.562 0 019 14.437V9.564z" />
                  </svg>

                  {{ user.weather.wind.speed }}
                </span>
              </div>
            </td>
            <td class="px-6 py-4">
              <div class="flex justify-end gap-4">
                <a x-data="{ tooltip: 'Delete' }" href="#"  @click="selectUser(user)">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9zm3.75 11.625a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                  </svg>

                </a>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <modal :is-modal-open="modalIsOpen" @close-modal="toggleModal" :user="selectedUser" title="Welcome to Weather-List" content="It's beautiful Vue and a Laravel back-end. Just play around!"></modal>
<!-- Jumbotron -->
</template>
