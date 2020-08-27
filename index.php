<!DOCTYPE html>
<html lang="en">
<head>
	<title>Contact V5</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/noui/nouislider.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>

<?php

include('../src/Airtable.php');
include('../src/Request.php');
include('../src/Response.php');

use \TANIOS\Airtable\Airtable;
$airtable = new Airtable(array(
    'api_key' => 'keyCNZEpU6dHDnTaq',
    'base'    => 'appC6W5P5uZMQbF95'
));



$name = $roll = $course = $college = $phone = $email = $login_issue = $verification_issue = $network_issue = $submission_issue = $time_issue = $quest1 = $quest2 = $message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = $_POST['name'];
	$roll = $_POST['roll'];
	$course = $_POST['course'];
	$college = $_POST['college'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$login_issue = $_POST['login_issue'];
	$verification_issue = $_POST['verification_issue'];
	$network_issue = $_POST['network_issue'];
	$submission_issue = $_POST['submission_issue'];
	$time_issue = $_POST['time_issue'];
	$quest1 = $_POST['quest1'];
	$quest2 = $_POST['quest2'];
	$message = $_POST['message'];
}


$params = array(

		"Name" => $name,
		"College" => $college,
		"Course" => $course,
		"Mobile" => $phone
		"Email" => $email
		"Problem" => array($login_issue, $submission_issue, $network_issue, $verification_issue, $time_issue)
		"Message" => $message
		"Wrong Questions" => $quest1
		"Out-of-Syllabus Questions" => $quest2
);

$request = $airtable->getContent( 'RGVB', $params);

do {
    $response = $request->updateResponse();
    var_dump( $response[ 'records' ] );
}
while( $request = $response->next() );

print_r($request);

?>


	<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
				<span class="contact100-form-title">
					Welcome to RGPV
				</span>
				<h5><b> Please fill form below to ensure your representation:</b></h5><br><br>

				<div class="wrap-input100 validate-input bg1" data-validate="Please Type Your Name">
					<span class="label-input100">FULL NAME *</span>
					<input class="input100" type="text" name="name" placeholder="Enter Your Name">
				</div>

				<div class="wrap-input100 bg1 rs1-wrap-input100">
					<span class="label-input100">Roll No.</span>
					<input class="input100" type="text" name="roll" placeholder="Enter Roll Number">
				</div>

				<div class="wrap-input100 bg1 rs1-wrap-input100">
					<span class="label-input100">Course Enrolled</span>
					<div>
						<select class="js-select2" name="course">
							<option value="btech">B.Tech</option>
							<option value="bpharm">B.Pharm</option>
							<option value="something">something</option>
							<option value="other">other</option>
						</select>
						<div class="dropDownSelect2"></div>
					</div>
				</div>

				<div class="wrap-input100 validate-input bg1" data-validate="Please Type Your Name">
					<span class="label-input100">COLLEGE *</span>
					<input class="input100" type="text" name="college" placeholder="Enter Your College Name">
				</div>

				<div class="wrap-input100 bg1 rs1-wrap-input100">
					<span class="label-input100">Phone</span>
					<input class="input100" type="text" name="phone" placeholder="Enter Number Phone">
				</div>

				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Enter Your Email (e@a.x)">
					<span class="label-input100">Email *</span>
					<input class="input100" type="text" name="email" placeholder="Enter Your Email ">
				</div>





				<div class="w-full dis-none js-show-service">
					<div class="wrap-contact100-form-radio">
						<span class="label-input100">Nature of Problem</span>

						<div class="contact100-form-radio m-t-15">
							<input class="input-radio100" id="radio1" type="radio" name="login_issue" value="login_issue" >
							<label class="label-radio100" for="radio1">
								Login issue
							</label>
						</div>

						<div class="contact100-form-radio">
							<input class="input-radio100" id="radio2" type="radio" name="verification_issue" value="verification_issue">
							<label class="label-radio100" for="radio2">
								Verification issue
							</label>
						</div>

						<div class="contact100-form-radio">
							<input class="input-radio100" id="radio3" type="radio" name="network_issue" value="network_issue">
							<label class="label-radio100" for="radio3">
								Network issue
							</label>
						</div>

						<div class="contact100-form-radio">
							<input class="input-radio100" id="radio4" type="radio" name="submission_issue" value="submission_issue">
							<label class="label-radio100" for="radio4">
								Submission issue
							</label>
						</div>

						<div class="contact100-form-radio">
							<input class="input-radio100" id="radio5" type="radio" name="time_issue" value="time_issue">
							<label class="label-radio100" for="radio5">
								Time issue
							</label>
						</div>

					</div>

				</div>

				<div class="w-full dis-none js-show-service">
					<div class="wrap-contact100-form-radio">
						<span class="label-input100">Were Questions out of syllabus?</span>

						<div class="contact100-form-radio m-t-15">
							<input class="input-radio100" id="radio6" type="radio" name="quest1" value="yes" >
							<label class="label-radio100" for="radio6">
								Yes
							</label>
						</div>

						<div class="contact100-form-radio">
							<input class="input-radio100" id="radio7" type="radio" name="quest1" value="no">
							<label class="label-radio100" for="radio7">
								No
							</label>
						</div>
					</div>

					<div class="wrap-contact100-form-radio">
						<span class="label-input100">Were the Questions wrong?</span>

						<div class="contact100-form-radio m-t-15">
							<input class="input-radio100" id="radio8" type="radio" name="quest2" value="yes" >
							<label class="label-radio100" for="radio8">
								Yes
							</label>
						</div>

						<div class="contact100-form-radio">
							<input class="input-radio100" id="radio9" type="radio" name="quest2" value="no">
							<label class="label-radio100" for="radio9">
								No
							</label>
						</div>
					</div>

				</div>


				<div class="wrap-input100 validate-input bg0 rs1-alert-validate" data-validate = "Please Type Your Message">
					<span class="label-input100">Any Other Problem</span>
					<textarea class="input100" name="message" placeholder="Your message here..."></textarea>
				</div>

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn" type="submit">
						<span>
							Submit
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
					</button>
				</div>
			</form>
		</div>
	</div>







<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});


			$(".js-select2").each(function(){
				$(this).on('select2:close', function (e){
					if($(this).val() == "Please chooses") {
						$('.js-show-service').slideUp();
					}
					else {
						$('.js-show-service').slideUp();
						$('.js-show-service').slideDown();
					}
				});
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="vendor/noui/nouislider.min.js"></script>
	<script>
	    var filterBar = document.getElementById('filter-bar');

	    noUiSlider.create(filterBar, {
	        start: [ 1500, 3900 ],
	        connect: true,
	        range: {
	            'min': 1500,
	            'max': 7500
	        }
	    });

	    var skipValues = [
	    document.getElementById('value-lower'),
	    document.getElementById('value-upper')
	    ];

	    filterBar.noUiSlider.on('update', function( values, handle ) {
	        skipValues[handle].innerHTML = Math.round(values[handle]);
	        $('.contact100-form-range-value input[name="from-value"]').val($('#value-lower').html());
	        $('.contact100-form-range-value input[name="to-value"]').val($('#value-upper').html());
	    });
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

</body>
</html>
