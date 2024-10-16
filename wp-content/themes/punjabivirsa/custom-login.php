<?php

/*
*Template Name: Login
*/

get_header();
if (! is_user_logged_in() ) {
 ?>
    <div class="form-modal container-cstm">

        <div class="form-toggle">
            <button id="login-toggle" onclick="toggleLogin()">log in</button>
            <button id="signup-toggle" onclick="toggleSignup()">sign up</button>
        </div>

        <div id="login-form">
            <!--         <form>
            <input type="text" placeholder="Enter email or username"/>
            <input type="password" placeholder="Enter password"/>
            <button type="button" class="btn login">login</button>
            <p><a href="javascript:void(0)">Forgotten account</a></p>
            <hr/>

        </form> -->
            <?php
		 // Display WordPress login form:
    $args = array(
        'redirect' => 'http://localhost/punjabivirsa/login/', 
        'form_id' => 'custom_loginform',
        'form_class' => 'custom_login_user',
        'id_username' => 'user',
        'id_password' => 'pass',
        'remember' => true
    );
    ?>
                <div class="custom-login-user-cstm">
                    <?php 

$login = (isset($_GET['login']) ) ? $_GET['login'] : 0;
if ( $login === "failed" ) {
  echo '<p class="login-msg"><strong>ERROR:</strong> Invalid username and/or password.</p>';
} elseif ( $login === "empty" ) {
  echo '<p class="login-msg"><strong>ERROR:</strong> Username and/or Password is empty.</p>';
} elseif ( $login === "false" ) {
  echo '<p class="login-msg"><strong>ERROR:</strong> You are logged out.</p>';
}
       wp_login_form( $args ); 

    // echo "<a href='/matrimonial-signup/'>Signup</a>";

       ?>
                </div>


        </div>
        <div id="signup-form" class="signup-form-main-cstm">
            <!-- <div class="scanner-cstm">
    		<img src="http://himachalmahasabha.com/wp-content/uploads/2023/02/HMS-QR-code.jpeg" class="scanner-code-payment">
    	</div> -->
            <div class="cstm-form">
                <form id="registratiion-form" class="registration_custom_form">

                    <label class="all-field-lable">Email</label>
                    <input type="email" name="email" placeholder="Enter your email" />
                    <br>
                    <label class="all-field-lable">Phone Number</label>
                    <input type="number" name="number" placeholder="Enter your Phonenumber" />
                    <br>
                    <label class="all-field-lable">Username</label>
                    <input type="text" name="username" placeholder="Choose username" />
                    <br>
                    <label class="all-field-lable">Password</label>
                    <input type="password" name="password_custom" placeholder="Create password" />
                    <br>
                    <label class="all-field-lable">Payment Screenshot</label>
                    <input type="file" name="payment_proof" class="payment_proof" placeholder="Payment Screenshot">
                    <input type="submit" class="btn signup" value="create account">
                    <p>Clicking <strong>create account</strong> means that you are agree to our <a href="javascript:void(0)">terms of services</a>.</p>
                    <hr/>

                </form>
            </div>
        </div>



    </div>

    <?php
		}else{
			
	?>
        <div class="container-cstm">

            <div class="wrapper">
                <div class="profiles-wrapper">
                    <h1> Dashboard </h1>
                    <div class="picture">
                        <img class="img rounded-img" src="https://i.postimg.cc/mrFJyDzY/cesar-rincon-608059-unsplash.jpg">
                        <div class="welcome-message">
                            Welcome
                            <?php $current_user = wp_get_current_user(); ?>
                                <h3 class="name"><?php
                                 if($current_user->user_login){
                                  echo $current_user->user_login;
                                  }else{
                                     echo "hllo";
                                     } ?> </h3>
                        </div>
                        <div class="email"><b>Email:</b>&nbsp;
                            <?php echo $current_user->user_email; ?>
                        </div>
                    </div>
                </div>
                <div class="blogs-wrapper">


                    <div class="formbold-main-wrapper">
                        <!-- Author: FormBold Team -->
                        <!-- Learn More: https://formbold.com -->

                        <div class="formbold-form-wrapper">
                            <h6>ਆਪਣੀ ਲਿਖਤ ਨੂੰ ਪੌਸਟ krvone ਲਈ ਆਪਣੀ ਲਿਖਤ ਦੀ ਫੋਟੋ ਖਿੱਚ ਕੇ ਅੱਪਲੋਡ ਕਰ ਦਿਓ ਜਾ ਫਿਰ ਨੀਚੇ ਬਾਕਸ ਵਿੱਚ ਆਪਣੀ ਲਿਖਤ ਲਿੱਖ ਕੇ ਬੇਜ ਦੋ</h6>
                            <form class="post_upload">
                                <div class="formbold-mb-5">
                                    <label for="email" class="formbold-form-label">
                                        ਪੋਸਟ ਦਾ ਸਿਰਲੇਖ ਲਿਖੋ

                                    </label>
                                    <input type="text" name="post_title" id="post_title" placeholder="ਪੋਸਟ ਦਾ ਸਿਰਲੇਖ ਲਿਖੋ" class="formbold-form-input" />
                                </div>

                                <!--       <div class="mb-6 pt-4">
        <label class="formbold-form-label formbold-form-label-2">
         ਪੋਸਟ ਦੀ ਫੋਟੋ ਅੱਪਲੋਡ ਕਰੋ
        </label>

        <div class="formbold-mb-5 formbold-file-input">
          <input type="file" name="post_images" id="file" />
          <label for="file">
            <div>
              <span class="formbold-drop-file"> ਫਾਈਲਾਂ ਨੂੰ ਇੱਥੇ ਸੁੱਟੋ</span>
              <span class="formbold-or"> ਜਾਂ </span>
              <span class="formbold-browse"> ਬਰਾਊਜ਼ ਕਰੋ </span>
            </div>
          </label>
        </div>
  
      </div> -->
                                <div class="formbold-mb-5">
                                    <label for="email" class="formbold-form-label"> ਪੋਸਟ ਲਿਖੋ

                                    </label>
                                    <textarea name="full_post" id="full-post" placeholder="ਪੋਸਟ ਦਾ ਸਿਰਲੇਖ ਲਿਖੋ" class="formbold-form-input" rows="10" cols="20" style="width: 100%; max-width: 100%;"></textarea>

                                </div>

                                <div>
                                    <input type="submit" class="formbold-btn w-full" value="ਭੇਜੋ">
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

                <!-- wrapper -->
            </div>
            <?php } ?>
                <?php 
get_footer();
?>

                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>


                    <!-- <script>
        
</script> -->
                    <script type="text/javascript">
                        jQuery(document).ready(function(){
                        	alert('hlo');
                                     var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
                        	           
                        jQuery(".post_upload").validate({
                            onkeyup: false,
                        rules: {
                                 post_title: "required", 
                                 full_post:"required",
                                 files:
                        	     {
                                    required: true,
                                    extension: "jpg|jpeg|png"
                                },
                            
                             },
                            messages: {
                          
                                          files:{
                        //             required:"Please upload a image",                  
                                    extension:"please select the image only"
                                },
                              
                                     },
                             submitHandler: function(form) {
                        		 
                        		 alert(form);
                        		 
                        // 		  var file_data = jQuery(".payment_proof").prop('files')[0];
                        
                         var form_data = new FormData(jQuery(".post_upload")[0]);
                              
                         form_data.append('action', 'post_form_submit_ajax');
                        
                                
                              jQuery.ajax({
                              type: "POST",      
                              url:ajaxurl,
                                data: form_data,
                                cache: false,
                                processData: false,
                                contentType: false,
                                success:  function(response){
                        
                                 alert(response);  
                        
                                if(response=='data_save'){
                                 jQuery("#success-submit").css("display","block");
                                   jQuery("#custom_reg-form").get(0).reset();
                        
                                }    
                                 
                            },
                             
                               });
                        
                         }
                        });
                        
                        	
                        	
                        	
                        	jQuery("#custom_loginform").validate({
                            onkeyup: false,
                        rules: {
                                 log: "required", 
                                 pwd:"required",
                            
                             },
                            messages: { },
                        // 		     submitHandler: function(form) {
                        
                        //  }
                        });
                        	
                        	
                        	jQuery("#registratiion-form").validate({
                            onkeyup: false,
                        rules: {
                                username: "required", 
                                 password:"required",
                                 number:{
                                    required: true,
                                    number: true
                                 },
                                 email: {       
                                    required: true,
                                    email: true,
                                     // remote: {
                                     //        url: ajaxurl,
                                     //        type: "post",
                                     //        data:{
                                     //           'c_email': function() { return jQuery( ".your_email" ).val(); },
                                     //          'action': 'check_user_email'
                                     //     }
                                     // }
                                 },
                                 
                                    payment_proof:
                        	 {
                                    required: true,
                                    extension: "jpg|jpeg|png"
                                },
                            
                             },
                            messages: {
                               email:
                                         {
                                            required: "Please enter your email address.",
                                            email: "Please enter a valid email address.",
                        //                     remote: "This email is already taken."
                                         },
                                          payment_proof:{
                        //             required:"Please upload a image",                  
                                    extension:"please select the image only"
                                },
                              
                                     },
                             submitHandler: function(form){
                        //         event.preventDefault();
                              alert(form);
                         var file_data = jQuery(".payment_proof").prop('files')[0];
                        
                         var form_data = new FormData(jQuery("#registratiion-form")[0]);
                              
                         form_data.append('action', 'form_submit_ajax');
                                     var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
                        
                                
                              jQuery.ajax({
                              type: "POST",      
                              url:ajaxurl,
                                data: form_data,
                                cache: false,
                                processData: false,
                                 contentType:false,
                                success:  function(response){
                        
                                 alert(response);  
                        
                                if(response=='data_save'){
                                 jQuery("#success-submit").css("display","block");
                                   jQuery("#custom_reg-form").get(0).reset();
                        
                                }    
                                 
                            },
                             
                               });
                         }
                        });
                        	
                        
                        });
                    </script>