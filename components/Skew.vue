<template>
  <div class="text-center -skew-y-2 w-fit">
    <h1 class="text-8xl font-semibold">{{ title }}</h1>
    <p class="text-lg py-2 px-5 bg-[#161616] rounded cursor-default">
      {{ description }}
    </p>
  </div>
</template>

<script setup>
defineProps({
  title: String,
  description: String
})
</script>