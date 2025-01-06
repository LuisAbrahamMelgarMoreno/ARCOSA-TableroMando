<!--<script setup>-->
<!--// eslint-disable-next-line import/extensions-->
<!--import { $api } from "@/utils/api.js"-->

<!--import Formulario from "@/views/administracion/permisos/Formulario.vue";-->
<!--// import Eliminar from "@/views/administracion/Permisos/Eliminar.vue"-->
<!--definePage({-->
<!--  meta: {-->
<!--    action: 'Permiso',-->
<!--    subject: 'leer',-->
<!--  },-->
<!--})-->
<!--const search = ref('')-->
<!--const listaPermisos = ref([])-->
<!--// headers-->
<!--const headers = [-->
<!--  { title: 'Accion', key: 'action' },-->
<!--  { title: 'Sujeto / Modulo', key: 'subject' },-->
<!--  { title: 'Descripcion', key: 'description' },-->
<!--  { title: 'Activo', key: 'activo' },-->
<!--  { title: 'Acciones', key: 'acciones' },-->
<!--]-->

<!--const obtencionPermiso = ()=>{-->
<!--  $api.post('/permisos/obtenerPermisos').then(res=>{-->
<!--    listaPermisos.value = res.data-->
<!--  }).catch(error=>{-->
<!--    console.log(error)-->
<!--  })-->
<!--}-->

<!--onMounted(() => {-->
<!--  obtencionPermiso()-->
<!--})-->
<!--</script>-->

<!--<template>-->
<!--  <div>-->
<!--    <VCardText>-->
<!--      <VRow>-->
<!--        <VCol cols="9">-->
<!--          <VTextField-->
<!--            v-model="search"-->
<!--            density="compact"-->
<!--            label="Búsqueda por Accion / Sujeto/Modulo / Descripción"-->
<!--            append-inner-icon="mdi-magnify"-->
<!--            single-line-->
<!--            hide-details-->
<!--            dense-->
<!--            outlined-->
<!--          />-->
<!--        </VCol>-->
<!--        <VCol-->
<!--          v-if="$can('crear', 'Permiso')"-->
<!--          cols="3"-->
<!--        >-->
<!--          <Formulario :hijoFormulario="obtencionPermiso"></Formulario>-->
<!--        </VCol>-->
<!--      </VRow>-->
<!--    </VCardText>-->
<!--    &lt;!&ndash; 👉 Data Table  &ndash;&gt;-->
<!--    <VDataTable-->
<!--      :headers="headers"-->
<!--      :items="listaPermisos"-->
<!--      :search="search"-->
<!--      :items-per-page="10"-->
<!--      loading-text="Cargando... Por favor espere"-->
<!--      :loading="listaPermisos.length >0? false:true"-->
<!--    >-->
<!--      <template #item.activo="{ item }">-->
<!--        <div class="d-flex align-center">-->
<!--          <div class="d-flex flex-column ms-3">-->
<!--            <span class="d-block font-weight-medium text-truncate text-high-emphasis">{{ item.activo ? 'Si' : 'No'}}</span>-->
<!--          </div>-->
<!--        </div>-->
<!--      </template>-->
<!--      <template #item.acciones="{ item }">-->
<!--        <div class="d-flex align-center">-->
<!--          <Formulario v-if="$can('editar', 'Permiso')" :datos="item" :hijoFormulario="obtencionPermiso"></Formulario>-->
<!--          &lt;!&ndash;          <Eliminar v-if="$can('eliminar', 'Permiso')" :datos="item" :hijo="obtencionPermiso"></Eliminar>&ndash;&gt;-->
<!--        </div>-->
<!--      </template>-->
<!--    </VDataTable>-->
<!--  </div>-->
<!--</template>-->
<script setup>
import { getAll, create, update } from "@/api/administracion/PermisoAPI.js";
import Formulario from '@/views/administracion/permisos/Formulario.vue';
import AdministracionTable from "@/views/administracion/AdministracionTable.vue";

definePage({
  meta: {
    action: 'Permiso',
    subject: 'leer',
  },
})
// headers
const headers = [
  { title: 'Accion', key: 'action' },
  { title: 'Sujeto / Modulo', key: 'subject' },
  { title: 'Descripcion', key: 'description' },
  { title: 'Activo', key: 'activo' },
  { title: 'Acciones', key: 'acciones' },
]



</script>

<template>
  <AdministracionTable :headers="headers" :getAll="getAll" :create="create" :update="update"
                       subject="Permiso" >
    <template #form="{ datos, onSubmit, onEdit }">
      <Formulario :datos="datos" @onSubmit="onSubmit" @onEdit="onEdit" />
    </template>
    <!--    <template #expand-section="{ slotProps }">-->
    <!--      <tr class="v-data-table__tr">-->
    <!--        <td :colspan="headers.length">-->
    <!--          <p class="my-1">-->
    <!--            <strong>Planta:</strong> {{ slotProps.item.planta.nombre }}-->
    <!--          </p>-->
    <!--        </td>-->
    <!--      </tr>-->
    <!--    </template>-->

    <template #status="{ datos, onStatus }">
      <Formulario disabled :datos="datos"  @onStatus="onStatus" />
    </template>
  </AdministracionTable>
</template>
