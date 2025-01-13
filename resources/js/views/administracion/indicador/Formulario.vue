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
const catalogoPlantas = ref([])
const catalogoProcesos = ref([])
const catalogoTendencia = ref([])
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

  catalogoPlantas.value = props.data.plantas;
  catalogoTendencia.value = props.data.tendencias;
  catalogoProcesos.value = props.data.procesos;

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
        <VAutocomplete
          :items="catalogoPlantas"
          item-value="id"
          item-title="nombre"
          label="Plantas"
          required
          :rules="[v=> !!v || 'La planta es requerida']"
          v-model="formData.id_catalogo_planta"
        />
      </VCol>
      <VCol cols="12">
        <VAutocomplete
          :items="catalogoProcesos"
          item-value="id"
          item-title="nombre"
          label="Procesos"
          :rules="[v => !!v || 'El proceso es requerido']"
          required
          v-model="formData.id_catalogo_proceso"
        />
      </VCol>
      <VCol cols="12">
        <VAutocomplete
          :items="catalogoTendencia"
          item-value="id"
          item-title="nombre"
          label="Tendencias"
          :rules="[v => !!v || 'La tendencia es requerida']"
          required
          v-model="formData.id_catalogo_tendencia"
        />
      </VCol>
      <VCol cols="12">
        <VTextField
          v-model="formData.minimo"
          label="Minimo"
          append-inner-icon="ri-percent-line"
          required
          type="number"
          :max="100"
          :min="0"
          :rules="[v => (v >= 0 && v <= 100) ? true : 'El valor debe de estar entre 0 a 100']"
        />
      </VCol>
      <VCol cols="12">
        <VTextField
          v-model="formData.aceptable"
          label="Aceptable"
          append-inner-icon="ri-percent-line"
          type="number"
          :max="100"
          :min="0"
          :rules="[v => (v >= 0 && v <= 100) ? true : 'El valor debe de estar entre 0 a 100']"
          required
        />
      </VCol>
      <VCol>
        <VTextField
          v-model="formData.excelente"
          label="Excelente"
          type="number"
          :max="100"
          :min="0"
          append-inner-icon="ri-percent-line"
          required
          :rules="[v => (v >= 0 && v <= 100) ? true : 'El valor debe de estar entre 0 a 100']"
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
          label="Indicador Activo"
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

