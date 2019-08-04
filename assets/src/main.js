/* jshint esversion: 6 */
import Vue from 'vue'
import App from './App.vue'

window.addEventListener('load', function () {
  new Vue({ // eslint-disable-line no-new
    el: '#refunds-app',
    components: { App },
    render: (h) => h(App)
  })
})
