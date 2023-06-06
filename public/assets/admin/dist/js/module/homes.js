	
	// ===WEBSITE URL
	var base_url = "http://localhost/sj/nilrust/";
	//var base_url = "http://nilrust.barrana.com.au/design/";
	//var base_url = "http://nilrust.net.au/design/";
	// ===END
	
	
	// ===THIS IS WISHLIST
	var message_6 	= 'Product has been added to your <a href="'+base_url+'wishlist">wish list</a>!';
	var message_7 	= 'Product has been removed from your <a href="'+base_url+'wishlist">wish list</a>!';	
	var message_8 	= 'To save your favorite product to your wish list, <br>please <a href="'+base_url+'login">login</a> or <a href="'+base_url+'/register">register</a>';
	
	
	
	
	$(document).ready(function () {
		
		// ON KEY UP SPECIAL CHARCTER / INTEGER REMOVE
		$( ".removespecl" ).keyup(function() {
			var regExpr = /[^a-zA-Z ]/g;
			var userText = $(this).val();
			
			$(this).val(userText.replace(regExpr, ""));
		});
		// ON KEY UP SPECIAL CHARCTER / CHARCTER REMOVE
		$( ".removechar" ).keyup(function() {
			var regExpr = /[^0-9 ]/g;
			var userText = $(this).val();
			
			$(this).val(userText.replace(regExpr, ""));
		});
		// INPUT FIELD KEY UP ON CONTACT PAGE ONLY TEXT
		$(".chekspvhar").keyup(function(){
			//this code executes when the keyup event occurs
			//var regExpr = /[^a-zA-Z0-9-. ]/g;
			//var regExpr = /[^a-zA-Z0-9 ]/g;
			var regExpr = /[^a-zA-Z ]/g;
			var userText = $(this).val();
			
			$(this).val(userText.replace(regExpr, ""));
		});
		// ===CHAT BOX Style
		$(".btnchatlink").click(function(){
			$(".btnchatlink").addClass("hidden");
			$(".chatwindow").addClass("showchat");
			$(".chatwindow").removeClass("hidden");
			// MESSAGE SCROLL TO DOWN
			$(".messages").scrollTop($(".messages").prop("scrollHeight"));
			//===SEND ALLOW TO READ ALL MESSAGE
			$.post(base_url+"dealer/updatechatclick", {}, function (r) {
				//alert(r);
			});
		});
		$(".hidechat").click(function(){
			$(".btnchatlink").removeClass("hidden");
			$(".btnchatlink").removeClass("showchat");
			$(".chatwindow").addClass("hidden");
		});
		// ===OPEN CHAT BOX ON TOP NOTIFICATION
		$("#showdelarnot").on("click", ".btnchatlink", function(){
			$(".btnchatlink").addClass("hidden");
			$(".chatwindow").addClass("showchat");
			$(".chatwindow").removeClass("hidden");
			// MESSAGE SCROLL TO DOWN
			$(".messages").scrollTop($(".messages").prop("scrollHeight"));
			//===SEND ALLOW TO READ ALL MESSAGE
			$.post(base_url+"dealer/updatechatclick", {}, function (r) {
				//alert(r);
			});
		});
		// ===END	
		$(".shownoti").on("click", function (){
			var notid = $(this).attr("data-id");
			$.post(base_url+"updatenotify", {notid: notid}, function (r) {
				//alert(r);
			});
		});
		$("#shownotify").on("click", ".shownoti", function () {
			var notid = $(this).attr("data-id");
			$.post(base_url+"updatenotify", {notid: notid}, function (r) {
				//alert(r);
			});
		});
		//===CHAT IS BLANK OR NOT
		$("#btnsend").one("click", function (w) {
			var btn = this;
			var $form = $(btn).closest("form");
			$form.submit(function (e) {
				e.preventDefault();
				var field = $("#txtMessage").val();
				if(field.trim() == ''){
					$("#txtMessage").val('');
				}else{
					var keyCode = w.keyCode || w.which;
					if (keyCode == 13) { 
						e.preventDefault();
						return false;
					}
					$('.form_chat').unbind('submit').submit();
				}
			});
		});
		//===CHAT IS BLANK OR NOT IN DEALER CHAT TO ADMIN
		$("#btnSendChat").one("click", function () {
			var btn = this;
			var $form = $(btn).closest("form");
			$form.submit(function (e) {
				e.preventDefault();
				var field = $("#txtchatMessage").val();
				if(field.trim() == ''){
					$("#txtchatMessage").val('');
				}else{
					$('.form_admin_chat').unbind('submit').submit();
				}
			});
		});
		
	});