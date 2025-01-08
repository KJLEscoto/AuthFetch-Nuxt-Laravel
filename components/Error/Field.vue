<template>
  <div v-if="error" class="text-red-400 text-sm text-wrap">
    {{ error[0] }}
  </div>
</template>

<script setup>
defineProps({
  error: Array, Object
})

</script>