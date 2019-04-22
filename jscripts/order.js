$(document).ready(function() {

    $('#date').focus(function (){
        $('#date').removeClass('required');
    })

    

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

function placeOrder(data) {

    //console.log(data);
    var booking_date = $('#date').val();
console.log(booking_date)
    if (booking_date == "0000-00-00" || booking_date == 'undefined' || booking_date == '') {
        $('#date').addClass('required');
        return;
    }
    var res = data.split("-");
    //console.log(res);
    var servings = [];
    res.forEach(function (element) {
        //console.log(element);
        var select_element = document.getElementById("course_" + element).value;
        servings.push(element + '-' +select_element);
    });
   // console.log(servings);


    $.ajax({
        type: "POST",
        url: "order_submited.php",
        data: { action: 'ORDER', servings: servings, booking_date: booking_date },
        success: function (msg) {
            console.log('RESPONSe: '+ msg)
            //orders = msg;
            if (msg ==0 || msg==1) {
                window.location = 'success.php'
                var title = 'Success'
                var message = 'Your order submited successfully.'
                $('#success-title').empty();
                $('#success-title').append(title);
                $('#success-message').empty();
                $('#success-message').append(message);

                
            } else {
                var title = 'Whoops...!'
                var message = 'Error occured while submiting you order.Please try later...'
                $('#error-title').empty();
                $('#errot-title').append(title);
                $('#error-message').empty();
                $('#error-message').append(message);
               window.location = 'error.php'
            }
        }
    })

    window.location.reload();
//select_.options[select_id.selectedIndex].value;
   // window.location = url
}

function removeItem(id){
    
    $.ajax({
        type: "POST",
        url: "order_submited.php",
        data: {
            action: 'REMOVE_ITEM',
            id: id
        },
        success: function (msg) {
            console.log('MSG: ' + msg);
            orders=msg
            order = '<p class="sidebar-title">Order Basket  <span class="order-count">' + orders + '</span></p><ul> <li><a href="basket.php">View Basket </a></li>' +
                '</ul>'
            $('#orders').empty();
            $('#orders').append(order);
            $('#orders').show();
            $('#indx_' + id).hide();
            
        }
    })
}

/*
function finishAjax(id, response) {
    $('#loader').remove();

    $('#' + id).append(unescape(response));
}
*/