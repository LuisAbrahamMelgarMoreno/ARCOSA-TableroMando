import { $api } from '@/utils/api.js'

export const getAll = async data =>{
  try{
    return await $api.post('catalogoTendencia/obtenerCatalogoTendencias', data)
  } catch(error){
    throw error
  }
}

export const create = async data =>{
  try{
    return await $api.post('catalogoTendencia/crearCatalogoTendencia', data)
  } catch(error){
    throw error
  }
}

export const update = async data =>{
  try{
    return await $api.post('catalogoTendencia/editarCatalogoTendencia', data)
  } catch(error){
    throw error
  }
}

export const destroy = async data =>{
  try{
    return await $api.post('catalogoTendencia/eliminarCatalogoTendencia', data)
  } catch(error){
    throw error
  }
}

