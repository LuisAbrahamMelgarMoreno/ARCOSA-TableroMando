<!--<script setup>-->
<!--import axios from "axios"-->
<!--// eslint-disable-next-line import/extensions-->
<!--import { $api } from "@/utils/api.js"-->

<!--import Formulario from "@/views/administracion/roles/Formulario.vue";-->
<!--// import Eliminar from "@/views/administracion/roles/Eliminar.vue"-->
<!--definePage({-->
<!--  meta: {-->
<!--    action: 'Rol',-->
<!--    subject: 'leer',-->
<!--  },-->
<!--})-->
<!--const search = ref('')-->
<!--const listaRoles = ref([])-->
<!--const listaPermisos = ref([])-->
<!--// headers-->
<!--const headers = [-->
<!--  { title: 'Nombre', key: 'nombre' },-->
<!--  { title: 'Descripcion', key: 'descripcion' },-->
<!--  { title: 'Acciones', key: 'acciones' },-->
<!--]-->

<!--const obtencionRol = ()=>{-->
<!--  $api.post('/roles/obtenerRoles').then(res=>{-->
<!--    listaRoles.value = res.data.roles-->
<!--    listaPermisos.value = res.data.permisos-->
<!--  }).catch(error=>{-->
<!--    console.log(error)-->
<!--  })-->
<!--}-->

<!--onMounted(() => {-->
<!--  obtencionRol()-->
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
<!--            label="Búsqueda por Nombre / Descripción"-->
<!--            append-inner-icon="mdi-magnify"-->
<!--            single-line-->
<!--            hide-details-->
<!--            dense-->
<!--            outlined-->
<!--          />-->
<!--        </VCol>-->
<!--        <VCol-->
<!--          v-if="$can('crear', 'Rol')"-->
<!--          cols="3"-->
<!--        >-->
<!--          <Formulario :hijoFormulario="obtencionRol" :permisos="listaPermisos"></Formulario>-->
<!--        </VCol>-->
<!--      </VRow>-->
<!--    </VCardText>-->
<!--    &lt;!&ndash; 👉 Data Table  &ndash;&gt;-->
<!--    <VDataTable-->
<!--      :headers="headers"-->
<!--      :items="listaRoles"-->
<!--      :search="search"-->
<!--      :items-per-page="10"-->
<!--      loading-text="Cargando... Por favor espere"-->
<!--      :loading="listaRoles.length >0? false:true"-->
<!--    >-->
<!--      &lt;!&ndash; product &ndash;&gt;-->
<!--      <template #item.product.nombre="{ item }">-->
<!--        <div class="d-flex align-center">-->
<!--          <div class="d-flex flex-column ms-3">-->
<!--            <span class="d-block font-weight-medium text-truncate text-high-emphasis">{{ item.raw.nombre }}</span>-->
<!--          </div>-->
<!--        </div>-->
<!--      </template>-->
<!--      <template #item.acciones="{ item }">-->
<!--        <div class="d-flex align-center">-->
<!--          <Formulario v-if="$can('editar', 'Rol')" :datos="item" :hijoFormulario="obtencionRol" :permisos="listaPermisos"></Formulario>-->
<!--&lt;!&ndash;          <Eliminar v-if="$can('eliminar', 'Rol')" :datos="item" :hijo="obtencionRol"></Eliminar>&ndash;&gt;-->
<!--        </div>-->
<!--      </template>-->
<!--    </VDataTable>-->
<!--  </div>-->
<!--</template>-->
<script setup>
import { getAll, create, update, getData } from "@/api/administracion/RolAPI.js";
import Formulario from '@/views/administracion/roles/Formulario.vue';
import AdministracionTable from "@/views/administracion/AdministracionTable.vue";

definePage({
  meta: {
    action: 'Rol',
    subject: 'leer',
  },
})
// headers
const headers = [
  { title: 'Nombre', key: 'nombre' },
  { title: 'Descripcion', key: 'descripcion' },
  { title: 'Acciones', key: 'acciones' },
]



</script>

<template>
  <AdministracionTable :headers="headers" :getAll="getAll" :getData="getData" :create="create" :update="update"
                       subject="Rol" >
    <template #form="{ datos, data, onSubmit, onEdit }">
      <Formulario :datos="datos" :data="data" @onSubmit="onSubmit" @onEdit="onEdit" />
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

    <template #status="{ datos,data, onStatus }">
      <Formulario disabled :datos="datos" :data="data" @onStatus="onStatus" />
    </template>
  </AdministracionTable>
</template>


