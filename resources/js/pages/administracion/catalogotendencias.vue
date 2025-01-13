<script setup>
import { getAll, create, update } from "@/api/administracion/CatalogoTendenciaAPI.js";
import Formulario from '@/views/administracion/catalogo-tendencia/Formulario.vue';
import AdministracionTable from "@/views/administracion/AdministracionTable.vue";

definePage({
  meta: {
    action: 'Catalogo Tendencia',
    subject: 'leer',
  },
})

const headers = [
  { title: 'Nombre', key: 'nombre' },
  { title: 'Descripcion', key: 'descripcion' },
  { title: 'Activo', key: 'activo'},
  { title: 'Acciones', key: 'acciones' },
];


</script>

<template>
  <AdministracionTable :headers="headers" :getAll="getAll" :create="create" :update="update"
                       subject="Catalogo Tendencia" >
    <template #form="{ datos, onSubmit, onEdit }">
      <Formulario :datos="datos" @onSubmit="onSubmit" @onEdit="onEdit" />
    </template>
    <template #status="{ datos, onStatus }">
      <Formulario disabled :datos="datos" @onStatus="onStatus" />
    </template>
  </AdministracionTable>
</template>
