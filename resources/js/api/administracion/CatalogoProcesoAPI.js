import { $api } from '@/utils/api.js'

export const getAll = async (data)=>{
  try {
    return await $api.post('catalogoProceso/obtenerCatalogoProcesos', data)
  } catch(error){
    throw error
  }
}

export const create = async(data) =>{
  try{
    return await $api.post('catalogoProceso/crearCatalogoProceso', data)
  } catch(error){
    throw error
  }
}

export const update = async(data) =>{
  try{
    return await $api.post('catalogoProceso/editarCatalogoProceso', data)
  } catch(error){
    throw error
  }
}

export const destroy = async(data) =>{
  try{
    return await $api.post('catalogoProceso/eliminarCatalogoProceso', data)
  } catch(error){
    throw error
  }
}
