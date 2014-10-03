<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Contact</title>
		
		<link href="contact.css" rel="stylesheet"> 
	</head>
	
	<body>
		<div class="container">
		<!-- MAIN BODY -->
			<div class="row"><!-- Content and Sidebar whole width-->	
	
				<!-- CONTENT -->				
				<div class="col-sm-12">
					<h2>Contact us</h2>
					<p>
	The easiest way to identify how we might be able to help is simply to get in touch &ndash; to start an exploratory, no obligation conversation with us.  So do please contact us either by phone or email &ndash; we would love to hear from you.
	
	T: 01234 56789
	
	M: 07777777777
	
	E: me@me.com
					</p>
					
					<div id="contact-form">
						
						<?php
						//init variables
						$cf = array();
						$sr = false;
			
						if(isset($_SESSION['cf_returndata'])){
							$cf = $_SESSION['cf_returndata'];
							$sr = true;
							// var_dump ($_SESSION['cf_returndata']);
						}
						?>
						<ul id="errors" class="<?php echo ($sr && !$cf['form_ok']) ? 'visible' : ''; ?>">
							<li id="info">There were some problems with the form:</li>
							<?php
							if(isset($cf['errors']) && count($cf['errors']) > 0) :
								foreach($cf['errors'] as $error) :
							?>
							<li><?php echo $error; ?></li>
							<?php
								endforeach;
							endif;
							?>
						</ul>
						<p id="success" class="<?php echo ($sr && $cf['form_ok']) ? 'visible' : ''; ?>">Thanks for contacting us. We will respond to you shortly.</p>
						<form method="post" action="process.php">
							<label for="name">From: <span class="required">*</span></label>
							<input type="text" id="name" name="name" value="<?php echo ($sr && !$cf['form_ok']) ? $cf['posted_form_data']['name'] : '' ?>" placeholder="Your name" required autofocus />
			
							<label for="email">Email: <span class="required">*</span></label>
			                <input type="email" id="email" name="email" value="<?php echo ($sr && !$cf['form_ok']) ? $cf['posted_form_data']['email'] : '' ?>" placeholder="Your email address" required />
			
			                <label for="telephone">Telephone: </label>
			                <input type="tel" id="telephone" name="telephone" value="<?php echo ($sr && !$cf['form_ok']) ? $cf['posted_form_data']['telephone'] : '' ?>" />
			
			                <label for="message">Message: <span class="required">*</span></label>
			                <textarea id="message" name="message" placeholder="Your message" required data-minlength="6"><?php echo ($sr && !$cf['form_ok']) ? $cf['posted_form_data']['message'] : '' ?></textarea>
			
			                <span id="loading"></span>
			                <input type="submit" value="Send" id="submit-button" />
			                <p id="req-field-desc"><span class="required">*</span> indicates a required field</p>
			            </form>
			            <?php unset($_SESSION['cf_returndata']); ?>
			        </div>
					
				</div><!-- /.col-sm-12  CONTENT-->
	      		</div><!-- /.row whole width-->
		</div><!-- /.container -->
    
		<div  id="footer" class="container">
			<div class="row">
				<div id="copyright" class="col-sm-6">
					<p>&copy; <span id="year">2015</span> My Site</p>
				</div>
				<div id="web-dev" class="col-sm-6">
					<p>Website design by <a href="http://www.me.co.uk" title="" target="_blank">Me</a></p>
				</div>		
	
			</div>
		</div>
											
					
	
		<!-- SCRIPTS -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="contact.js"></script>
		
		<script>	
			/*** FOOTER year ***/
			var dt = new Date();
			var c = document.getElementById("year");
			var t = dt.getFullYear();
			c.innerHTML = t;
	    	</script>
  	</body>
</html>

