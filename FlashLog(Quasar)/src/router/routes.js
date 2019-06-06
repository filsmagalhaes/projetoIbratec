const routes = 
[
    {
        path: '/clientes',
        component: () =>
            import ('layouts/MyLayout.vue'),
        children: [{
            path: '',
            component: () =>
                import ('pages/clientes/Index.vue')
        }]
    },
    {
        path: '/clientes/criar/',
        component: () =>
            import ('layouts/MyLayout.vue'),
        children: [{
            path: '',
            component: () =>
                import ('pages/clientes/Criar.vue')
        }]
    },
    {
        path: '/clientes/:idCliente/',
        component: () =>
            import ('layouts/MeuLayoutEditarCliente.vue'),
        children: [{
            path: '',
            component: () =>
                import ('pages/clientes/Editar.vue')
        }]
    },
    {
        path: '/pedidos',
        component: () =>
            import ('layouts/MyLayout.vue'),
        children: [{
            path: '',
            component: () =>
                import ('pages/pedidos/index.vue')
        }]
    },
   
    {
        path: '/pedidos/Criar',
        component: () =>
            import ('layouts/MyLayout.vue'),
        children: [{
            path: '',
            component: () =>
                import ('pages/pedidos/Criar.vue')
        }]
    },
    {
        path: '/pedidos/:idPedido',
        component: () =>
            import ('layouts/MyLayout.vue'),
        children: [{
            path: '',
            component: () =>
                import ('pages/pedidos/Editar.vue')
        }]
    },
    {
        path: '/produtos',
        component: () =>
            import ('layouts/MyLayout.vue'),
        children: [{
            path: '',
            component: () =>
                import ('pages/produtos/index.vue')
        }]
    },
    {
        path: '/produtos/Criar',
        component: () =>
            import ('layouts/MyLayout.vue'),
        children: [{
            path: '',
            component: () =>
                import ('pages/produtos/Criar.vue')
        }]
    },
    {
        path: '/produtos/:idProduto',
        component: () =>
            import ('layouts/MyLayout.vue'),
        children: [{
            path: '',
            component: () =>
                import ('pages/produtos/Editar.vue')
        }]
    },
    {
        path: '/vendedor',
        component: () =>
            import ('layouts/MyLayout.vue'),
        children: [{
            path: '',
            component: () =>
                import ('pages/vendedor/index.vue')
        }]
    },
    {
        path: '/vendedor/Criar',
        component: () =>
            import ('layouts/MyLayout.vue'),
        children: [{
            path: '',
            component: () =>
                import ('pages/vendedor/Criar.vue')
        }]
    },
    {
        path: '/vendedor/:idVendedor',
        component: () =>
            import ('layouts/MyLayout.vue'),
        children: [{
            path: '',
            component: () =>
                import ('pages/vendedor/Editar.vue')
        }]
    },
    {
        path: '/',
        component: () =>
            import ('layouts/MyLayout.vue'),
        children: [{
            path: '',
            component: () =>
                import ('pages/Index.vue')
        }]
    }
]

// Always leave this as last one
if (process.env.MODE !== 'ssr') {
    routes.push({
        path: '*',
        component: () =>
            import ('pages/Error404.vue')
    })
}

export default routes