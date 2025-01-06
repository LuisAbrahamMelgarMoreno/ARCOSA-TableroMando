<script setup>
import Check from "@/components/Check.vue";
import Error from "@/components/Error.vue";

const showDialog = ref(false);
const message = ref('');
const showComponent = shallowRef();

const DialogSuccess = (_message) => {
  showComponent.value = Check;
  message.value = _message;
  showDialog.value = true;
}

const DialogError = (_message) => {
  showComponent.value = Error;
  message.value = _message;
  showDialog.value = true;
}

defineExpose({DialogSuccess, DialogError});
</script>

<template>
  <VDialog v-model="showDialog" class="v-dialog-sm">
    <VCard title="Mensaje">
      <DialogCloseBtn variant="text" size="small" @click="showDialog = false"/>

      <VCardText>
        <VRow>
          <VCol>
            <component :is="showComponent"/>
            <p class="text-center" v-text="message"/>
          </VCol>
        </VRow>
      </VCardText>
      <VCardActions>
        <VSpacer/>
        <VBtn @click="showDialog = false">
          Cerrar
        </VBtn>
      </VCardActions>
    </VCard>
  </VDialog>
</template>
