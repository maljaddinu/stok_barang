import './bootstrap'
import Vue from 'vue'
import App from './components/ExampleComponent.vue'
//import VueRouter from 'vue-router';

const vm = new Vue({
    el : '#app',
    render : h => h(App)
})