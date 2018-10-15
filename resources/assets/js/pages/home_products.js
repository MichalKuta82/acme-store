(function () {
	'use strict';

	ACMESTORE.homeslider.homePageProducts = function () {
		var app = new Vue({
			el: '#root',
			data: {
				featured: [],
				products: [],
				count: 0,
				loading: false
			},
			methods: {
				getFeaturedProducts: function () {
					this.loading = true;
					axios.all(
						[
							axios.get('/featured'), 
							axios.get('/get-products')
						]
					).then(axios.spread(function (featuredResponse, productResponse){
						app.featured = featuredResponse.data.featured;
						app.products = productResponse.data.products;
						app.count = productResponse.data.count;
						app.loading = false;
					}));
				},
				stringLimit: function (string, value){
					ACMESTORE.module.truncateString(string, value);
				},
				addToCart: function (id) {
					ACMESTORE.module.addItemToCart(id, function(message){
						$(".notify").css("display", 'block').delay(4000).slideUp(300).html(message);
					});
				},
				loadMoreProducts: function(){
					var token = $('.display-products').data('token');
					this.loading = true;
					var data = $.param({next: 2, token: token, count: app.count});
					axios.post('/load-more', data).then(function (response){
						app.products = response.data.products;
						app.count = response.data.count;
						app.loading = false;
					});
				}
			},
			created: function () {
				this.getFeaturedProducts();
			},
			mounted: function() {
				$(window).scroll(function (){
					if ($(window).scrollTop() + $(window).height() == $(document).height()) {
						app.loadMoreProducts();
					}
				})
			}
		});
	}
})();