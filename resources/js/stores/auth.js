import axios from "axios"
import { defineStore } from 'pinia'

export const useAuthStore = defineStore('auth', {
  state: () => ({
    accessToken: localStorage.getItem('accessToken') || null,
    userData: JSON.parse(localStorage.getItem('userData')) || null,
    userAbilities: JSON.parse(localStorage.getItem('userAbilities')) || [],
    plantas: JSON.parse(localStorage.getItem('plantas')) || [],
    plantaSeleccionada: JSON.parse(localStorage.getItem('plantaSeleccionada')) || null,

  }),
  actions: {
    async login(credentials) {
      try {
        const response = await axios.post('/api/auth/login', {
          correo: credentials.correo,
          password: credentials.password,
        })

        const { accessToken, userData, userAbilities, plantas, plantaSeleccionada } = response.data

        localStorage.setItem('accessToken', accessToken)
        localStorage.setItem('userData', JSON.stringify(userData))
        localStorage.setItem('userAbilities', JSON.stringify(userAbilities))
        //CAMBIO DE PLANTA
        localStorage.setItem('plantas', JSON.stringify(plantas))
        localStorage.setItem('plantaSeleccionada', JSON.stringify(plantaSeleccionada))

        this.accessToken = accessToken
        this.userData = userData
        this.userAbilities = userAbilities
        //CAMBIO PLANTA
        this.plantas = plantas
        this.plantaSeleccionada = plantaSeleccionada
        
        return userAbilities
      } catch (error) {
        console.error('Error en el login:', error)
        throw error
      }
    },
    getUserAbilities (){
      return this.userAbilities
    },
    getAccessToken (){
      return this.accessToken
    },
    getUserData (){
      return this.userData
    },
    logout() {
      this.accessToken = null
      this.userData = null
      this.userAbilities = []
      //CAMBIO DE PLANTA
      this.plantaSeleccionada = null
      this.plantas = []
      localStorage.removeItem('accessToken')
      localStorage.removeItem('userData')
      localStorage.removeItem('userAbilities')
      //CAMBIO DE PLANTA
      localStorage.removeItem('plantas')
      localStorage.removeItem('plantaSeleccionada')
    },
  },
})
