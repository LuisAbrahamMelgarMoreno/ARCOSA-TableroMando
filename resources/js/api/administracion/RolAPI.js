import { $api } from "@/utils/api.js"

export const getAll = async () => {
  try{
    return await $api.post('roles/obtenerRoles')
  } catch(error){
    throw error
  }
}

export const getData = async () =>{
    try {
        return await $api.post('roles/obtenerDatos')
    } catch(error){
        throw error
    }
}

export const create = async data  => {
  try{
    return await $api.post('roles/crearRol', data)
  } catch (error){
    throw error
  }
}

export const update = async data =>{
  try{
    return await $api.post('roles/editarRol', data)
  } catch (error){
    throw error
  }
}
