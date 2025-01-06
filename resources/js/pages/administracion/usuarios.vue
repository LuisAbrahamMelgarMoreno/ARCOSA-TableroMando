<!--<script setup>-->
<!--// eslint-disable-next-line import/extensions-->
<!--import { $api } from "@/utils/api.js"-->

<!--import Formulario from "@/views/administracion/usuarios/Formulario.vue"-->
<!--// import Eliminar from "@/views/administracion/usuarios/Eliminar.vue";-->
<!--definePage({-->
<!--  meta: {-->
<!--    action: 'leer',-->
<!--    subject: 'Usuario',-->
<!--  },-->
<!--})-->
<!--const search = ref('')-->
<!--const listaUsuarios = ref([])-->
<!--const listaRoles = ref([])-->
<!--const listaPlantas = ref([])-->

<!--// headers-->
<!--const headers = [-->
<!--  { title: 'Nombre', key: 'nombre' },-->
<!--  { title: 'Correo', key: 'correo' },-->
<!--  { title: 'Rol', key: 'rol_nombre' },-->
<!--  { title: 'Planta', key: 'planta_nombre'},-->
<!--  { title: 'Multiplanta', key: 'multi_planta'},-->
<!--  { title: 'Activo', key: 'activo' },-->
<!--  { title: 'Acciones', key: 'acciones' },-->
<!--]-->

<!--const obtencionUsuario = ()=>{-->
<!--  $api.post('/usuarios/obtenerUsuarios').then(res=>{-->
<!--    listaUsuarios.value = res.data.usuarios-->
<!--    listaRoles.value =res.data.roles-->
<!--    listaPlantas.value = res.data.plantas-->
<!--  }).catch(error=>{-->
<!--    console.log(error)-->
<!--  })-->
<!--}-->

<!--onMounted(() => {-->
<!--  obtencionUsuario()-->
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
<!--            label="Búsqueda por Nombre / Correo / Departamento / Rol"-->
<!--            append-inner-icon="mdi-magnify"-->
<!--            single-line-->
<!--            hide-details-->
<!--            dense-->
<!--            outlined-->
<!--          />-->
<!--        </VCol>-->
<!--        <VCol-->
<!--          v-if="$can('crear', 'Usuario')"-->
<!--          cols="3"-->
<!--        >-->
<!--          <Formulario :hijoFormulario="obtencionUsuario" :listaRoles="listaRoles" :listaPlantas="listaPlantas"></Formulario>-->
<!--        </VCol>-->
<!--      </VRow>-->
<!--    </VCardText>-->
<!--    &lt;!&ndash; 👉 Data Table  &ndash;&gt;-->
<!--    <VDataTable-->
<!--      :headers="headers"-->
<!--      :items="listaUsuarios"-->
<!--      :search="search"-->
<!--      :items-per-page="10"-->
<!--      loading-text="Cargando... Por favor espere"-->
<!--      :loading="listaUsuarios.length >0? false:true"-->
<!--    >-->
<!--      &lt;!&ndash; product &ndash;&gt;-->
<!--      <template #item.nombre="{ item }">-->
<!--        <div class="d-flex align-center">-->
<!--          <div class="d-flex flex-column ms-3">-->
<!--            <span class="d-block font-weight-medium text-truncate text-high-emphasis">{{ item.nombre }}</span>-->
<!--          </div>-->
<!--        </div>-->
<!--      </template>-->
<!--      <template #item.multi_planta="{ item }">-->
<!--        <div class="d-flex align-center">-->
<!--          <div class="d-flex flex-column ms-3">-->
<!--            <span class="d-block font-weight-medium text-truncate text-high-emphasis">{{ item.multi_planta ? 'Si' : 'No'}}</span>-->
<!--          </div>-->
<!--        </div>-->
<!--      </template>-->
<!--      <template #item.activo="{ item }">-->
<!--        <div class="d-flex align-center">-->
<!--          <div class="d-flex flex-column ms-3">-->
<!--            <span class="d-block font-weight-medium text-truncate text-high-emphasis">{{ item.activo ? 'Si' : 'No'}}</span>-->
<!--          </div>-->
<!--        </div>-->
<!--      </template>-->
<!--      <template #item.acciones="{ item }">-->
<!--        <div class="d-flex align-center">-->
<!--          <Formulario v-if="$can('editar', 'Usuario')" :datos="item" :hijoFormulario="obtencionUsuario" :listaPlantas="listaPlantas" :listaRoles="listaRoles"></Formulario>-->
<!--&lt;!&ndash;          <Eliminar v-if="$can('eliminar', 'Usuario')" :datos="item" :hijo="obtencionUsuario"></Eliminar>&ndash;&gt;-->
<!--        </div>-->
<!--      </template>-->
<!--    </VDataTable>-->
<!--  </div>-->
<!--</template>-->
<script setup>
import { getAll, create, update, getData } from "@/api/administracion/UsuarioAPI.js";
import Formulario from '@/views/administracion/usuarios/Formulario.vue';
import AdministracionTable from "@/views/administracion/AdministracionTable.vue";

definePage({
  meta: {
    action: 'leer',
    subject: 'Usuario',
  },
});

// headers
const headers = [
  { title: 'Nombre', key: 'nombre' },
  { title: 'Correo', key: 'correo' },
  { title: 'Rol', key: 'rol_nombre' },
  { title: 'Planta', key: 'planta_nombre'},
  { title: 'Multiplanta', key: 'multi_planta'},
  { title: 'Activo', key: 'activo' },
  { title: 'Acciones', key: 'acciones' },
]

</script>

<template>
  <AdministracionTable :headers="headers" :getAll="getAll" :getData="getData" :create="create" :update="update"
                       subject="Usuario" >
    <template #form="{ datos, data, onSubmit, onEdit }">
      <Formulario :datos="datos" :data="data" @onSubmit="onSubmit" @onEdit="onEdit" />
    </template>
        <template #expand-section="{ slotProps }">
          <tr class="v-data-table__tr">
            <td :colspan="headers.length">
              <p class="my-1">
                <strong>Planta:</strong> {{ slotProps.item.planta.nombre }}
              </p>
            </td>
          </tr>
          <!--        <div class="d-flex align-center">-->
          <!--          <div class="d-flex flex-column ms-3">-->
          <!--            <span class="d-block font-weight-medium text-truncate text-high-emphasis">{{ item.multi_planta ? 'Si' : 'No'}}</span>-->
          <!--          </div>-->
          <!--        </div>-->
        </template>

    <template #status="{ datos,data, onStatus }">
      <Formulario disabled :datos="datos" :data="data" @onStatus="onStatus" />
    </template>
  </AdministracionTable>
</template>

