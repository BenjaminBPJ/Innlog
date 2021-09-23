import Vue from 'vue'
import App from './App.vue'
//import axios from 'axios'

Vue.config.productionTip = false

new Vue({
  render: h => h(App),
  /*mounted(){
    axios.get('./backend/modele/connect.php')
      .then((res) => res.data)
      .then((res) => console.log(res))
  }*/
}).$mount('#app')
