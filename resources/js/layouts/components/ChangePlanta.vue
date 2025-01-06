<script setup>
import { ref, watch, onMounted } from 'vue'

const props = defineProps({
  plantas: {
    type: Array,
    required: true,
  },
  plantaSeleccionada: {
    type: Object,
    required: true,
  }
})

const seleccionado = ref(null)
const watchSeleccionado = ref([])
const inicio = ref(false)
const loading = ref(false)
// Inicializar seleccionado con el valor almacenado en localStorage
onMounted(() => {
  if (props.plantaSeleccionada) {
    seleccionado.value = props.plantaSeleccionada
    watchSeleccionado.value = [props.plantaSeleccionada]
  }
})

watch(watchSeleccionado, (newVal) => {

  if (newVal.length > 0 && inicio.value) {
    seleccionado.value = newVal[0]
    localStorage.setItem('plantaSeleccionada', JSON.stringify(newVal[0]))
    loading.value = true;
    setTimeout(()=>{
      location.reload()
    },1000)
  }else{
    inicio.value = true;
  }
}, {deep: true})

const selectPlanta = (planta) => {
  watchSeleccionado.value = [planta]
}
</script>

<template>
  <Loader :show="loading" />
<!--  <p class="d-flex justify-center align-center" v-if="seleccionado">{{ 'Planta Seleccionada: ' + seleccionado.nombre }}</p>-->
  <IconBtn v-if="props.plantas.length > 0">
    <VIcon icon="ri-building-4-line"/>

    <VTooltip
      activator="parent"
      open-delay="1000"
      scroll-strategy="close"
    >
      <span class="text-capitalize">Cambiar Planta</span>
    </VTooltip>
    <VMenu
      activator="parent"
      offset="15px"
      width="160"
    >
      <VList
        v-model:selected="watchSeleccionado"
        mandatory
      >
        <VListItem
          v-for="planta in plantas"
          :key="planta.nombre"
          :value="planta"
          color="primary"
          class="text-capitalize px-4"
          :class="{ 'secondary': planta.id === seleccionado?.id }"
          @click="selectPlanta(planta)"
        >
          <VListItemTitle class="text-capitalize">
            {{ planta.nombre }}
          </VListItemTitle>
        </VListItem>
      </VList>
    </VMenu>
  </IconBtn>
</template>
