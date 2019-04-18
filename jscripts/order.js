$(document).ready(function() {


    /*
    $('.parent').livequery('change', function() {
    	
    	$(this).nextAll('.parent').remove();
    	$(this).nextAll('label').remove();
    	
    	$('#show_sub_categories').append('<img src="loader.gif" style="float:left; margin-top:7px;" id="loader" alt="" />');
    	
    	$.post("get_meal_course.php", {
    		parent_id: $(this).val(),
    	},function(response){
    	  setTimeout("finishAjax('show_sub_categories', '"+escape(response)+"')", 400);
    	});
    	
    	return false;
    });
    */
});
var orders = 0

function addToOrder(id) {

    $.ajax({
        type: "POST",
        url: "add_order.php",
        data: { action: 'ORDER', id: id },
        success: function(msg) {
            orders = msg;
            if (msg >= 1) {
                order = '<p class="sidebar-title">Order Basket  <span class="order-count">' + orders + '</span></p><ul> <li><a href="basket.php">View Basket </a></li>' +
                    '</ul>'
                $('#orders').empty();
                $('#orders').append(order);
                $('#orders').show();
            } else {
                window.location = msg
            }
        }
    })

}

function placeOrder(url) {
    window.location = url
}

/*
function finishAjax(id, response) {
    $('#loader').remove();

    $('#' + id).append(unescape(response));
}
*/