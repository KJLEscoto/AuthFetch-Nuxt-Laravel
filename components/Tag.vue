<template>
  <NuxtLink :to="path" target="_blank">
    <div :class="`${className} flex gap-1 items-center px-2 py-1 text-xs font-semibold rounded`">
      <Icon :className="iconClass" :name="icon" />
      <h1 class="capitalize">{{ title }}</h1>
    </div>
  </NuxtLink>
</template>

<script setup>
defineProps({
  path: '',
  className: '',
  iconClass: '',
  icon: '',
  title: '',
})
</script>