<!--<script setup>-->
<!--import { VNodeRenderer } from '@layouts/components/VNodeRenderer'-->
<!--import { themeConfig } from '@themeConfig'-->
<!--import authV2RegisterIllustrationBorderedDark from '@images/pages/auth-v2-register-illustration-bordered-dark.png'-->
<!--import authV2RegisterIllustrationBorderedLight from '@images/pages/auth-v2-register-illustration-bordered-light.png'-->
<!--import authV2RegisterIllustrationDark from '@images/pages/auth-v2-register-illustration-dark.png'-->
<!--import authV2RegisterIllustrationLight from '@images/pages/auth-v2-register-illustration-light.png'-->
<!--import authV2RegisterMaskDark from '@images/pages/auth-v2-register-mask-dark.png'-->
<!--import authV2RegisterMaskLight from '@images/pages/auth-v2-register-mask-light.png'-->

<!--const authThemeMask = useGenerateImageVariant(authV2RegisterMaskLight, authV2RegisterMaskDark)-->
<!--const authThemeImg = useGenerateImageVariant(authV2RegisterIllustrationLight, authV2RegisterIllustrationDark, authV2RegisterIllustrationBorderedLight, authV2RegisterIllustrationBorderedDark, true)-->

<!--definePage({-->
<!--  meta: {-->
<!--    layout: 'blank',-->
<!--    unauthenticatedOnly: true,-->
<!--  },-->
<!--})-->

<!--const form = ref({-->
<!--  username: '',-->
<!--  email: '',-->
<!--  password: '',-->
<!--  privacyPolicies: false,-->
<!--})-->

<!--const isPasswordVisible = ref(false)-->
<!--</script>-->

<!--<template>-->
<!--  <RouterLink to="/">-->
<!--    <div class="app-logo auth-logo">-->
<!--      <img src="/images/logo-arcosa.png" alt="Arcosa">-->
<!--    </div>-->
<!--  </RouterLink>-->

<!--  <VRow-->
<!--    no-gutters-->
<!--    class="auth-wrapper"-->
<!--  >-->
<!--    <VCol-->
<!--      md="8"-->
<!--      class="d-none d-md-flex align-center justify-center position-relative"-->
<!--    >-->
<!--      &lt;!&ndash; here your illustrator &ndash;&gt;-->
<!--      <div class="d-flex align-center justify-center pa-10">-->
<!--        <img-->
<!--          :src="authThemeImg"-->
<!--          class="auth-illustration w-100"-->
<!--          alt="auth-illustration"-->
<!--        >-->
<!--      </div>-->
<!--      <VImg-->
<!--        :src="authThemeMask"-->
<!--        class="d-none d-md-flex auth-footer-mask"-->
<!--        alt="auth-mask"-->
<!--      />-->
<!--    </VCol>-->

<!--    <VCol-->
<!--      cols="12"-->
<!--      md="4"-->
<!--      class="auth-card-v2 d-flex align-center justify-center"-->
<!--      style="background-color: rgb(var(&#45;&#45;v-theme-surface));"-->
<!--    >-->
<!--      <VCard-->
<!--        flat-->
<!--        :max-width="500"-->
<!--        class="mt-12 mt-sm-0 pa-5 pa-lg-7"-->
<!--      >-->
<!--        <VCardText>-->
<!--          <h4 class="text-h4 mb-1">-->
<!--            Adventure starts here 🚀-->
<!--          </h4>-->
<!--          <p class="mb-0">-->
<!--            Make your app management easy and fun!-->
<!--          </p>-->
<!--        </VCardText>-->

<!--        <VCardText>-->
<!--          <VForm @submit.prevent="() => {}">-->
<!--            <VRow>-->
<!--              &lt;!&ndash; Username &ndash;&gt;-->
<!--              <VCol cols="12">-->
<!--                <VTextField-->
<!--                  v-model="form.username"-->
<!--                  autofocus-->
<!--                  label="Username"-->
<!--                  placeholder="Johndoe"-->
<!--                />-->
<!--              </VCol>-->

<!--              &lt;!&ndash; email &ndash;&gt;-->
<!--              <VCol cols="12">-->
<!--                <VTextField-->
<!--                  v-model="form.email"-->
<!--                  label="Email"-->
<!--                  type="email"-->
<!--                  placeholder="johndoe@email.com"-->
<!--                />-->
<!--              </VCol>-->

<!--              &lt;!&ndash; password &ndash;&gt;-->
<!--              <VCol cols="12">-->
<!--                <VTextField-->
<!--                  v-model="form.password"-->
<!--                  label="Password"-->
<!--                  placeholder="············"-->
<!--                  :type="isPasswordVisible ? 'text' : 'password'"-->
<!--                  :append-inner-icon="isPasswordVisible ? 'ri-eye-off-line' : 'ri-eye-line'"-->
<!--                  @click:append-inner="isPasswordVisible = !isPasswordVisible"-->
<!--                />-->

<!--                <div class="d-flex align-center my-6">-->
<!--                  <VCheckbox-->
<!--                    id="privacy-policy"-->
<!--                    v-model="form.privacyPolicies"-->
<!--                    inline-->
<!--                  />-->
<!--                  <VLabel-->
<!--                    for="privacy-policy"-->
<!--                    style="opacity: 1;"-->
<!--                  >-->
<!--                    <span class="me-1 text-high-emphasis">I agree to</span>-->
<!--                    <a-->
<!--                      href="javascript:void(0)"-->
<!--                      class="text-primary"-->
<!--                    >privacy policy & terms</a>-->
<!--                  </VLabel>-->
<!--                </div>-->

<!--                <VBtn-->
<!--                  block-->
<!--                  type="submit"-->
<!--                >-->
<!--                  Sign up-->
<!--                </VBtn>-->
<!--              </VCol>-->

<!--              &lt;!&ndash; create account &ndash;&gt;-->
<!--              <VCol cols="12">-->
<!--                <div class="text-center text-base">-->
<!--                  <span class="d-inline-block">Already have an account?</span> <RouterLink-->
<!--                    class="text-primary d-inline-block"-->
<!--                    :to="{ name: 'login' }"-->
<!--                  >-->
<!--                    Sign in instead-->
<!--                  </RouterLink>-->
<!--                </div>-->
<!--              </VCol>-->

<!--              <VCol cols="12">-->
<!--                <div class="d-flex align-center">-->
<!--                  <VDivider />-->
<!--                  <span class="mx-4 text-high-emphasis">or</span>-->
<!--                  <VDivider />-->
<!--                </div>-->
<!--              </VCol>-->

<!--              &lt;!&ndash; auth providers &ndash;&gt;-->
<!--              <VCol-->
<!--                cols="12"-->
<!--                class="text-center"-->
<!--              >-->
<!--              </VCol>-->
<!--            </VRow>-->
<!--          </VForm>-->
<!--        </VCardText>-->
<!--      </VCard>-->
<!--    </VCol>-->
<!--  </VRow>-->
<!--</template>-->

<!--<style lang="scss">-->
<!--@use "@core-scss/template/pages/page-auth.scss";-->
<!--</style>-->


<script setup>
import { VNodeRenderer } from '@layouts/components/VNodeRenderer'
import { themeConfig } from '@themeConfig'
import authV2RegisterIllustrationBorderedDark from '@images/pages/auth-v2-register-illustration-bordered-dark.png'
import authV2RegisterIllustrationBorderedLight from '@images/pages/auth-v2-register-illustration-bordered-light.png'
import authV2RegisterIllustrationDark from '@images/pages/auth-v2-register-illustration-dark.png'
import authV2RegisterIllustrationLight from '@images/pages/auth-v2-register-illustration-light.png'
import authV2RegisterMaskDark from '@images/pages/auth-v2-register-mask-dark.png'
import authV2RegisterMaskLight from '@images/pages/auth-v2-register-mask-light.png'
// eslint-disable-next-line import/extensions
import { $api } from "@/utils/api.js"

const authThemeMask = useGenerateImageVariant(authV2RegisterMaskLight, authV2RegisterMaskDark)
const authThemeImg = useGenerateImageVariant(authV2RegisterIllustrationLight, authV2RegisterIllustrationDark, authV2RegisterIllustrationBorderedLight, authV2RegisterIllustrationBorderedDark, true)

definePage({
  meta: {
    layout: 'blank',
    unauthenticatedOnly: true,
  },
})
const route = useRoute()
const router = useRouter()
const ability = useAbility()
// Datos
const nombre = ref('')
const correo = ref('')
const password = ref('')
const passwordConfirmacion = ref('')
// const departamento_id = ref()
// const planta_id = ref()
// const multi_planta = ref(false)
const plantaSeleccionada = ref()

// Opciones
// const listaPlantas = ref([])
// const listaDepartamentos = ref([])
const show1 = ref(false)
const show2 = ref(false)

const form = ref()
const guardado = ref(true)
const mensaje = ref('')

const nombreValidacion = value => {
  if (value && value.length >= 3) {
    return true
  } else {
    return 'Debe de tener mínimo 3 caracteres el nombre'
  }
}
const correoValidacion = value => {
  const correoRegex = /^[^\s@]+@(grupoarcosa\.com|frigorificosarcosa\.com)$/;
  if (value && correoRegex.test(value)) {
    return true;
  } else {
    return 'Por favor, introduce una dirección de correo electrónico válida con los dominios @grupoarcosa.com o @frigorificosarcosa.com';
  }
};

const passwordValidacion = value =>{
  if (value && value.length >= 8) {
    return true;
  } else {
    return 'Debe de tener mínimo 8 caracteres en la contraseña'
  }
}
const passwordConfirmacionValidacion =value =>{
  if(value === password.value){
    return true;
  }else{
    return 'Las contraseñas deben de coincidir'
  }
}
const validateAndSubmit = () => {
  // Validar el formulario
  form?.value?.validate().then(success => {
    if (success.valid) {
      // Si la validación es exitosa, ejecutar la función onSubmit
      onSubmit()
    }
  })
}

const onSubmit = () =>{
  $api
    .post('/auth/register', {
      nombre: nombre.value,
      correo: correo.value,
      // planta_id: planta_id.value,
      // departamento_id: departamento_id.value,
      password: password.value,
      c_password: passwordConfirmacion.value,
      // multi_planta: multi_planta.value,
      // plantaSeleccionada: plantaSeleccionada.value
      }).then(response=>{
      const { accessToken, userData, userAbilities } = response.data
      useCookie('userAbilityRules').value = userAbilities
      ability.update(userAbilities)
      useCookie('userData').value = userData
      useCookie('accessToken').value = accessToken
      nextTick(() => {
        router.replace(route.query.to ? String(route.query.to) : '/')
        // location.href('/')
        // console.log('Redirigido')
      })
  })
    .catch(error=>{
      console.log(error)
    })
}

onMounted(() => {
  $api.post('/auth/getData')
    .then(response=>{
      listaPlantas.value = response.data.plantas
      listaDepartamentos.value = response.data.departamentos
    }).catch(error=>{
      console.log(error)
    })
})
</script>

<template>
  <RouterLink to="/">
    <div class="app-logo auth-logo">
      <img src="/images/logo-arcosa.png" alt="Arcosa">
    </div>
  </RouterLink>

  <VRow
    no-gutters
    class="auth-wrapper"
  >
    <VCol
      md="4"
      class="d-none d-md-flex align-center justify-center position-relative"
    >
      <!-- here your illustrator -->
      <div class="d-flex align-center justify-center pa-10">
        <img
          :src="authThemeImg"
          class="auth-illustration w-100"
          alt="auth-illustration"
        >
      </div>
      <VImg
        :src="authThemeMask"
        class="d-none d-md-flex auth-footer-mask"
        alt="auth-mask"
      />
    </VCol>

    <VCol
      cols="12"
      md="8"
      class="auth-card-v2 d-flex align-center justify-center"
      style="background-color: rgb(var(--v-theme-surface));"
    >
      <VCard
        flat
        class="mt-12 mt-sm-0 pa-5 pa-lg-7"
      >
        <VCardText>
          <!--          class="text-h4 mb-1"-->
          <h4 class="text-h4 mb-1">
            Grupo Arcosa 🌎
          </h4>
          <p class="mb-0">
            Sistema HelpDesk
          </p>
          <h4 class="mb-0">
            Registra el formulario para crear tu cuenta
          </h4>
        </VCardText>

        <VCardText>
          <VForm
            ref="form"
            lazy-validation
          >
            <VRow>
              <VCol cols="12" md="4">
                <VTextField
                  v-model="nombre"
                  :rules="[nombreValidacion]"
                  label="Nombre"
                  placeholder="Nombre"
                  required
                />
              </VCol>
              <VCol cols="12" md="8">
                <VTextField
                  v-model="correo"
                  :rules="[correoValidacion]"
                  label="Correo Arcosa"
                  placeholder="Correo Arcosa"
                  required
                />
              </VCol>
              <!--            listas-->
<!--              <VCol cols="12">-->
<!--                <VAutocomplete-->
<!--                  item-value="id"-->
<!--                  item-title="nombre"-->
<!--                  v-model="departamento_id"-->
<!--                  :items="listaDepartamentos"-->
<!--                  color="blue-grey-lighten-2"-->
<!--                  placeholder="Selecciona Departamento"-->
<!--                  label="Departamento"-->
<!--                  :rules="[v => !!v || 'El departamento es requerido']"-->
<!--                />-->
<!--              </VCol>-->
<!--              <VCol cols="12">-->
<!--                <VAutocomplete-->
<!--                  v-model="planta_id"-->
<!--                  :items="listaPlantas"-->
<!--                  color="blue-grey-lighten-2"-->
<!--                  item-title="nombre"-->
<!--                  item-value="id"-->
<!--                  placeholder="Seleccionar Planta"-->
<!--                  :label="multi_planta? 'Plantas' : 'Planta'"-->
<!--                  :chips="multi_planta"-->
<!--                  :closable-chips="multi_planta"-->
<!--                  :multiple="multi_planta"-->
<!--                  :rules="[v => !!v || 'La planta es requerida']"-->
<!--                >-->
<!--                  <template v-slot:append>-->
<!--                    <v-slide-x-reverse-transition mode="out-in">-->
<!--                      <v-icon-->
<!--                        :key="`icon-${multi_planta}`"-->
<!--                        :color="multi_planta ? 'success' : 'info'"-->
<!--                        :icon="multi_planta ? 'ri-building-4-line' : 'ri-building-line'"-->
<!--                        @click="() => { planta_id = null; plantaSeleccionada=null; multi_planta = !multi_planta }"-->
<!--                      ></v-icon>-->
<!--                    </v-slide-x-reverse-transition>-->
<!--                  </template>-->
<!--                </VAutocomplete>-->
<!--              </VCol>-->
<!--              <VCol cols="12" v-if="multi_planta">-->
<!--                <VAutocomplete-->
<!--                  v-model="plantaSeleccionada"-->
<!--                  :items="listaPlantas"-->
<!--                  color="blue-grey-lighten-2"-->
<!--                  item-title="nombre"-->
<!--                  item-value="id"-->
<!--                  placeholder="Seleccionar Planta"-->
<!--                  label="Planta a la que pertence"-->
<!--                  :rules="[v => !!v || 'La planta es requerida']"-->
<!--                />-->
<!--              </VCol>-->
              <!--CONTRASEÑA-->

              <VCol cols="12" md="6">
                <VTextField
                  v-model="password"
                  :append-inner-icon="show1 ? 'ri-eye-off-line' : 'ri-eye-line'"
                  :type="show1 ? 'text' : 'password'"
                  counter
                  @click:append-inner="show1 = !show1"
                  placeholder="············"
                  hint="Minimo 8 caracteres"
                  :rules="[passwordValidacion]"
                  label="Contraseña"
                  required
                />
              </VCol>
              <VCol cols="12" md="6">
                <VTextField
                  v-model="passwordConfirmacion"
                  :rules="[passwordConfirmacionValidacion]"
                  label="Confrma tu contraseña"
                  required
                  :append-inner-icon="show2 ? 'ri-eye-off-line' : 'ri-eye-line'"
                  :type="show2 ? 'text' : 'password'"
                  counter
                  @click:append-inner="show2 = !show2"
                  placeholder="············"
                />
              </VCol>
              <VCol cols="12" />

              <VCol
                cols="12"
                class="d-flex justify-end"
              >
                <VBtn
                  color="primary"
                  @click="validateAndSubmit"
                >
                  Crear Cuenta
                </VBtn>
              </VCol>
            </VRow>
          </VForm>
        </VCardText>
      </VCard>
    </VCol>
  </VRow>
</template>

<style lang="scss">
@use "@core-scss/template/pages/page-auth.scss";
</style>
