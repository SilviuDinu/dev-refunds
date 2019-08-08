<template>
    <div id="wrapper">

        <button name="show" id="show" @click="showTable">{{this.title}}</button>
        <select id="product-list" name="product-list" style="width: auto" @change="filterListByProduct">
            <option selected>All products</option>
            <option v-for="item in prods">{{ item }}</option>
        </select>
        <select id="type_of_refund" name="type_of_refund" style="width: auto" @change="filterListByRenewal">
            <option selected>All refund types</option>
            <option v-for="op in options">{{ op }}</option>
        </select>

        <table id="table" style="border=2px; display:none">
            <tr>
                <th v-for="elem in fields">{{ elem }}</th>
            </tr>
            <!--            <tr v-show="(product === 'All products') && (refund === 'All refund types')" v-for="(data, index) in myJson">-->
            <!--                <td id="index" v-if="! (isNaN(index))">{{ ++index }}</td>-->
            <!--                <td v-if="! (isNaN(index))">{{ data.date }}</td>-->
            <!--                <td v-if="! (isNaN(index))">{{ data.product }}</td>-->
            <!--                <td v-if="! (isNaN(index))">{{ data.type_of_refund }}</td>-->
            <!--                <td v-if="! (isNaN(index))">{{ data.ticket }}</td>-->
            <!--                <td v-if="! (isNaN(index))">{{ data.reason }}</td>-->
            <!--                <td v-if="! (isNaN(index))">{{ data.feedback }}</td>-->
            <!--                <td v-if="! (isNaN(index))">{{ data.github }}</td>-->
            <!--            </tr>-->
            <!--            <tr v-show="(data.product === product) && (refund === 'All refund types')" v-for="(data, index) in myJson">-->
            <!--                <td id="index" v-if="! (isNaN(index))">{{ ++index }}</td>-->
            <!--                <td v-if="! (isNaN(index))">{{ data.date }}</td>-->
            <!--                <td v-if="! (isNaN(index))">{{ data.product }}</td>-->
            <!--                <td v-if="! (isNaN(index))">{{ data.type_of_refund }}</td>-->
            <!--                <td v-if="! (isNaN(index))">{{ data.ticket }}</td>-->
            <!--                <td v-if="! (isNaN(index))">{{ data.reason }}</td>-->
            <!--                <td v-if="! (isNaN(index))">{{ data.feedback }}</td>-->
            <!--                <td v-if="! (isNaN(index))">{{ data.github }}</td>-->
            <!--            </tr>-->
            <!--            <tr v-show="(data.type_of_refund === refund) && (product === 'All products')" v-for="(data, index) in myJson">-->
            <!--                <td id="index" v-if="! (isNaN(index))">{{ ++index }}</td>-->
            <!--                <td v-if="! (isNaN(index))">{{ data.date }}</td>-->
            <!--                <td v-if="! (isNaN(index))">{{ data.product }}</td>-->
            <!--                <td v-if="! (isNaN(index))">{{ data.type_of_refund }}</td>-->
            <!--                <td v-if="! (isNaN(index))">{{ data.ticket }}</td>-->
            <!--                <td v-if="! (isNaN(index))">{{ data.reason }}</td>-->
            <!--                <td v-if="! (isNaN(index))">{{ data.feedback }}</td>-->
            <!--                <td v-if="! (isNaN(index))">{{ data.github }}</td>-->
            <!--            </tr>-->
            <!--            <tr v-show="(data.type_of_refund === refund) && (data.product === product)" v-for="(data, index) in myJson">-->
            <!--                <td id="index" v-if="! (isNaN(index))">{{ ++index }}</td>-->
            <!--                <td v-if="! (isNaN(index))">{{ data.date }}</td>-->
            <!--                <td v-if="! (isNaN(index))">{{ data.product }}</td>-->
            <!--                <td v-if="! (isNaN(index))">{{ data.type_of_refund }}</td>-->
            <!--                <td v-if="! (isNaN(index))">{{ data.ticket }}</td>-->
            <!--                <td v-if="! (isNaN(index))">{{ data.reason }}</td>-->
            <!--                <td v-if="! (isNaN(index))">{{ data.feedback }}</td>-->
            <!--                <td v-if="! (isNaN(index))">{{ data.github }}</td>-->
            <!--            </tr>-->
        </table>
        <li>{{friends.code}}</li>
    </div>
</template>

<script>
    import {prods} from './../main.js'
    import {options} from './../main.js'
    import {fields} from './../main.js'

    export default {
        data() {
            return {
                fields: fields,
                prods: prods,
                options: options,
                product: 'All products',
                refund: 'All refund types',
                title: "Show results",
                friends: [],
            }
        },
        mounted() {
            fetch('http://localhost/wordpress/wp-json/refunds/v1/register_refunds')
                .then(response => response.json())
                .then((data) => {
                this.friends = data
            })
        },
        methods: {
            filterListByProduct: function () {
                this.product = event.target.value;
            },
            filterListByRenewal: function () {
                this.refund = event.target.value;
                console.log(this.product);
                console.log(this.refund);
            },
            showTable: function () {
                var table = document.querySelector('table#table')
                if (table.style.display === 'none') {
                    table.style.display = 'table'
                    this.title = 'Hide results'
                } else if (table.style.display === 'table') {
                    table.style.display = 'none'
                    this.title = 'Show results'
                }
            }
        },
    }
</script>

<style scoped>

</style>
