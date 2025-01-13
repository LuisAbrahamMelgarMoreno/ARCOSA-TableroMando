export default [
  {
    title: 'Dashboards',
    icon: { icon: 'ri-home-smile-line' },
    children: [
      {
        title: 'Inicio',
        to: 'dashboards-crm',
        action: 'read',
        subject: 'Auth',
      },
    ],
  },
  {
    title: 'Administración',
    icon: { icon: 'ri-folders-line' },
    children: [
      {
        title: 'Usuarios',
        to: 'administracion-usuarios',
        action: 'leer',
        subject: 'Usuario',
      },
      {
        title: 'Roles',
        to: 'administracion-roles',
        action: 'leer',
        subject: 'Rol',
      },
      {
        title: 'Permisos',
        to: 'administracion-permisos',
        action: 'leer',
        subject: 'Permiso',
      },
      {
        title: 'Catálogo Plantas',
        to: 'administracion-catalogoplantas',
        action: 'leer',
        subject: 'Catalogo Planta',
      },
      {
        title: 'Catálogo Proceso',
        to: 'administracion-catalogoprocesos',
        action: 'leer',
        subject: 'Catalogo Proceso',
      },
      {
        title: 'Catálogo Tendencia',
        to: 'administracion-catalogotendencias',
        action: 'leer',
        subject: 'Catalogo Proceso',
      },
      {
        title: 'Indicadores',
        to: 'administracion-indicadores',
        action: 'leer',
        subject: 'Indicador',
      },
    ],
  },
]
