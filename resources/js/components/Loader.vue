<script setup>
const props = defineProps({
  show: {
    type: Boolean,
    required: true,
  }
});
</script>

<template>
  <VDialog v-model="props.show" width="300" persistent>
    <VCard color="primary" width="300">
      <VCardText class="pt-3">
        Cargando, Por favor espere...
        <VProgressLinear indeterminate bg-color="#fff" class="mb-0 mt-4" />
      </VCardText>
    </VCard>
  </VDialog>
</template>
