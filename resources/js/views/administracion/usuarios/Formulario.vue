<!--<script setup>-->
<!--// eslint-disable-next-line import/extensions-->
<!--import { $api } from "@/utils/api.js"-->
<!--import Check from "@/components/Check.vue"-->
<!--import Error from "@/components/Error.vue"-->

<!--const props = defineProps({-->
<!--  hijoFormulario: {-->
<!--    type: Function,-->
<!--    required: true,-->
<!--  },-->
<!--  datos: {-->
<!--    type: Object,-->
<!--    required: false,-->
<!--  },-->
<!--  listaRoles: {-->
<!--    type: Array,-->
<!--    required: true,-->
<!--  },-->
<!--  listaPlantas: {-->
<!--    type: Array,-->
<!--    required: true,-->
<!--  },-->
<!--})-->

<!--const dialogoCreacion = ref(false)-->
<!--const dialogoGuardado = ref(false)-->

<!--// Datos-->
<!--const nombre = ref('')-->
<!--const correo = ref('')-->
<!--const password = ref('')-->
<!--const passwordConfirmacion = ref('')-->
<!--const id_rol = ref()-->
<!--const activo = ref(true)-->
<!--const plantaSeleccionada = ref()-->
<!--const id_planta = ref()-->
<!--const multi_planta = ref(false)-->

<!--// Opciones-->
<!--// const listaPlantas = ref([])-->
<!--// const listaRoles = ref([])-->
<!--// const listaDepartamentos = ref([])-->
<!--const show1 = ref(false)-->
<!--const show2 = ref(false)-->
<!--const contraCambio = ref(false)-->
<!--const cargando = ref(false)-->
<!--const form = ref()-->
<!--const guardado = ref(true)-->
<!--const mensaje = ref('')-->



<!--const nombreValidacion = value => {-->
<!--  if (value && value.length >= 3) {-->
<!--    return true-->
<!--  } else {-->
<!--    return 'Debe de tener mínimo 3 caracteres el nombre'-->
<!--  }-->
<!--}-->

<!--const correoValidacion = value => {-->
<!--  const correoRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/-->
<!--  if (value && correoRegex.test(value)) {-->
<!--    return true-->
<!--  } else {-->
<!--    return 'Por favor, introduce una dirección de correo electrónico válida'-->
<!--  }-->
<!--}-->

<!--const passwordValidacion = value =>{-->
<!--  if (value && value.length >= 8) {-->
<!--    return true-->
<!--  } else {-->
<!--    return 'Debe de tener mínimo 8 caracteres en la contraseña'-->
<!--  }-->
<!--}-->

<!--const passwordConfirmacionValidacion =value =>{-->
<!--  if(value === password.value){-->
<!--    return true-->
<!--  }else{-->
<!--    return 'Las contraseñas deben de coincidir'-->
<!--  }-->
<!--}-->

<!--const validateAndSubmit = () => {-->
<!--  // Validar el formulario-->
<!--  form?.value?.validate().then(success => {-->
<!--    if (success.valid) {-->
<!--      // Si la validación es exitosa, ejecutar la función onSubmit-->
<!--      onSubmit()-->
<!--      cargando.value = true-->
<!--    }-->
<!--  })-->
<!--}-->

<!--const validateAndSubmitEdit =() =>{-->
<!--  form?.value?.validate().then(success => {-->
<!--    if (success.valid) {-->
<!--      // Si la validación es exitosa, ejecutar la función onSubmit-->
<!--      onEdit()-->
<!--      cargando.value = true-->
<!--    }-->
<!--  })-->
<!--}-->

<!--const cerrarDiaologos = () =>{-->
<!--  dialogoGuardado.value = false-->
<!--  dialogoCreacion.value = false-->
<!--  props.hijoFormulario()-->
<!--  if(!props.datos){-->
<!--    nombre.value = ''-->
<!--    correo.value = ''-->
<!--    password.value = ''-->
<!--    passwordConfirmacion.value = ''-->
<!--    activo.value = true-->
<!--    id_rol.value = null-->
<!--    plantaSeleccionada.value =[]-->
<!--    id_planta.value = null-->
<!--  }-->
<!--}-->

<!--// const removePlanta = (multi)=>{-->
<!--//   id_planta.value = null-->
<!--//   multi_planta.value = !multi-->
<!--//-->
<!--// }-->

<!--const onSubmit = () =>{-->
<!--  $api-->
<!--    .post('/usuarios/crearUsuario', {-->
<!--      nombre: nombre.value,-->
<!--      correo: correo.value,-->

<!--      id_planta: id_planta.value,-->

<!--      // departamento_id: departamento_id.value,-->
<!--      id_rol: id_rol.value,-->
<!--      password: password.value,-->

<!--      multi_planta: multi_planta.value,-->
<!--      plantaSeleccionada: plantaSeleccionada.value,-->
<!--    })-->
<!--    .then(response=>{-->
<!--      cargando.value = false-->
<!--      if(response.data){-->
<!--        mensaje.value = 'Usuario Creado Correctamente'-->
<!--        dialogoGuardado.value = true-->
<!--        guardado.value = true-->
<!--      }else{-->
<!--        console.log('error')-->
<!--        guardado.value = false-->
<!--        mensaje.value = 'Hubo una falla al realizar el guardado'-->
<!--      }-->
<!--    })-->
<!--    .catch(error=>{-->
<!--      console.log(error)-->
<!--      cargando.value = false-->
<!--      dialogoGuardado.value = true-->
<!--      guardado.value = false-->
<!--      if(error.response.data.message){-->
<!--        mensaje.value = 'Hubo una falla al realizar el guardado - '+error.response.data.message-->
<!--      }else{-->
<!--        mensaje.value = 'Hubo una falla al realizar el guardado - '+error-->
<!--      }-->
<!--    })-->
<!--}-->

<!--const onEdit = ()=>{-->
<!--  $api-->
<!--    .post('/usuarios/editarUsuario', {-->
<!--      nombre: nombre.value,-->
<!--      correo: correo.value,-->
<!--      id_planta: id_planta.value,-->
<!--      id_rol: id_rol.value,-->
<!--      cambioPassword: contraCambio.value,-->
<!--      password: password.value,-->
<!--      multi_planta: multi_planta.value,-->
<!--      plantaSeleccionada: plantaSeleccionada.value,-->
<!--      id: props.datos.id,-->
<!--      activo: activo.value,-->
<!--    })-->
<!--    .then(response=>{-->
<!--      cargando.value = false-->
<!--      if(response.data){-->
<!--        guardado.value = true-->
<!--        mensaje.value = 'Usuario Editado Correctamente'-->
<!--        dialogoGuardado.value = true-->
<!--      }else{-->
<!--        console.log('error')-->
<!--        guardado.value = false-->
<!--        mensaje.value = 'Hubo una falla al editar el Usuario'-->
<!--      }-->
<!--    })-->
<!--    .catch(error=>{-->
<!--      console.log(error)-->
<!--      cargando.value = false-->
<!--      dialogoGuardado.value = true-->
<!--      guardado.value = false-->
<!--      mensaje.value = 'Hubo una falla al editar el Usuario - '+error-->
<!--    })-->
<!--}-->

<!--onMounted(() => {-->
<!--  if(props.datos){-->
<!--    nombre.value = props.datos.nombre-->
<!--    correo.value = props.datos.correo-->

<!--    id_planta.value = props.datos.id_planta-->
<!--    id_rol.value = props.datos.id_rol-->
<!--    activo.value = props.datos.activo ? true:false-->

<!--    multi_planta.value = props.datos.multi_planta ? true:false;-->
<!--    if(props.datos.multi_planta){-->
<!--      id_planta.value = props.datos.plantas_ids-->
<!--      plantaSeleccionada.value = props.datos.id_planta-->
<!--    }-->
<!--  }-->
<!--})-->
<!--</script>-->

<!--<template>-->
<!--  <IconBtn-->
<!--    v-if="datos"-->
<!--    color="primary"-->
<!--    @click="dialogoCreacion = true"-->
<!--  >-->
<!--    <svg-->
<!--      xmlns="http://www.w3.org/2000/svg"-->
<!--      width="2em"-->
<!--      height="2em"-->
<!--      viewBox="0 0 24 24"-->
<!--    ><path-->
<!--      fill="currentColor"-->
<!--      d="M5 18.89h1.414l9.314-9.314l-1.414-1.414L5 17.476zm16 2H3v-4.243L16.435 3.212a1 1 0 0 1 1.414 0l2.829 2.829a1 1 0 0 1 0 1.414L9.243 18.89H21zM15.728 6.748l1.414 1.414l1.414-1.414l-1.414-1.414z"-->
<!--    /></svg>-->
<!--  </IconBtn>-->
<!--  <VBtn-->
<!--    v-else-->
<!--    @click="dialogoCreacion = true"-->
<!--  >-->
<!--    Crear Usuario-->
<!--  </VBtn>-->
<!--  &lt;!&ndash; Dialog &ndash;&gt;-->
<!--  <VDialog-->
<!--    v-model="dialogoCreacion"-->
<!--    class="v-dialog-sm"-->
<!--  >-->
<!--    <VCard :title="datos ?'Editar Usuario' :'Creacion Usuario'">-->
<!--      <DialogCloseBtn-->
<!--        variant="text"-->
<!--        size="small"-->
<!--        @click="dialogoCreacion = false"-->
<!--      />-->

<!--      <VCardText>-->
<!--        &lt;!&ndash;       FORMULARIO &ndash;&gt;-->
<!--        <VForm-->
<!--          ref="form"-->
<!--          lazy-validation-->
<!--        >-->
<!--          <VRow>-->
<!--            <VCol cols="12">-->
<!--              <VTextField-->
<!--                v-model="nombre"-->
<!--                :rules="[nombreValidacion]"-->
<!--                label="Nombre"-->
<!--                placeholder="Nombre"-->
<!--                required-->
<!--              />-->
<!--            </VCol>-->
<!--            <VCol cols="12">-->
<!--              <VTextField-->
<!--                v-model="correo"-->
<!--                :rules="[correoValidacion]"-->
<!--                label="Correo"-->
<!--                placeholder="Correo"-->
<!--                required-->
<!--              />-->
<!--            </VCol>-->
<!--            &lt;!&ndash;            listas &ndash;&gt;-->
<!--            <VCol cols="12">-->
<!--              <VAutocomplete-->
<!--                v-model="id_rol"-->
<!--                item-value="id"-->
<!--                item-title="nombre"-->
<!--                :items="listaRoles"-->
<!--                color="blue-grey-lighten-2"-->
<!--                placeholder="Selecciona Rol"-->
<!--                label="Rol"-->
<!--                :rules="[v => !!v || 'El rol es requerido']"-->
<!--              />-->
<!--            </VCol>-->
<!--            <VCol cols="12">-->
<!--              <VAutocomplete-->
<!--                v-model="id_planta"-->
<!--                :items="listaPlantas"-->
<!--                color="blue-grey-lighten-2"-->
<!--                item-title="nombre"-->
<!--                item-value="id"-->
<!--                placeholder="Seleccionar Planta"-->
<!--                :label="multi_planta? 'Plantas' : 'Planta'"-->
<!--                :chips="multi_planta"-->
<!--                :closable-chips="multi_planta"-->
<!--                :multiple="multi_planta"-->
<!--                :rules="[v => !!v || 'La planta es requerida']"-->
<!--              >-->
<!--                <template #append>-->
<!--                  <VSlideXReverseTransition mode="out-in">-->
<!--                    &lt;!&ndash;                    <v-icon &ndash;&gt;-->
<!--                    &lt;!&ndash;                      :key="`icon-${multi_planta}`" &ndash;&gt;-->
<!--                    &lt;!&ndash;                      :color="multi_planta ? 'success' : 'info'" &ndash;&gt;-->
<!--                    &lt;!&ndash;                      :icon="multi_planta ? 'ri-building-4-line' : 'ri-building-line'" &ndash;&gt;-->
<!--                    &lt;!&ndash;                      @click="() => { id_planta = null; plantaSeleccionada=null; multi_planta = !multi_planta }" &ndash;&gt;-->
<!--                    &lt;!&ndash;                    ></v-icon> &ndash;&gt;-->
<!--                    <VBtn-->
<!--                      :key="`icon-${multi_planta}`"-->
<!--                      :color="multi_planta ? 'secondary' : 'info'"-->
<!--                      :append-icon="multi_planta ? 'ri-building-4-line' : 'ri-building-line'"-->
<!--                      @click="() => { id_planta = null; plantaSeleccionada=null; multi_planta = !multi_planta }"-->
<!--                    >-->
<!--                      {{ multi_planta ? 'Planta': 'MultiPlanta' }}-->
<!--                    </VBtn>-->
<!--                  </VSlideXReverseTransition>-->
<!--                </template>-->
<!--              </VAutocomplete>-->
<!--            </VCol>-->
<!--            <VCol-->
<!--              v-if="multi_planta"-->
<!--              cols="12"-->
<!--            >-->
<!--              <VAutocomplete-->
<!--                v-model="plantaSeleccionada"-->
<!--                :items="listaPlantas"-->
<!--                color="blue-grey-lighten-2"-->
<!--                item-title="nombre"-->
<!--                item-value="id"-->
<!--                placeholder="Seleccionar Planta"-->
<!--                label="Planta a la que pertence"-->
<!--                :rules="[v => !!v || 'La planta es requerida']"-->
<!--              />-->
<!--            </VCol>-->
<!--            &lt;!&ndash; CONTRASEÑA &ndash;&gt;-->
<!--            <VCol-->
<!--              v-if="datos"-->
<!--              cols="12"-->
<!--            >-->
<!--              <VCheckbox-->
<!--                v-model="contraCambio"-->
<!--                label="Cambiar Contraseña"-->
<!--              />-->
<!--            </VCol>-->
<!--            <VCol-->
<!--              v-if="contraCambio || !datos"-->
<!--              cols="12"-->
<!--            >-->
<!--              <VTextField-->
<!--                v-model="password"-->
<!--                :append-inner-icon="show1 ? 'ri-eye-off-line' : 'ri-eye-line'"-->
<!--                :type="show1 ? 'text' : 'password'"-->
<!--                counter-->
<!--                placeholder="············"-->
<!--                hint="Minimo 8 caracteres"-->
<!--                :rules="[passwordValidacion]"-->
<!--                label="Contraseña"-->
<!--                required-->
<!--                @click:append-inner="show1 = !show1"-->
<!--              />-->
<!--            </VCol>-->
<!--            <VCol-->
<!--              v-if="contraCambio || !datos"-->
<!--              cols="12"-->
<!--            >-->
<!--              <VTextField-->
<!--                v-model="passwordConfirmacion"-->
<!--                :rules="[passwordConfirmacionValidacion]"-->
<!--                label="Confrma tu contraseña"-->
<!--                required-->
<!--                :append-inner-icon="show2 ? 'ri-eye-off-line' : 'ri-eye-line'"-->
<!--                :type="show2 ? 'text' : 'password'"-->
<!--                counter-->
<!--                placeholder="············"-->
<!--                @click:append-inner="show2 = !show2"-->
<!--              />-->
<!--            </VCol>-->
<!--            <VCol-->
<!--              v-if="datos"-->
<!--              cols="6"-->
<!--            >-->
<!--              <VCheckbox-->
<!--                v-model="activo"-->
<!--                label="Usuario Activo"-->
<!--                hide-details-->
<!--              />-->
<!--            </VCol>-->
<!--            <VCol-->
<!--              cols="12"-->
<!--              class="d-flex justify-end"-->
<!--            >-->
<!--              <VBtn-->
<!--                v-if="datos"-->
<!--                color="primary"-->
<!--                :loading="cargando"-->
<!--                @click="validateAndSubmitEdit"-->
<!--              >-->
<!--                Editar Usuario-->
<!--              </VBtn>-->
<!--              <VBtn-->
<!--                v-else-->
<!--                color="primary"-->
<!--                :loading="cargando"-->
<!--                @click="validateAndSubmit"-->
<!--              >-->
<!--                Crear Usuario-->
<!--              </VBtn>-->
<!--            </VCol>-->
<!--          </VRow>-->
<!--        </VForm>-->
<!--      </VCardText>-->
<!--    </VCard>-->
<!--  </VDialog>-->

<!--  &lt;!&ndash; Dialog 2 &ndash;&gt;-->
<!--  <VDialog-->
<!--    v-model="dialogoGuardado"-->
<!--    class="v-dialog-sm"-->
<!--  >-->
<!--    <VCard title="Mensaje">-->
<!--      <DialogCloseBtn-->
<!--        variant="text"-->
<!--        size="small"-->
<!--        @click="dialogoGuardado = false"-->
<!--      />-->

<!--      <VCardText>-->
<!--        <VRow>-->
<!--          <VCol>-->
<!--            <div v-if="guardado">-->
<!--              <Check />-->
<!--            </div>-->
<!--            <div v-else>-->
<!--              <Error />-->
<!--            </div>-->
<!--            <p-->
<!--              class="text-center"-->
<!--              v-text="mensaje"-->
<!--            />-->
<!--          </VCol>-->
<!--        </VRow>-->
<!--      </VCardText>-->
<!--      <VCardActions>-->
<!--        <VSpacer />-->
<!--        <VBtn @click="cerrarDiaologos">-->
<!--          Cerrar-->
<!--        </VBtn>-->
<!--      </VCardActions>-->
<!--    </VCard>-->
<!--  </VDialog>-->
<!--</template>-->

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
const contraCambio = ref(false)
const listaPlantas = ref([])
const listaRoles = ref([])
const listaDepartamentos = ref([])
const show1 = ref(false)
const show2 = ref(false)
const emit = defineEmits([
  'onSubmit',
  'onEdit',
  'onStatus',
])

const form = ref();
const loading = ref(false);
const formData = ref({});

//VALIDACIONES
const nombreValidacion = value => {
  if (value && value.length >= 3) {
    return true
  } else {
    return 'Debe de tener mínimo 3 caracteres el nombre'
  }
}

const correoValidacion = value => {
  const correoRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
  if (value && correoRegex.test(value)) {
    return true
  } else {
    return 'Por favor, introduce una dirección de correo electrónico válida'
  }
}

const passwordValidacion = value =>{
  if (value && value.length >= 8) {
    return true
  } else {
    return 'Debe de tener mínimo 8 caracteres en la contraseña'
  }
}

const passwordConfirmacionValidacion =value =>{
  if(value === formData.value.password){
    return true
  }else{
    return 'Las contraseñas deben de coincidir'
  }
}

const validateAndSubmit = () => {
  form?.value?.validate().then((success) => {
    if (success.valid) {
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
    formData.value.multi_planta = !!props.datos.multi_planta
    if(formData.value.multi_planta){
      formData.value.id_planta = props.datos.plantas_ids
      formData.value.plantaSeleccionada = props.datos.id_planta
    }
  }else{
    formData.value.multi_planta = false;
  }
  listaPlantas.value = props.data.plantas;
  listaRoles.value = props.data.roles;
  listaDepartamentos.value = props.data.departamentos;

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
          placeholder="Nombre"
          required
        />
      </VCol>
      <VCol cols="12">
        <VTextField
          v-model="formData.correo"
          :rules="[correoValidacion]"
          label="Correo"
          placeholder="Correo"
          required
        />
      </VCol>
      <!--            listas -->
      <VCol cols="12">
        <VAutocomplete
          v-model="formData.id_rol"
          item-value="id"
          item-title="nombre"
          :items="listaRoles"
          color="blue-grey-lighten-2"
          placeholder="Selecciona Rol"
          label="Rol"
          :rules="[v => !!v || 'El rol es requerido']"
        />
      </VCol>
      <VCol cols="12">
        <VAutocomplete
          v-model="formData.id_planta"
          :items="listaPlantas"
          color="blue-grey-lighten-2"
          item-title="nombre"
          item-value="id"
          placeholder="Seleccionar Planta"
          :label="formData.multi_planta? 'Plantas' : 'Planta'"
          :chips="formData.multi_planta"
          :closable-chips="formData.multi_planta"
          :multiple="formData.multi_planta"
          :rules="[v => !!v || 'La planta es requerida']"
        >
          <template #append>
            <VSlideXReverseTransition mode="out-in">
              <VBtn
                :key="`icon-${formData.multi_planta}`"
                :color="formData.multi_planta ? 'secondary' : 'info'"
                :append-icon="formData.multi_planta ? 'ri-building-4-line' : 'ri-building-line'"
                @click="() => { formData.id_planta = null; formData.plantaSeleccionada=null; formData.multi_planta = !formData.multi_planta }"
              >
                {{ formData.multi_planta ? 'Planta': 'MultiPlanta' }}
              </VBtn>
            </VSlideXReverseTransition>
          </template>
        </VAutocomplete>
      </VCol>
      <VCol
        v-if="formData.multi_planta"
        cols="12"
      >
        <VAutocomplete
          v-model="formData.plantaSeleccionada"
          :items="listaPlantas"
          color="blue-grey-lighten-2"
          item-title="nombre"
          item-value="id"
          placeholder="Seleccionar Planta"
          label="Planta a la que pertence"
          :rules="[v => !!v || 'La planta es requerida']"
        />
      </VCol>
      <!-- CONTRASEÑA -->
      <VCol
        v-if="datos"
        cols="12"
      >
        <VCheckbox
          v-model="contraCambio"
          label="Cambiar Contraseña"
        />
      </VCol>
      <VCol
        v-if="contraCambio || !datos"
        cols="12"
      >
        <VTextField
          v-model="formData.password"
          :append-inner-icon="show1 ? 'ri-eye-off-line' : 'ri-eye-line'"
          :type="show1 ? 'text' : 'password'"
          counter
          placeholder="············"
          hint="Minimo 8 caracteres"
          :rules="[passwordValidacion]"
          label="Contraseña"
          required
          @click:append-inner="show1 = !show1"
        />
      </VCol>
      <VCol
        v-if="contraCambio || !datos"
        cols="12"
      >
        <VTextField
          :rules="[passwordConfirmacionValidacion]"
          label="Confrma tu contraseña"
          required
          :append-inner-icon="show2 ? 'ri-eye-off-line' : 'ri-eye-line'"
          :type="show2 ? 'text' : 'password'"
          counter
          placeholder="············"
          @click:append-inner="show2 = !show2"
        />
      </VCol>
      <VCol
        v-if="datos"
        cols="6"
      >
        <VCheckbox
          v-model="formData.activo"
          label="Usuario Activo"
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
