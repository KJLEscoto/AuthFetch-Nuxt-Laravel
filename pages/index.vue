<template>
  <div class="h-auto w-full flex flex-col gap-10 justify-center items-center pt-32">

    <div class="h-auto w-1/2 flex flex-col gap-10 justify-center items-center">
      <div class="pt-10">
        <Skew title="AuthFetch" description="Simple Authentication and Fetching of Data" />
      </div>

      <div class="w-full h-auto space-y-2">
        <h1 class="text-base">Features</h1>
        <Accordion :details="details" />
      </div>

      <div class="flex items-center gap-2">
        <p>Framework Used:</p>
        <div>
          Nuxt Laravel
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>

const details = [
  {
    title: 'Account Verification',
    description: 'Verifies identity through a user\'s unique credentials.'
  },
  {
    title: 'Data Encryption',
    description: 'Secures communication between the user and the server to prevent data breaches.'
  },
  {
    title: 'API Calls',
    description: 'Requests data from a server through endpoints.'
  },
  {
    title: 'JSON Format',
    description: 'Represents the fetched data in a structured format for easy processing.'
  },
];

</script>
