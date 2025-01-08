<template>
  <div class="h-auto w-full flex items-center justify-center pt-32">
    <form @submit.prevent="register" class="space-y-5">
      <div class="pb-3">
        <Skew title="Sign Up" description="Create New Account" />
      </div>

      <!-- General Error -->
      <ErrorMessage
        :show="!state.errors.name && !state.errors.email && !state.errors.password && !state.errors.confirm_password && state.errors.message"
        :message="state.errors.message" />

      <!-- Input for Name -->
      <div class="space-y-1">
        <Label for="name" label="Name" />
        <Field v-model="state.user.name" id="name" name="name" required />
        <ErrorField :error="state.errors.name" />
      </div>

      <!-- Input for Email -->
      <div class="space-y-1">
        <Label for="email" label="Email" />
        <Field type="email" v-model="state.user.email" id="email" name="email" required />
        <ErrorField :error="state.errors.email" />
      </div>

      <!-- Input for Password -->
      <div class="space-y-1">
        <Label for="password" label="Password" />
        <Field type="password" v-model="state.user.password" id="password" name="password" required />
        <ErrorField :error="state.errors.password" />
      </div>

      <!-- Input for Confirm Password -->
      <div class="space-y-1">
        <Label for="confirm_password" label="Confirm Password" />
        <Field type="password" v-model="state.user.confirm_password" id="confirm_password" name="confirm_password" required />
        <ErrorField :error="state.errors.confirm_password" />
      </div>

      <!-- Submit Button -->
      <div class="w-full">
        <input
          class="cursor-pointer px-3 py-2 bg-gray-700 text-white rounded shadow-lg hover:bg-gray-600 active:bg-gray-800 w-full"
          type="submit" value="Register">
      </div>

      <div class="opacity-50 w-fit mx-auto text-sm font-extralight pb-5">
        Already have an account? <nuxt-link to="/auth/login" class="hover:underline hover:text-white">Login
          here</nuxt-link>
      </div>
    </form>
  </div>
</template>

<script setup>

const cookie = useCookie('my_auth_token')

const state = reactive({
  user: {
    name: '',
    email: '',
    password: '',
    confirm_password: '',
  },
  errors : {}
})

async function register() {
  const params = {
    name: state.user.name,
    email: state.user.email,
    password: state.user.password,
    password_confirmation: state.user.confirm_password,
  }

  try {
    const result = await $fetch("http://localhost:8000/api/register", {
      method: 'POST',
      body: params,
    })
    alert("Registration successful!")

    cookie.value = result

    console.log(cookie.value)


    // clear
    state.user.name = ''
    state.user.email = ''
    state.user.password = ''
    state.user.confirm_password = ''
    state.errors = {}; // Clear errors

    navigateTo('/auth/login')
  } catch (error) {
    console.error('Error during login:', error.data);

    // Assign general message error if present
    state.errors.message = error.data.message || 'An error occurred during login.';

    // Assign field-specific errors if available
    state.errors.name = error.data.errors?.name || null;
    state.errors.email = error.data.errors?.email || null;
    state.errors.password = error.data.errors?.password || null;
    state.errors.confirm_password = error.data.errors?.confirm_password || null;
  }
}
</script>
