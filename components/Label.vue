<template>
  <div>
    <label :for="props.for" class="capitalize font-medium text-primary-text">
      {{ label }}
    </label>
  </div>
</template>

<script setup>
const props = defineProps({
  label: String,
  for: String, 
})
</script>