import { $api } from '@/utils/api.js'

export const getAll = async ()=>{
    try {
        return await $api.post('catalogoPlantas/obtenerCatalogoPlantas');
    } catch(error){
        throw error;
    }
}

export const create = async (data)=>{
    try{
        return await $api.post('catalogoPlantas/crearCatalogoPlanta',data);
    } catch(error){
        throw error;
    }
}

export const update = async (data)=>{
    try {
        return await $api.post('catalogoPlantas/editarCatalogoPlanta',data);
    } catch (error){
        throw error
    }
}
