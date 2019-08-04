/* jshint esversion: 6 */
<template>
	<div>
		<h1>{{this.strings.title}}</h1>
		<p>{{this.strings.description}}</p>
		<a href="../../index.html">Homepage</a>
	</div>
</template>

<script>
  /* global REFUNDS */
  export default {
    data () {
      return {
        strings: REFUNDS.strings
      }
    },
    name: 'App.vue'
  }
</script>

<style scoped>

</style>
