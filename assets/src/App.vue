<script>
    import Vue from 'vue'
    // import {fields} from './main.js'
    // import {prods} from './main.js'
    // import {options} from './main.js'
    import {Tabs, Tab} from 'vue-tabs-component';
    import new_report from './components/new_report.vue'
    import records from './components/records.vue'

    Vue.component('tabs', Tabs);
    Vue.component('tab', Tab);

    export default {
        data() {
            return {}
        },
        name: 'App.vue',
        methods:{

        },
        components: {
            Tabs,
            new_report,
            records
        }
    }
</script>

<template>
    <div>
        <tabs>
            <tab name="Report a new refund">
                <new_report></new_report>
            </tab>
            <tab name="View refund records">
                <records></records>
            </tab>
        </tabs>
    </div>

</template>

<style>


</style>
