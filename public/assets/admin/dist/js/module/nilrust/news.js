	
	// ===WEBSITE URL
	//var base_url = "http://localhost/sj/nilrust/";
	var base_url = "http://nilrust.barrana.com.au/design/";
	// ===END
	
	$(document).ready(function () {
		
		function conformisvalid(){
			var txtTitle = $("#txtTitle").val();
			var txtHeadline = $("#txtHeadline").val();
			var txtFile = $("#txtFile").val();
			var imgsize = $("#txtchoseimg").val();
			
			var vtitle = true;
			var vheadline = true;
			var vimg = true;
			var vimgsize = true;
			
			if(txtTitle != ''){
				$(".err_title").html('');
				vtitle = true;
			}else{
				$(".err_title").html('Required');
				vtitle = false;
			}
			if(txtHeadline != ''){
				$(".err_headline").html('');
				vheadline = true;
			}else{
				$(".err_headline").html('Required');
				vheadline = false;
			}
			if(txtFile != ''){
				$(".err_banner").html('');
				vimg = true;
			}else{
				$(".err_banner").html('Required');
				vimg = false;
			}
			if(imgsize == 1){
				$(".err_banner").html('');
				vimgsize = true;
			}else{
				$(".err_banner").html('Image size must be 500 X 500');
				vimgsize = false;
			}
			
			//alert(ispasvalid);
			if(vtitle == true && vheadline == true && vimg == true && vimgsize == true){
				return true;
			}else{
				return false;
			}
		}
		
		$("#btnAdd").one("click", function () {
			var btn = this;
			var $form = $(btn).closest("form");
			$form.submit(function (e) {
				e.preventDefault();
				var isvalid = conformisvalid();
				if(isvalid == true){
					$('.form_news').unbind('submit').submit();
				}
			});
		});
		
		
		
		
		// ===MODIFY
		function mod_conformisvalid(){
			var txtTitle = $("#txtTitle").val();
			var txtHeadline = $("#txtHeadline").val();
			
			var vtitle = true;
			var vheadline = true;
			
			if(txtTitle != ''){
				$(".err_title").html('');
				vtitle = true;
			}else{
				$(".err_title").html('Required');
				vtitle = false;
			}
			if(txtHeadline != ''){
				$(".err_headline").html('');
				vheadline = true;
			}else{
				$(".err_headline").html('Required');
				vheadline = false;
			}
			
			//alert(ispasvalid);
			if(vtitle == true && vheadline == true ){
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
					$('.form_news').unbind('submit').submit();
				}
			});
		});
		
		
		
	});