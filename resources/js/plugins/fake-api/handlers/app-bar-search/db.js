export const db = {
  searchItems: [
    {
      title: 'Dashboard',
      category: 'dashboards',
      children: [
        {
          url: { name: 'dashboards-analytics' },
          icon: 'ri-line-chart-line',
          title: 'Analytics Dashboard',
        },
        {
          url: { name: 'dashboards-crm' },
          icon: 'ri-computer-line',
          title: 'CRM Dashboard',
        },
        {
          url: { name: 'dashboards-ecommerce' },
          title: 'eCommerce Dashboard',
          icon: 'ri-shopping-cart-2-line',
        },
        {
          url: { name: 'dashboards-academy' },
          title: 'Academy Dashboard',
          icon: 'ri-book-open-line',
        },
        {
          url: { name: 'dashboards-logistics' },
          title: 'Logistics Dashboard',
          icon: 'ri-truck-line',
        },
      ],
    },

  ],
}
