	
	// ===WEBSITE URL
	//var base_url = "http://localhost/sj/nilrust/";
	var base_url = "http://nilrust.barrana.com.au/design/";
	// ===END
	
	$(document).ready(function () {
		function conformisvalid(){
			var txtCategory = $("#txtCategory").val();
			var txtType = $("#txtType").val();
			var txtTitle = $("#txtTitle").val();
			var txtItemcode = $("#txtItemcode").val();
			
			var vcat = true;
			var vtype = true;
			var vtitle = true;
			var vitemcode = true;
			
			if(txtCategory > 0){
				$(".err_cat").html('');
				vcat = true;
			}else{
				$(".err_cat").html('Required');
				vcat = false;
			}
			
			if(txtType > 0){
				$(".err_type").html('');
				vtype = true;
			}else{
				$(".err_type").html('Required');
				vtype = false;
			}
			if(txtTitle != ''){
				$(".err_title").html('');
				vtitle = true;
			}else{
				$(".err_title").html('Required');
				vtitle = false;
			}
			if(txtItemcode != ''){
				$(".err_itemcode").html('');
				vitemcode = true;
			}else{
				$(".err_itemcode").html('Required');
				vitemcode = false;
			}
			//alert(ispasvalid);
			if(vcat == true && vtype == true && vtitle == true && vitemcode == true){
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
					$('.form_product').unbind('submit').submit();
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