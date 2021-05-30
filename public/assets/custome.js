
		$(document).ready(function(){

			$(function() {
                $( "#my_date_picker" ).datepicker();
            });

			$("#fname_err").hide();
			$("#lname_err").hide();
			$("#email_err").hide();
			$("#radio_err").hide();
			$("#hobby_err").hide();
			$("#image_err").hide();
			$("#date_err").hide();
			var namee = true;
			var lnamee = true;
			var emails = true;
			var genderr = true;
			var hobbys = true;
			var images = true;
			var dates = true;

			$("#fname").keyup(function(){
				emptyName();	
			});

			$("#lname").keyup(function(){
				emptyLname();	
			});

			$("#email").keyup(function(){
				emptyEmail();	
			});

			$("#my_date_picker").keyup(function(){
				ematydate();	
			});

			$(".genders").click(function(){
				ematyRadio();	
			});

			function emptyName()
			{
				var fname = $("#fname").val();
				if (fname.length == '') {
					$("#fname_err").show();
					$("#fname_err").css("color","red");
					$("#fname").css("border","2px solid red");
					$("#fname_err").html("Plese Enter Name");
					namee= false;
					return false;	
				} else {
					$("#fname_err").hide();
					$("#fname").css("border",'');
				}
			}

			function emptyLname()
			{
				var lname = $("#lname").val();
				if (lname.length == '') {
					$("#lname_err").show();
					$("#lname_err").css("color","red");
					$("#lname").css("border","2px solid red");
					$("#lname_err").html("Plese Enter Name");
					lnamee= false;
					return false;	
				} else {
					$("#lname_err").hide();
					$("#lname").css("border",'');
				}	
			}

			function ematydate()
			{
				var my_date_picker = $("#my_date_picker").val();
				if (my_date_picker.length == '') {
					$("#date_err").show();
					$("#date_err").css("color","red");
					$("#my_date_picker").css("border","2px solid red");
					$("#date_err").html("Plese Enter Date");
					dates= false;
					return false;	
				} else {
					$("#date_err").hide();
					$("#my_date_picker").css("border",'');
				}
			}
			

			function emptyEmail()
			{
				var email  = $("#email").val();
				var reg = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@(()|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

				if(email.length =='') {
					$("#email_err").show();
					$("#email_err").html("please Enter Email");
					$("#email_err").css("color","red");
					$("#email").css("border","2px solid red");
					emails=false;
					return false;

				} else if(!reg.test(email) ) {
					$("#email_err").show();
					$("#email_err").html("please Enter Correct Email");
					$("#email_err").css("color","red");
					$("#email").css("border","2px solid red");
					emails=false;
					return false;
				} else {

					$("#email_err").hide();
					$("#email").css("border",'');
				}
			} 

			function ematyRadio()
			{
				if($("input:radio").filter(":checked").length == 0)	 {

					$("#radio_err").show();
					$("#radio_err").html("please Select Gender");
					$("#radio_err").css("color","red");
					genderr = false;
					return false;
				} else {
					$("#radio_err").hide();
				}
			}

			function ematycheckbox()
			{
				if($("input:checkbox").filter(":checked").length == 0)	 {


					$("#hobby_err").show();
					$("#hobby_err").html("please Select hobby");
					$("#hobby_err").css("color","red");
					hobbys = false;
					return false;
				} else {
					$("#hobby_err").hide();
				}
			}

			function emptyimage()
			{
				var image = $("#image").val();
				if (image.length == '') {
					$("#image_err").show();
					$("#image_err").css("color","red");
					$("#image_err").html("Plese select Image");
					images= false;
					return false;	
				} else {
					$("#image_err").hide();
				}	
			}



			$("#btn").click(function(e){
				//e.preventDefault(); 
				namee = true;
				lnamee = true;
				emails = true;
				genderr = true;
				hobbys = true;
				images= true;
				dates = true;

				emptyName();
				emptyEmail();
				ematyRadio();
				emptyLname();
				ematycheckbox();
				emptyimage();
				ematydate();

				if ( (namee==true) && (emails==true) && (genderr==true) && (lnamee==true) && 
					(hobbys==true) && (images==true) && (dates==true)) {
					return	true;
				} else {
					return false;
				}
 
			});
		});
