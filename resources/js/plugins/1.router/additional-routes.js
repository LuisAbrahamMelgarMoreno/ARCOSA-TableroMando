
// 👉 Redirects
export const redirects = [
    // ℹ️ We are redirecting to different pages based on role.
    // NOTE: Role is just for UI purposes. ACL is based on abilities.
    {
        path: '/',
        name: 'index',
        redirect: to => {
            // TODO: Get type from backend
            const userData = localStorage.getItem('userData');
            // if (userRole === 'admin')
            return { name: 'dashboards-crm' }

            return { name: 'login', query: to.query }
        },
    }
]

