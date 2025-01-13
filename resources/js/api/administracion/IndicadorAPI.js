import { $api } from '@/utils/api.js'

export const getData = async data =>{
  try{
    return await $api.post('indicadores/obtenerDatos', data)
  } catch(error){
    throw error
  }
}

export const getAll = async data =>{
  try{
    return await $api.post('indicadores/obtenerIndicadores', data)
  } catch(error){
    throw error
  }
}

export const create = async data =>{
  try{
    return await $api.post('indicadores/crearIndicador', data)
  } catch(error){
    throw error
  }
}

export const update  = async data =>{
  try{
    return await $api.post('indicadores/editarIndicador', data)
  } catch(error){
    throw error
  }
}

export const destroy = async data =>{
  try{
    return await $api.post('indicadores/eliminarIndicador', data)
  } catch(error){
    throw error
  }
}
