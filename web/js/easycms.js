/**
* Javascript Jquery source code to manage 
* the CMS functionality on the client side
* Author: wildpenguin@gmail.com
*/
$(document).ready(function(){

	init();
	
	$('.top-menu-add-button').click(function(event){
		event.preventDefault();

  		 $( "#dialog" ).dialog("open");
  		 $.get("forms/topmenu", function(data){
  		 	$("#dialog").html(data);
  		 });
	});

	$('body').on('click', ':submit', function(event){
		event.preventDefault();
		$(event.target).parents('form').submit();
	});
});

function init() 
{
	$( "#dialog" ).dialog({ autoOpen: false });

}