var wish_list = new Array();
jQuery(function(){ 
	jQuery(".wishlist").on("click",function(){
		$data = "";
		$product_id = jQuery(this).attr("product_id");
		$product_name = jQuery(this).attr("product_name");
		$prduct_price = jQuery(this).attr("product_price");
		if(jQuery.inArray($product_id,wish_list)==-1){
			$product_str = "<tr class='wishlist-item' id='list_id_"+$product_id+"'><td class='w-pname'>"+$product_name+"</td><td class='w-price'>$ "+$prduct_price+"</td><td class='w-premove' wpid='"+$product_id+"'>x</td></tr>";
			jQuery("#wish_list_item").append($product_str);
			wish_list.push($product_id);
			
			$.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

			var formData = {
                'product_id': $product_id
            };

			$.ajax({
                type: "POST",
                url: '/wishlist',
                data: formData,
            	dataType: 'json',
                success: function(data) {
  
                	$("#ajaxResponse").empty().append('<div class="alert alert-success">'+data.success_message+'</div>').fadeIn(300).fadeOut(2800);
                	
                	return true;
                },
                fail: function (data) {
				  	alert('fail');
                }

			});
           // wish_list.push($product_id);
			// show_message("Product added");
		}
		
		count_items_in_wishlist_update();
	});
	jQuery(".wish_list_heading").on("click",function(){
		if(!jQuery(this).hasClass("up")){
			jQuery("#wish_list").css("height","300px");
			jQuery(this).addClass("up");
			jQuery("#wish_list").css("overflow","auto");
			}else{
			jQuery("#wish_list").css("height","30px");
			jQuery(this).removeClass("up");
			jQuery("#wish_list").css("overflow","hidden");
		}
	    
	});
	jQuery("#wish_list_item").on("click",".w-premove",function(){
		$product_id = jQuery(this).attr("wpid");
		jQuery("#list_id_"+$product_id).remove();
		wish_list = jQuery.grep( wish_list, function( n, i ) {
			return n != $product_id;
		});
		show_message("Product removed");
		count_items_in_wishlist_update();
	});
});
function show_message($msg){
	jQuery("#msg").html($msg);
	$top = Math.max(0, ((jQuery(window).height() - jQuery("#msg").outerHeight()) / 2) + jQuery(window).scrollTop()) + "px";
    $left = Math.max(0,((jQuery(window).width() - jQuery("#msg").outerWidth()) / 2) + jQuery(window).scrollLeft()) + "px";
	jQuery("#msg").css("left",$left);
	jQuery("#msg").animate({opacity: 2.6,top: $top}, 2000,function(){
		jQuery(this).css({'opacity':1});
	}).show();
	setTimeout(function(){jQuery("#msg").animate({opacity: 2.6,top: "0px"}, 2000,function(){
		jQuery(this).hide();
	});},1000);
}
function count_items_in_wishlist_update(){
	// jQuery("#listitem").html(wish_list.length);
	if(wish_list.length>1){
		jQuery("#p_label").html("Wishlists" + " (" + wish_list.length + ")");
		}else{
		jQuery("#p_label").html("Wishlist" + " (" + wish_list.length + ")");
	}  
}