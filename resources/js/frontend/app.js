import Vue from "vue";
import FrontEnd from "../components/FrontEnd.vue";
import VueRouter from 'vue-router'
import { routes } from "./routes"

Vue.use(VueRouter);

new Vue({
  el: "#app",
  render: h => h(FrontEnd),
  router: new VueRouter({
    routes,
    mode: "history"
  })
})