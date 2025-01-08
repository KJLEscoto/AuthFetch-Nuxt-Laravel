<template>
  <nav class=" bg-black py-4 px-40 shadow-xl fixed top-0 z-50 w-full border-b border-gray-500">
    <span v-if="cookie" class="flex justify-between items-center">
      <NuxtLink to="/dashboard" class="font-bold text-2xl cursor-pointer">
        <h1 class="hover:opacity-70">Dashboard</h1>
      </NuxtLink>

      <!-- Logout Button -->
      <div class="w-fit">
        <button @click="logout"
          class="px-4 py-2 bg-red-500 text-white rounded shadow-lg hover:bg-red-400 active:bg-red-600 w-full">
          Logout
        </button>
      </div>
    </span>

    <span v-else class="flex justify-between items-center">
      <Logo />
      <div class="flex gap-x-3">
        <button @click="goTo('/auth/login')" class="opacity-70 hover:bg-[#161616] hover:opacity-100 px-4 py-2 rounded">
          Login
        </button>
        <button @click="goTo('/auth/register')" class="px-4 py-2 border rounded hover:border-r-4">
          Register
        </button>
      </div>
    </span>
  </nav>

</template>

<script setup>
definePageMeta({
  middleware: 'auth'
})

const cookie = useCookie('my_auth_token')

function goTo(link) {
  navigateTo(link)
}

async function logout() {
  try {
    const result = await $fetch("http://localhost:8000/api/logout", {
      method: 'DELETE',
      headers: {
        'Authorization': `Bearer ${cookie.value.token}`
      }
    })
    alert("Logout successful!")

    cookie.value = null
    console.log(result)

    navigateTo('/auth/login')
  } catch (error) {
    console.error("Error during logout:", error.data)
    alert(error.data.message || "An error occurred during logout.")
  }
}

</script>