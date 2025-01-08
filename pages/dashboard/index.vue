<template>
  <div class="px-40 py-5 mt-32">
    <div class="space-y-5">
      <div class="flex gap-5">
        <button @click="fetchUsers" class="px-4 py-2 border rounded hover:border-l-4">
          Fetch Users
        </button>
        <button @click="clearUsers" class="opacity-70 hover:bg-[#161616] hover:opacity-100 px-4 py-2 rounded">
          Clear
        </button>
      </div>

      <!-- Loading state -->
      <div v-if="loading" class="text-gray-500 flex items-center gap-2">
        <Icon name="loader"/>
        <span>Please wait...</span>
      </div>

      <!-- No data state -->
      <div v-else-if="!data.users.length" class="text-gray-400">No Users</div>

      <!-- Table display -->
      <div v-else>
        <Table :columns="columns.map(col => col.title)" :rows="formattedUsers" :values="columns.map(col => col.data)" />
      </div>
    </div>
  </div>
</template>

<script setup>
definePageMeta({
  middleware: 'auth',
})

const cookie = useCookie('my_auth_token')

const data = reactive({
  users: [],
})
const loading = ref(false) // Loading state

const columns = [
  { title: '#', data: '#' },
  { title: 'Name', data: 'name' },
  { title: 'Email', data: 'email' },
  { title: 'Date Registered', data: 'created_at' },
]

// Format date function
function formatDate(date) {
  const options = { month: 'short', day: 'numeric', year: 'numeric' }
  return new Date(date).toLocaleDateString('en-US', options)
}

// Computed property for formatted users
const formattedUsers = computed(() =>
  data.users.map((user) => ({
    ...user,
    created_at: formatDate(user.created_at),
  }))
)

async function fetchUsers() {
  loading.value = true // Set loading to true
  try {
    const result = await $fetch('http://localhost:8000/api/users', {
      headers: {
        Authorization: `Bearer ${cookie.value.token}`,
      },
    })
    data.users = result.users || []
  } catch (error) {
    console.error('Error fetching users:', error.data)
  } finally {
    loading.value = false // Set loading to false
  }
}

function clearUsers() {
  data.users = []
}

onMounted(() => {
  fetchUsers()
})
</script>
