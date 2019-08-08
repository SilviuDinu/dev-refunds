<script>
    import {prods} from './../main.js';
    import {options} from './../main.js';

    export default {
        data() {
            return {
                //fields: fields,
                prods: prods,
                options: options,
                // myJson: data,
                // product: 'All products',
                // refund: 'All refund types',
                // git: ''
            }
        },
        methods: {
            // filterListByProduct: function () {
            //     this.product = event.target.value;
            // },
            // filterListByRenewal: function () {
            //     this.refund = event.target.value;
            //     console.log(this.product);
            //     console.log(this.refund);
            //     // var rows = document.querySelectorAll("table#table > tr");
            //     // var k=1;
            //     // for (var i = 0; i < rows.length; i = i+1){
            //     //     if(rows[i].style.display === 'none'){
            //     //         k=k+1;
            //     //     }
            //     // }
            //     // console.log(k);
            //     // console.log(rows.length);
            //     // if (k === rows.length){
            //     //     alert('No data retrieved for this query');
            //     // }
            // }
        },
        name: 'new_report'
    }
</script>

<template>
    <div class="container">
        <form id="refunds" action="http://localhost/wordpress/wp-json/refunds/v1/register_refunds" method="POST">
            <label for="date">Refund Date</label>
            <input type="date" id="date" name="date" required><br>
            <hr>
            <br>

            <label for="product-list">Product</label>
            <select id="product-list" name="products">
                <option disabled selected hidden>Choose a product</option>
                <option v-for="product in prods">{{ product }}</option>
            </select>

            <label for="type_of_refund">Refund Type</label>
            <select id="type_of_refund" name="type_of_refund">
                <option disabled selected hidden>Choose a refund type</option>
                <option v-for="item in options">{{ item }}</option>
            </select>

            <label for="ticket">Ticket link</label>
            <input type="text" required id="ticket" name="ticket" placeholder="Ticket link...">

            <label for="feedback">Refund Reason</label>
            <textarea id="refund-reason" required name="refund-reason" placeholder="Write something.."
                      style="height:100px"></textarea>

            <label for="feedback">Feedback</label>
            <textarea id="feedback" name="feedback" placeholder="Write something.." style="height:100px"></textarea>

            <label for="github">GitHub report</label>
            <input type="text" id="github" name="github" placeholder="GitHub report link...">
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
</template>
