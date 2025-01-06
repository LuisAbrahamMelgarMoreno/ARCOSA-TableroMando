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
    default:false
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
const permisos = ref([]);
const all = ref()
const permisosSeleccionados = ref([])

//VALIDACIONES
const nombreValidacion = value => {
  if (value && value.length >= 5) {
    return true
  } else {
    return 'Debe de tener mínimo 5 caracteres el nombre'
  }
}

const descripcionValidacion = value => {
  if (value && value.length >= 5) {
    return true
  } else {
    return 'Debe de tener mínimo 10 caracteres la descripcion'
  }
}

const seleccionTodos = () => {
  let seleccionados = []
  permisosSeleccionados.value = []
  if (all.value === 'all') {
    for(let i= 0;i<permisos.value.length;i++){
      for (let j=0;j<permisos.value[i].actions.length;j++){
        // console.log(permisos.value[i].actions[j])
        seleccionados.push(permisos.value[i].actions[j].id)
      }
    }
    permisosSeleccionados.value = seleccionados
  }
}


const validateAndSubmit = () => {
  form?.value?.validate().then((success) => {
    if (success.valid) {
      formData.value.permisos = permisosSeleccionados.value
      emit('onSubmit', formData.value)
    }
  });
};

const validateAndSubmitEdit = () => {
  form?.value?.validate().then((success) => {
    if (success.valid) {
      formData.value.permisos = permisosSeleccionados.value
      emit('onEdit', formData.value)
    }
  });
}

onMounted( () => {

  if (props.datos) {
    formData.value = { ...props.datos };
    formData.value.activo = !!props.datos.activo;
    formData.value.permisos.forEach(p=>{
      permisosSeleccionados.value.push(p.id)
    })
  }
  permisos.value = props.data.permisos;
});

</script>

<template>
  <Loader :show="loading" />
  <VForm ref="form" lazy-validation>
    <VRow>
      <VCol cols="12">
        <VTextField
          v-model="formData.nombre"
          :rules="[nombreValidacion]"
          label="Nombre"
          placeholder="Rol"
          required
        />
      </VCol>
      <VCol cols="12">
        <VTextarea
          v-model="formData.descripcion"
          label="Descripcion"
          :rules="[descripcionValidacion]"
          placeholder="Descripcion del rol"
          required
        />
      </VCol>
      <VCol
        v-if="permisos.length >0"
        cols="12"
      >
        <VRow>
          <VCol
            cols="3"
            class="d-flex justify-center demo-space-x"
          >
            <p>Accesos</p>
          </VCol>
          <VCol
            cols="9"
            class="d-flex justify-center demo-space-x"
          >
            <VCheckbox
              v-model="all"
              label="Todos"
              value="all"
              @change="seleccionTodos"
            />
          </VCol>
        </VRow>
        <VRow v-for="(permiso,indexPermiso) in permisos">
          <VCol
            cols="3"
            class="d-flex justify-center demo-space-x"
          >
            <p v-text="permiso.subject" />
          </VCol>
          <VCol
            cols="9"
            class="demo-space-x"
          >
            <VCheckbox
              v-for="(accion,indexAccion) in permiso.actions"
              v-model="permisosSeleccionados"
              :label="accion.action"
              :value="accion.id"
            />
          </VCol>
        </VRow>
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
