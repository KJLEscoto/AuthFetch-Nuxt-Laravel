<template>
  <div class="px-40 py-5 mt-32">
    <div class="space-y-5">
      <div class="flex gap-5">
        <button @click="fetch">Fetch</button>
        <button @click="clear">Clear</button>
      </div>
      <p v-if="!data">No Users</p>
      <p v-else>{{ data.users }}</p>
    </div>
  </div>
</template>

<script setup>
definePageMeta({
  middleware: 'auth'
})

const cookie = useCookie('my_auth_token')
const data = ref(null)

async function fetch() {
  try {
    const result = await $fetch("http://localhost:8000/api/users", {
      headers: {
        'Authorization': `Bearer ${cookie.value.token}`
      }
    })
    data.value = result

  } catch (error) {
    console.error("Error during fetching:", error.data)
    alert(error.data.message || "An error occurred during fetching.")
  }
}

function clear() {
  data.value = null
}
</script>