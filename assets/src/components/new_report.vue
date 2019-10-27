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
            onSubmit: function () {
                var postData = {
                    "title": document.querySelector('#type_of_refund').value,
                    "content": document.querySelector('#product-list').value,
                    "status": "private"
                };
                var xhttp = new XMLHttpRequest();
                xhttp.open("POST", wpApiSettings.root + "/wp-json/wp/v2/posts");
                xhttp.setRequestHeader("X-WP-Nonce", wpApiSettings.nonce);
                console.log(wpApiSettings.nonce)
                xhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
                xhttp.send(JSON.stringify(postData));

                var title = document.querySelector("div.title-form");
                if (title.style.display === 'block') {
                    title.style.display = 'none';
                }
                var msg = document.querySelector(".alert-success");
                if (msg.style.display === 'none') {
                    msg.style.display = 'block';
                }
                document.addEventListener('click', function () {
                    if (msg.style.display === 'block') {
                        msg.style.display = 'none';
                    }
                    if (title.style.display === 'none') {
                        title.style.display = 'block';
                    }
                });
                // var date = new Date();
                // console.log(date);
                // while((Date.now() - date/1) > 0 && (Date.now() - date/1) < 6000 ){
                //     if (msg.style.display === 'block') {
                //         msg.style.display = 'none';
                //     }
                // }
            },

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
        <div id="wrapper" class="title-form" style="display: block">
            <p style="text-align: center">Please fill in the form below</p>
        </div>
        <div class="alert-success" style="display: none">
            <strong>Success!</strong> You have reported a new refund</a>.
        </div>
        <form id="refunds" v-on:submit.prevent="onSubmit"
              action="#" method="POST">
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
            <input v-on:submit="onSubmit" type="submit" name="submit" value="Submit">
        </form>
    </div>
</template>
