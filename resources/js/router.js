import vegpage from './components/VEG.vue';
import fruitpage from './components/fruit.vue';
import cart from './components/cart.vue';
import detail from './components/detail.vue';

export const routes = [
    { path: '/vue1', component:vegpage },
    { path: '/vue1/2', component:fruitpage },
    { path: '/vue1/3', component:cart },
    { path: '/vue1/4', component:detail },
   
];