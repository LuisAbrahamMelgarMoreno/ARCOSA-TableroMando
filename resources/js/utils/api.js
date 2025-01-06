import { useAuthStore } from '@/stores/auth'
import axios from 'axios'

const authStore = useAuthStore()

// Crear una instancia de Axios con la configuración base
export const $api = axios.create({
  baseURL: import.meta.env.VITE_API_BASE_URL || '/api', // Configura la URL base desde las variables de entorno
  headers: {
    'Accept': 'application/json', // Añade la cabecera Accept para recibir respuestas JSON
  },
})

// Añadir un interceptor para añadir la cabecera Authorization en cada solicitud
$api.interceptors.request.use(config => {
  const accessToken = authStore.getAccessToken()
  if (accessToken) {
    config.headers.Authorization = `Bearer ${accessToken}` // Añade la cabecera Authorization
  }

  return config
}, error => {
  return Promise.reject(error)
})

// Añadir un interceptor de respuesta para manejar los errores 401
$api.interceptors.response.use(response => response, error => {
  if (error.response && error.response.status === 401) {
    // Manejar el error 401: Cerrar sesión y redirigir a la página de inicio de sesión
    authStore.accessToken = null

    const userData = authStore.getUserData() // Asumiendo que también guardas userData en una cookie
    if (userData) userData.value = null
    authStore.userAbilities = null

    const ability = { update: () => {} } // Asegúrate de importar y usar tu instancia de habilidad correcta

    ability.update([])
    console.log('by')

    const router = useRouter()

    router.push('/login')
  }
  
  return Promise.reject(error)
})

