$(document).ready(function() {

    //$('#loader').hide();


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

function addToOrder(id) {

    $.ajax({
        type: "POST",
        url: "add_order.php",
        data: { action: 'ORDER', id: id },
        success: function(msg) {
            if (msg > 0) {
                console.log(msg)
                order = 'Items in Basket <span class="order-count">' + msg + '</span><ul>	<li><a href="orderable.php">View Basket</a> </li> </ul></li>'
                $('#orders').empty();
                $('#orders').append(order);
            }
        }
    })

}

/*
function finishAjax(id, response) {
    $('#loader').remove();

    $('#' + id).append(unescape(response));
}
*/