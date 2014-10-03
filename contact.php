<?php
	session_start();
	
	require("header.php");
?>

	<div class="container">
	<!-- MAIN BODY -->
		<div class="row"><!-- Content and Sidebar whole width-->	

			<!-- CONTENT -->				<div class="col-sm-8">
				<h2>Contact us</h2>
				<p>
The easiest way to identify how we might be able to help is simply to get in touch &ndash; to start an exploratory, no obligation conversation with us.  So do please contact us either by phone or email &ndash; we would love to hear from you.

T: 01234 870016

M: 07427 147346

E: info@leadingleaders.co.uk
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
				
			</div><!-- /.col-sm-8  CONTENT-->

 
			<!-- SIDEBAR -->
			<div id="sidebar" class="col-sm-4">
<?php			require ("sidebar.php");	?>
	 		</div>	<!-- /.blog-sidebar -->
		
		
      	</div><!-- /.row whole width-->

	</div><!-- /.container -->
    
    
<?php  require ("footer.php");   ?>
