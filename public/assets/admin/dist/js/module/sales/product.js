	
	// ===WEBSITE URL
	//var base_url = "http://localhost/sj/nilrust/";
	var base_url = "http://nilrust.barrana.com.au/design/";
	// ===END
	
	$(document).ready(function () {
		function conformisvalid(){
			var txtName = $("#txtName").val();
			var txtEmail = $("#txtEmail").val();
			var txtMobile = $("#txtMobile").val();
			
			var vname = true;
			var vemail = true;
			var vmobile = true;
			
			if(txtName.trim() != ''){
				$(".err_name").html('');
				vname = true;
			}else{
				$(".err_name").html('Required');
				vname = false;
			}
			if(txtEmail != ''){
				$(".err_email").html('');
				vemail = true;
			}else{
				$(".err_email").html('Required');
				vemail = false;
			}
			if(txtMobile != ''){
				$(".err_mobile").html('');
				vmobile = true;
			}else{
				$(".err_mobile").html('Required');
				vmobile = false;
			}
			
			//alert(ispasvalid);
			if(vname == true && vemail == true && vmobile == true){
				return true;
			}else{
				return false;
			}
		}
		$("#btnorder").one("click", function () {
			var btn = this;
			var $form = $(btn).closest("form");
			$form.submit(function (e) {
				e.preventDefault();
				var isvalid = conformisvalid();
				if(isvalid == true){
					$('.form_order').unbind('submit').submit();
				}
			});
		});
	});