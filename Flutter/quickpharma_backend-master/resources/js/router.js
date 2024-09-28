import { createWebHistory, createRouter } from 'vue-router';
import Main from '@/Page/Main.vue'
import OrderDetail from '@/Page/OrderDetail.vue'
import OrderList from '@/Page/OrderList.vue'

const routes = [
    {
        path: '/routes',
        name: 'route-view',
        component: OrderList,
        children: [
          {
            path: '/routes/:uid',
            name: 'route-view-item',
            component: OrderDetail,
          },
        ],
      },
   
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;