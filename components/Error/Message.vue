<template>
  <p v-if="show" class="text-center text-red-400 text-lg">
    {{ message }}
  </p>
</template>

<script setup>
defineProps({
  show: Boolean,
  message: String
});
</script>
