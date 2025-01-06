<script setup>

const DialogMessage = inject('DialogMessage');

const dialogoCreacion = ref(false)

const props = defineProps({
  hijoFormulario: {
    type: Function,
    required: true,
  },
  datos: {
    type: Object,
    required: false
  },
  data:{
    type: Object,
    required: false
  },
  create: {
    type: Function,
    required: true,
  },
  update: {
    type: Function,
    required: true,
  },
});

const loading = ref(false);
const create = async (formData) => {
  loading.value = true;
  try {
    const response = await props.create(formData);
    DialogMessage.showDialogSuccess('Catalogo Creado');
    cerrarDiaologos();
  } catch (error) {
    DialogMessage.showDialogError('Hubo una falla al guardar el catalogo - ' + error);
  } finally {
    loading.value = false;
  }
}

const update = async (formData) => {
  loading.value = true;
  try {
    const response = await props.update(formData);
    DialogMessage.showDialogSuccess('Catalogo editado');
    cerrarDiaologos();
  } catch (error) {
    DialogMessage.showDialogError('Hubo una falla al guardar el registro - ' + error);
  } finally {
    loading.value = false;
  }
}

const cargarDatos = () => {
  dialogoCreacion.value = true;
}

const cerrarDiaologos = () => {
  dialogoCreacion.value = false
  props.hijoFormulario()
}
</script>

<template>
  <Loader :show="loading" />
  <IconBtn @click="cargarDatos" v-if="datos">
    <VIcon size="24" icon="ri-edit-2-line" />
    <VTooltip location="top" activator="parent">
      <span>Editar Catalogo</span>
    </VTooltip>
  </IconBtn>
  <VBtn @click="cargarDatos" v-else>
    Crear Catalogo
  </VBtn>
  <VDialog v-model="dialogoCreacion" class="v-dialog-sm">
    <VCard :title="datos ? 'Editar catalogo' : 'Nuevo catalogo'">
      <DialogCloseBtn variant="text" size="small" @click="dialogoCreacion = false" />
      <VCardText>
        <slot name="serviceForm" :datos="props.datos" :data="props.data" :onSubmit="create" :onEdit="update"></slot>
      </VCardText>
    </VCard>
  </VDialog>
</template>
