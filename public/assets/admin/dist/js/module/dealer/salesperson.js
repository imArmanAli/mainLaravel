	
	// ===WEBSITE URL
	var base_url = "http://localhost/sj/nilrust/";
	//var base_url = "http://nilrust.barrana.com.au/design/";
	// ===END
	
	$(document).ready(function () {
		// CHECK EMAIL VALID OR NOT
		function IsEmail(email) {
			var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			if(!regex.test(email)) {
				return false;
			}else{
				return true;
			}
		}
		// PASWORD VALIDATION
		function isPassvalid(pass){
			var error = '';
			var myInput = document.getElementById("txtPass");
			var lowerCaseLetters = /[a-z]/g;
			//alert();
			var valid = true;
			if(myInput.value.match(lowerCaseLetters)) { 
				$(".error_pass").html('');
				//NOW CHECK UPAR CASE
				// Validate capital letters
				var upperCaseLetters = /[A-Z]/g;
				if(myInput.value.match(upperCaseLetters)) {  
					$(".error_pass").html('');
					//NOW ADD ONE NUMBER
					// Validate numbers
					var numbers = /[0-9]/g;
					if(myInput.value.match(numbers)) {  
						$(".error_pass").html('');
						// MINIMUM 8 LENGTH
						// Validate length
						if(myInput.value.length >= 8) {
							$(".error_pass").html('');
							valid = true;
						}else {
							error = "min 8 length";
							$(".error_pass").html('minimum 8 length');
							valid = false;
						}
					} else {
						error = "Add one digit";
						$(".error_pass").html('Add one digit');
						valid = false;
					}
				}else {
					error = "Capital letter";
					$(".error_pass").html('Capital letter');
					valid = false;
				}
			}else {
				error = "lower case";
				$(".error_pass").html('lower case required');
				valid = false;
			}
			
			if(valid == true){
				return true;
			}else{
				return error;
			}
		}
		function conformisvalid(){
			var txtName = $("#txtName").val();
			var txtContact = $("#txtContact").val();
			var txtEmail = $("#txtEmail").val();
			var txtPass = $("#txtPass").val();
			
			var vtxtName = true;
			var vtxtContact = true;
			var isvalid = true;
			var ispasvalid = true;
			
			if(txtName != ''){
				$(".error_name").html('');
				vtxtName = true;
			}else{
				$(".error_name").html('Required');
				vtxtName = false;
			}
			if(txtContact != ''){
				$(".error_contact").html('');
				vtxtContact = true;
			}else{
				$(".error_contact").html('Required');
				vtxtContact = false;
			}
			if(txtPass != ''){
				$(".error_pass").html('');
				var ispas = isPassvalid(txtPass);
				if(ispas == true){
					$(".error_pass").html('');
					ispasvalid = true;
				}else{
					$(".error_pass").html(ispas);
					ispasvalid = false;
				}
			}else{
				$(".error_pass").html('Required');
				ispasvalid = false;
			}
			if(txtEmail != ''){
				$(".err_email").html('');
				if(IsEmail(txtEmail) == true){
					$(".err_email").html('');
					isvalid = true;
				}else{
					$(".err_email").html('Not valid');
					isvalid = false;
				}
			}else{
				$(".err_email").html('Required');
				isvalid = false;
			}
			
			//alert(ispasvalid);
			if(vtxtName == true && vtxtContact == true && isvalid == true && ispasvalid == true){
				return true;
			}else{
				return false;
			}
		}
		
		$("#btnaddealer").one("click", function () {
			var btn = this;
			var $form = $(btn).closest("form");
			$form.submit(function (e) {
				e.preventDefault();
				var isvalid = conformisvalid();
				if(isvalid == true){
					$('.form_dealer').unbind('submit').submit();
				}
			});
		});
		// ===MODIFY
		function mod_conformisvalid(){
			var txtName = $("#txtName").val();
			var txtContact = $("#txtContact").val();
			var txtEmail = $("#txtEmail").val();
			
			var vtxtName = true;
			var vtxtContact = true;
			var isvalid = true;
			
			if(txtName != ''){
				$(".error_name").html('');
				vtxtName = true;
			}else{
				$(".error_name").html('Required');
				vtxtName = false;
			}
			if(txtContact != ''){
				$(".error_contact").html('');
				vtxtContact = true;
			}else{
				$(".error_contact").html('Required');
				vtxtContact = false;
			}
			if(txtEmail != ''){
				$(".err_email").html('');
				if(IsEmail(txtEmail) == true){
					$(".err_email").html('');
					isvalid = true;
				}else{
					$(".err_email").html('Not valid');
					isvalid = false;
				}
			}else{
				$(".err_email").html('Required');
				isvalid = false;
			}
			
			//alert(ispasvalid);
			if(vtxtName == true && vtxtContact == true && isvalid == true){
				return true;
			}else{
				return false;
			}
		}
		// ===FUNCTION
		$("#btnmodsale").one("click", function () {
			var btn = this;
			var $form = $(btn).closest("form");
			$form.submit(function (e) {
				e.preventDefault();
				var isvalid = mod_conformisvalid();
				if(isvalid == true){
					$('.form_sales').unbind('submit').submit();
				}
			});
		});
		
		
		
	});