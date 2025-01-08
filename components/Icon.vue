<template>
  <template v-if="name === 'loader'">
    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
      <rect width="2.8" height="12" x="1" y="6" fill="currentColor">
        <animate id="svgSpinnersBarsScale0" attributeName="y" begin="0;svgSpinnersBarsScale1.end-0.1s" calcMode="spline"
          dur="0.6s" keySplines=".36,.61,.3,.98;.36,.61,.3,.98" values="6;1;6"></animate>
        <animate attributeName="height" begin="0;svgSpinnersBarsScale1.end-0.1s" calcMode="spline" dur="0.6s"
          keySplines=".36,.61,.3,.98;.36,.61,.3,.98" values="12;22;12"></animate>
      </rect>
      <rect width="2.8" height="12" x="5.8" y="6" fill="currentColor">
        <animate attributeName="y" begin="svgSpinnersBarsScale0.begin+0.1s" calcMode="spline" dur="0.6s"
          keySplines=".36,.61,.3,.98;.36,.61,.3,.98" values="6;1;6"></animate>
        <animate attributeName="height" begin="svgSpinnersBarsScale0.begin+0.1s" calcMode="spline" dur="0.6s"
          keySplines=".36,.61,.3,.98;.36,.61,.3,.98" values="12;22;12"></animate>
      </rect>
      <rect width="2.8" height="12" x="10.6" y="6" fill="currentColor">
        <animate attributeName="y" begin="svgSpinnersBarsScale0.begin+0.2s" calcMode="spline" dur="0.6s"
          keySplines=".36,.61,.3,.98;.36,.61,.3,.98" values="6;1;6"></animate>
        <animate attributeName="height" begin="svgSpinnersBarsScale0.begin+0.2s" calcMode="spline" dur="0.6s"
          keySplines=".36,.61,.3,.98;.36,.61,.3,.98" values="12;22;12"></animate>
      </rect>
      <rect width="2.8" height="12" x="15.4" y="6" fill="currentColor">
        <animate attributeName="y" begin="svgSpinnersBarsScale0.begin+0.3s" calcMode="spline" dur="0.6s"
          keySplines=".36,.61,.3,.98;.36,.61,.3,.98" values="6;1;6"></animate>
        <animate attributeName="height" begin="svgSpinnersBarsScale0.begin+0.3s" calcMode="spline" dur="0.6s"
          keySplines=".36,.61,.3,.98;.36,.61,.3,.98" values="12;22;12"></animate>
      </rect>
      <rect width="2.8" height="12" x="20.2" y="6" fill="currentColor">
        <animate id="svgSpinnersBarsScale1" attributeName="y" begin="svgSpinnersBarsScale0.begin+0.4s" calcMode="spline"
          dur="0.6s" keySplines=".36,.61,.3,.98;.36,.61,.3,.98" values="6;1;6"></animate>
        <animate attributeName="height" begin="svgSpinnersBarsScale0.begin+0.4s" calcMode="spline" dur="0.6s"
          keySplines=".36,.61,.3,.98;.36,.61,.3,.98" values="12;22;12"></animate>
      </rect>
    </svg>
  </template>

  <template v-if="name === 'spinner'">
    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
      <path fill="currentColor"
        d="M2,12A11.2,11.2,0,0,1,13,1.05C12.67,1,12.34,1,12,1a11,11,0,0,0,0,22c.34,0,.67,0,1-.05C6,23,2,17.74,2,12Z">
        <animateTransform attributeName="transform" dur="0.6s" repeatCount="indefinite" type="rotate"
          values="0 12 12;360 12 12" />
      </path>
    </svg>
  </template>

  <template v-if="name === 'nuxt'">
    <svg :class="className" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
      <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="m12.146 8.583l-1.3-2.09a1.046 1.046 0 0 0-1.786.017l-5.91 9.908A1.046 1.046 0 0 0 4.047 18H7.96m12.083 0c.743 0 1.201-.843.82-1.505l-4.044-7.013a.936.936 0 0 0-1.638 0l-4.043 7.013c-.382.662.076 1.505.819 1.505z">
      </path>
    </svg>
  </template>

  <template v-if="name === 'laravel'">
    <svg :class="className" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
      <path fill="none" stroke="currentColor" stroke-linejoin="round"
        d="m17 13l3.464-2V7L17 5l-3.464 2v4M17 13l-3.464-2M17 13v4l-7 4m7-8V9m0 4l-7 4m3.536-6L10.5 12.735M10 21l-3.464-2.132M10 21v-4m-3.464 2v-.132m0 0V15l3.964-2.265m-3.964 6.133L3.5 17V5m0 0L7 3l3.5 2m-7 0l3 2m4-2v7.735M10.5 5l-4 2M17 9l3.5-2M17 9l-3.5-2M10 17l-3.5-2m0 .5V7" />
    </svg>
  </template>
</template>

<script setup>
defineProps({
  name: '',
  className: ''
})
</script>