/**
* Javascript Jquery source code to manage 
* the CMS functionality on the client side
* Author: wildpenguin@gmail.com
*/
$(document).ready(function(){

	init();

});

function init() 
{	
	var modal = $('.mymodal');
	var modalBody = modal.find('.modal-body');

	$('.clickable').click(function(e){
		e.preventDefault();

		modal.modal('show');
		var requestUrl = e.currentTarget.href;
		modalBody.html('<i class="fas fa-spinner fa-spin"></i>');
		$.ajax({
			type:'GET',
			url: requestUrl,
			data:{},
		}).done(function(response){
			modalBody.html(response);
		}).always(function(){
			modalBody.find('.fa-spinner').hide();
		});
	});

	modal.find('.modal-footer .btn-primary').click(function(e){
		var form = modal.find('.modal-body form');
		form.submit();
	});
}