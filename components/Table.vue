<template>
  <div class="overflow-x-auto">
    <table class="table-auto border-collapse border border-gray-700 w-full">
      <thead>
        <tr class="bg-gray-700">
          <th v-for="(column, index) in columns" :key="index"
            class="border border-gray-700 px-4 py-2 text-left capitalize">
            {{ column }}
          </th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(row, rowIndex) in rows" :key="rowIndex">
          <td v-for="(value, valueIndex) in values" :key="valueIndex" class="border border-gray-700 px-4 py-2 text-gray-300">
            <!-- Handle the "#" column dynamically -->
            <span v-if="value === '#'">{{ rowIndex + 1 }}</span>
            <span v-else>{{ row[value] }}</span>
          </td>
        </tr>
      </tbody>
    </table>
    <p v-if="!rows.length" class="text-center text-gray-500 mt-5">No data available</p>
  </div>
</template>

<script setup>
defineProps({
  columns: {
    type: Array,
    required: true,
  },
  rows: {
    type: Array,
    required: true,
  },
  values: {
    type: Array,
    required: true,
  },
})
</script>
