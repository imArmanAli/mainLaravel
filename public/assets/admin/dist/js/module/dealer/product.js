	
	// ===WEBSITE URL
	//var base_url = "http://localhost/sj/nilrust/";
	var base_url = "http://nilrust.barrana.com.au/design/";
	// ===END
	
	$(document).ready(function () {
		function conformisvalid(){
			var txtQty = $("#txtQty").val();
			
			var vqty = true;
			
			if(txtQty > 0){
				if(txtQty.length > 3){
					$(".err_qty").html('Limit Exceed');
					vqty = false;
				}else{
					$(".err_qty").html('');
					vqty = true;
				}
			}else{
				$(".err_qty").html('Required');
				vqty = false;
			}
			
			//alert(ispasvalid);
			if(vqty == true){
				return true;
			}else{
				return false;
			}
		}
		$("#btnProced").one("click", function () {
			var btn = this;
			var $form = $(btn).closest("form");
			$form.submit(function (e) {
				e.preventDefault();
				var isvalid = conformisvalid();
				if(isvalid == true){
					$('.form_cart').unbind('submit').submit();
				}
			});
		});
		
		// ===FUNCTION
		$("#btnUpdate").one("click", function () {
			var btn = this;
			var $form = $(btn).closest("form");
			$form.submit(function (e) {
				e.preventDefault();
				var isvalid = conformisvalid();
				if(isvalid == true){
					$('.form_product').unbind('submit').submit();
				}
			});
		});
		
		
		
	});