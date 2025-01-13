<script setup>
import { getData, getAll, create, update } from "@/api/administracion/IndicadorAPI.js";
import Formulario from '@/views/administracion/indicador/Formulario.vue';
import AdministracionTable from "@/views/administracion/AdministracionTable.vue";

definePage({
  meta: {
    action: 'Indicador',
    subject: 'leer',
  },
})

const headers = [
  { title: 'Nombre', key: 'nombre' },
  { title: 'Descripcion', key: 'descripcion' },
  { title: 'Minimo', key: 'minimo' },
  { title: 'Aceptable', key: 'aceptable' },
  { title: 'Excelente', key: 'excelente' },
  { title: 'Catalogo Planta', key: 'planta.nombre' },
  { title: 'Catalogo Proceso', key: 'proceso.nombre' },
  { title: 'Catalogo Tendencia', key: 'tendencia.nombre' },
  { title: 'Activo', key: 'activo'},
  { title: 'Acciones', key: 'acciones' },
];


</script>

<template>
  <AdministracionTable :getData="getData" :headers="headers" :getAll="getAll" :create="create" :update="update"
                       subject="Indicador" >
    <template #form="{ datos, data, onSubmit, onEdit }">
      <Formulario :datos="datos" :data="data" @onSubmit="onSubmit" @onEdit="onEdit" />
    </template>
    <template #status="{ datos, data, onStatus }">
      <Formulario disabled :datos="datos" :data="data" @onStatus="onStatus" />
    </template>
  </AdministracionTable>
</template>
