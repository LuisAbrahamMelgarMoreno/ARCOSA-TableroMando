<script setup>
import Formulario from "@/views/FormularioModal.vue";
import {$api} from "@/utils/api.js";

const props = defineProps({
  headers: {
    type: Object,
    required: true,
  },
  getAll: {
    type: Function,
    required: true,
  },
  getData: {
    type: Function,
    required: false,
  },
  create: {
    type: Function,
    required: true,
  },
  update: {
    type: Function,
    required: true,
  },
  subject: {
    type: String,
    required: true,
  },
});

const search = ref('')
const data = ref([])
const loading = ref(false);
const dataOpciones = ref()

const obtencionDatos = async () => {
  loading.value = true;
  try {
    const response = await props.getAll();
    data.value = response.data;
  } catch (error) {
    console.log(error)
  } finally {
    loading.value = false;
  }
  if(props.getData){
    try {
      const response = await props.getData();
      dataOpciones.value = response.data;
    } catch (error) {
      console.log(error)
    }
  }
}
onMounted(() => {
  obtencionDatos()
})
</script>

<template>
  <div>
    <VCardText>
      <VRow>
        <VCol cols="12" class="d-flex justify-center">
          <h3 v-text="props.subject"></h3>
        </VCol>
        <VCol :cols="$can('crear', props.subject) ? '7' : '12'" :sm="$can('crear', props.subject) ? '9' : '12'">
          <VTextField
            v-model="search" density="compact" label="Buscar..." append-inner-icon="mdi-magnify"
            single-line hide-details dense outlined />
        </VCol>
        <VCol v-if="$can('crear', props.subject)" cols="5" sm="3">
          <Formulario :data="dataOpciones" :hijoFormulario="obtencionDatos" :create="create" :update="update">
            <template #serviceForm="{ datos, data, onSubmit, onEdit }">
              <slot name="form" :datos="datos" :data="data" :onSubmit="onSubmit" :onEdit="onEdit" />
            </template>
          </Formulario>
        </VCol>
      </VRow>
    </VCardText>

    <VDataTable :headers="props.headers" :items="data" :search="search" :items-per-page="10"
                loading-text="Cargando... Por favor espere" :loading="loading">
      <template #expanded-row="slotProps">
        <slot name="expand-section" :slotProps="slotProps"></slot>
      </template>
      <template #item.multi_planta="{ item }">
        <div class="d-flex align-center">
          <div class="d-flex flex-column ms-3">
            <span class="d-block font-weight-medium text-truncate text-high-emphasis">{{ item.multi_planta ? 'Si' : 'No'}}</span>
          </div>
        </div>
      </template>
      <template #item.activo="{ item }">
        <div class="d-flex align-center">
          <div class="d-flex flex-column ms-3">
            <span class="d-block font-weight-medium text-truncate text-high-emphasis">{{ item.activo ? 'Si' : 'No'}}</span>
          </div>
        </div>
      </template>
      <template #item.acciones="{ item }">
        <div class="d-flex align-center">
          <slot name="update" />
          <Formulario v-if="$can('editar', props.subject)"
                      :datos="item" :data="dataOpciones" :hijoFormulario="obtencionDatos" :create="create" :update="update">
            <template #serviceForm="{ datos, data , onSubmit, onEdit }">
              <slot name="form" :datos="datos" :data="data" :onSubmit="onSubmit" :onEdit="onEdit" />
            </template>
          </Formulario>
        </div>
      </template>
    </VDataTable>
  </div>
</template>
