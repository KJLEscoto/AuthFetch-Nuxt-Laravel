<template>
  <div class="h-auto w-full flex items-center justify-center pt-32">
    <form @submit.prevent="login" class="space-y-5 w-auto">
      <div class="pb-3 pt-10">
        <Skew title="Sign In" description="Login to Your Account" />
      </div>

      <!-- General Error -->
      <ErrorMessage :show="!state.errors.email && !state.errors.password && state.errors.message"
        :message="state.errors.message" />

      <!-- Input for Email -->
      <div class="space-y-1">
        <Label for="email" label="Email" />
        <Field v-model="state.user.email" id="email" name="email" required />
        <ErrorField :error="state.errors.email" />
      </div>

      <!-- Input for Password -->
      <div class="space-y-1">
        <Label for="password" label="Password" />
        <Field type="password" v-model="state.user.password" id="password" name="password" required />
        <ErrorField :error="state.errors.password" />
      </div>

      <!-- Submit Button -->
      <div class="w-full">
        <input
          class="cursor-pointer px-3 py-2 bg-gray-700 text-white rounded shadow-lg hover:bg-gray-600 active:bg-gray-800 w-full"
          type="submit" value="Login">
      </div>

      <div class="opacity-50 w-fit mx-auto text-sm font-extralight pb-5">
        No account yet? <nuxt-link to="/auth/register" class="hover:underline hover:text-white">Register
          here</nuxt-link>
      </div>
    </form>
  </div>
</template>

<script setup>
const cookie = useCookie('my_auth_token');

const state = reactive({
  user: {
    email: '',
    password: '',
  },
  errors: {},
});

async function login() {
  const params = {
    email: state.user.email,
    password: state.user.password,
  };

  try {
    const result = await $fetch('http://localhost:8000/api/login', {
      method: 'POST',
      body: params,
    });

    // Set authentication token
    cookie.value = result;

    // Navigate to dashboard
    navigateTo('/dashboard');

    // Clear form fields
    state.user.email = '';
    state.user.password = '';
    state.errors = {}; // Clear errors

  } catch (error) {
    console.error('Error during login:', error.data);

    // Assign general message error if present
    state.errors.message = error.data.message || 'An error occurred during login.';

    // Assign field-specific errors if available
    state.errors.email = error.data.errors?.email || null;
    state.errors.password = error.data.errors?.password || null;
  }
}
</script>

