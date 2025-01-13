<script setup>
const props = defineProps({
  disabled: {
    type: Boolean,
    default: false,
  },
  datos: {
    type: [Object, Boolean],
    default: false,
  },
  data:{
    type: [Object, Boolean],
    default: false,
  }
});

const emit = defineEmits([
  'onSubmit',
  'onEdit',
  'onStatus',
])

const form = ref();
const loading = ref(false);
const formData = ref({});
const validateAndSubmit = () => {
  form?.value?.validate().then((success) => {
    if (success.valid) {
      console.log(formData.value)
      emit('onSubmit', formData.value)
    }
  });
};

const validateAndSubmitEdit = () => {
  form?.value?.validate().then((success) => {
    if (success.valid) {
      emit('onEdit', formData.value)
    }
  });
}

onMounted( () => {

  if (props.datos) {
    formData.value = { ...props.datos };
    formData.value.activo = !!props.datos.activo;
  }
});

</script>

<template>
  <Loader :show="loading" />
  <VForm ref="form" lazy-validation>
    <VRow>
      <VCol cols="12">
        <VTextField
          v-model="formData.nombre"
          :rules="[v => !!v || 'El nombre es requerida']"
          label="Nombre"
          placeholder="Nombre"
          required
        />
      </VCol>
      <VCol cols="12">
        <VTextarea
          v-model="formData.descripcion"
          auto-grow
          label="Descripción"
          rows="2"
          placeholder="Descripción"
          row-height="20"
        />
      </VCol>
      <VCol cols="6" v-if="datos">
        <VCheckbox
          v-model="formData.activo"
          label="Catálogo Tendencia Activo"
          hide-details
        />
      </VCol>
      <VCol cols="12" class="d-flex justify-end" v-if="!props.disabled">
        <VBtn color="primary" @click="validateAndSubmitEdit" v-if="datos">
          Editar Catalogo
        </VBtn>
        <VBtn color="primary" @click="validateAndSubmit" v-else>
          Crear Catalogo
        </VBtn>
      </VCol>
    </VRow>
  </VForm>
</template>
