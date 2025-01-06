<script setup>
import Error from "@/components/Error.vue"

definePage({
  meta: {
    action: 'read',
    subject: 'Auth',
  },
})
</script>

<template>
  <VRow class="match-height">
    <!-- 👉 Award -->
    <VCol
      cols="12"
      md="4"
    >
    </VCol>

  </VRow>
</template>

<style lang="scss">
@use "@core-scss/template/libs/apex-chart.scss";
</style>
