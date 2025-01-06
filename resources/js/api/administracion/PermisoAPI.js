// eslint-disable-next-line import/extensions
import { $api } from "@/utils/api.js"

export const getAll = async () =>{
  try {
    return await $api.post('permisos/obtenerPermisos');
  } catch (error){
    throw error;
  }
}

export const create = async data => {
  try {
    return await $api.post('permisos/crearPermiso', data);
  } catch (error){
    throw error;
  }
}

export const update = async data =>{
  try{
    return await $api.post('permisos/editarPermiso', data);
  } catch (error){
    throw error;
  }
}
