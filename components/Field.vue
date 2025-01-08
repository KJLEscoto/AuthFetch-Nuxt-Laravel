<template>
  <div>
    <input :type="type" :id="id" :name="name" :value="modelValue" :placeholder="placeholder"
      @input="$emit('update:modelValue', $event.target.value)" class="border py-2 px-3 rounded w-full text-black" />
  </div>
</template>

<script setup>
// Props for the input field
defineProps({
  type: String,
  placeholder: String,
  id: String,
  name: String,
  modelValue: String, Number
})

// Emit to support two-way binding with v-model
defineEmits([ 'update:modelValue' ])
</script>
