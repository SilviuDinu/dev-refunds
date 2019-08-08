/* jshint esversion: 6 */
import Vue from 'vue'
import App from './App.vue'

export const prods = ['Neve PRO', 'Hestia PRO', 'ShopIsle PRO', 'Zelle PRO', 'Visualizer PRO', 'Feedzy RSS Feeds PRO', 'WP Product Review PRO', 'Revive Old Post', 'Essential Package', 'Business Package', 'Agency Package'];
export const options = ['30 days policy', 'Renewal', 'Others'];
export const fields = ['Nr.', 'Date', 'Product', 'Refund Type', 'Ticket', 'Reason', 'Feedback', 'GitHub'];

window.addEventListener('load', function () {
    new Vue({ // eslint-disable-line no-new
        el: '#data-table',
        components: {App},
        render: (h) => h(App)
    })
});



