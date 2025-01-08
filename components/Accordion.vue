<template>
  <div class="space-y-1">
    <section v-for="(detail, index) in details" :key="index"
      class="bg-gray-300 hover:bg-gray-200 px-7 py-5 shadow-lg rounded relative ">
      <div @click="toggleFeature(index)"
        class="flex justify-between items-center cursor-pointer text-lg font-medium text-black">
        {{ detail.title }}
        <span :class="{
          'rotate-45': openIndex === index,
          'rotate-0': openIndex !== index,
        }" class="transform transition-transform duration-300">
          +
        </span>
      </div>
      <div v-if="openIndex === index" class="mt-2 text-gray-800 transition-all ease-in-out duration-500 text-base">
        <hr class="mb-2 border-gray-400">
        {{ detail.description }}
      </div>
    </section>
  </div>
</template>

<script setup> 
defineProps({
  details: Array,
})

const openIndex = ref(null);

function toggleFeature(index) {
  openIndex.value = openIndex.value === index ? null : index;
}
</script>