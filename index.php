<!DOCTYPE html>
<html lang="en">
<head>
	<title>SMTP Server</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="contact1">
		<div class="container-contact1">
			<div class="contact1-pic js-tilt" data-tilt>
				<img src="images/img-01.png" alt="IMG">
			</div>

			<form id="myform" class="contact1-form validate-form">
				<span class="contact1-form-title">
					Mailer From SMTP Server
				</span>

				<div class="wrap-input1 validate-input" data-validate = "Name is required">
					<input id="name" class="input1" type="text" placeholder="Name">
					<span class="shadow-input1"></span>
				</div>

				<div class="wrap-input1 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
					<input id="email" class="input1" type="text" placeholder="Email">
					<span class="shadow-input1"></span>
				</div>

				<div class="wrap-input1 validate-input" data-validate = "Subject is required">
					<input id="subject" class="input1" type="text" placeholder="Subject">
					<span class="shadow-input1"></span>
				</div>

				<div class="wrap-input1 validate-input" data-validate = "To is required">
					<input id="to" class="input1" type="text" placeholder="To">
					<span class="shadow-input1"></span>
				</div>

				<div class="wrap-input1 validate-input" data-validate = "Message is required">
					<textarea id="body" class="input1" placeholder="Message"></textarea>
					<span class="shadow-input1"></span>
				</div>

				<div class="container-contact1-form-btn">
					<button type="button" onclick="sendEmail()" value="Send an Email" class="contact1-form-btn">
						<span>
							Send Email
							<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
						</span>
					</button>
				</div>
			</form>
		</div>
	</div>

	<script type="text/javascript">
        function sendEmail(){
          var name = $("#name");
          var email = $("#email");
          var subject = $("#subject");
		  var to = $("#to");
          var body = $("#body");

          if(isNotEmty(name) && isNotEmty(email) && isNotEmty(subject) && isNotEmty(body)){
            $.ajax({
              url: 'sendEmail.php',
              method: 'POST',
              dataType: 'json',
              data:{
                name: name.val(),
                email: email.val(),
                subject: subject.val(),
			    to: to.val(),
                body: body.val(),
              }, succes: function(response){
                $('#myForm')[0].reset();
                $('.sent-notification').text("Message sent successfully.");
              }
            });
          }
        }
		function isNotEmty(caller){
          if(caller.val() == ""){
            caller.css('border','1px solid red');
            return false;
          }
          else
          {
            caller.css('border', '');
            return true;
          }
        }
		</script>


<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

<!--===============================================================================================-->
	<script src="js/main.js"></script>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>
</html>
