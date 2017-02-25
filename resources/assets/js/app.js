
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app',
    data: {
    	message: 'Listing Categories',
    	categories: false
    },
    methods: {
    	fetchCategories: function(){
    		this.$http.get('/admin/apicall/categories').then(function(response){
    			console.log(response.body.data);
    			this.categories = response.body.data;
    		}, function(response){

    		});
    	},
    	ready: function() {
    		this.fetchCategories();
    	}
    }
});


app.fetchCategories();


