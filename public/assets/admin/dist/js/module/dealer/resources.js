	
	// ===WEBSITE URL
	var base_url = "http://localhost/sj/nilrust/";
	//var base_url = "http://nilrust.barrana.com.au/design/";
	// ===END
	
	$(document).ready(function () {
		function conformisvalid(){
			var txtTitle = $("#txtTitle").val();
			
			var vtitle = true;
			
			if(txtTitle != ''){
				$(".err_title").html('');
				vtitle = true;
			}else{
				$(".err_title").html('Required');
				vtitle = false;
			}
			//alert(ispasvalid);
			if(vtitle == true){
				return true;
			}else{
				return false;
			}
		}
		$("#btnSave").one("click", function () {
			var btn = this;
			var $form = $(btn).closest("form");
			$form.submit(function (e) {
				e.preventDefault();
				var isvalid = conformisvalid();
				if(isvalid == true){
					$('form').unbind('submit').submit();
				}
			});
		});
		// ===MODIFY
		function mod_conformisvalid(){
			var txtTitle = $("#txtTitle").val();
			
			var vtitle = true;
			
			if(txtTitle != ''){
				$(".err_title").html('');
				vtitle = true;
			}else{
				$(".err_title").html('Required');
				vtitle = false;
			}
			
			//alert(ispasvalid);
			if(vtitle == true){
				return true;
			}else{
				return false;
			}
		}
		// ===FUNCTION
		$("#btnupdate").one("click", function () {
			var btn = this;
			var $form = $(btn).closest("form");
			$form.submit(function (e) {
				e.preventDefault();
				var isvalid = mod_conformisvalid();
				if(isvalid == true){
					$('form').unbind('submit').submit();
				}
			});
		});
		
		
		
	});