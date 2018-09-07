(function () {
	'use strict';

	ACMESTORE.admin.update = function () {
		// update product category
		$(".update-category").on('click', function (e){
			var token = $(this).data('token');
			var id = $(this).attr('id');

			alert(token + 'and id:' + id);
			e.preventDefault();
		})
	};
})();