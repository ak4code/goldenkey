import Vue from 'vue'
import './plugins/axios'
import UIkit from 'uikit'
import '@/assets/styles/styles.scss'
import Icons from 'uikit/dist/js/uikit-icons'

UIkit.use(Icons)
window.UIkit = UIkit

UIkit.use(Icons)
window.UIkit = UIkit

Vue.config.productionTip = false

new Vue({
  el: '#app',
  components: {}
})
