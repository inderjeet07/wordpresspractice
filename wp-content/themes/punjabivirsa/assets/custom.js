var $= jQuery;

$(document).ready(function(){

    //hamburger Toggle
    $('.humbarger').click(function(event){
    $('.menu-list').slideToggle(500);
    event.preventDefault();
    
    $('.menu-list li a').click(function(event) {
        if ($(window).width() < 768) {
          $('.menu-list').slideUp(500);
          event.preventDefault(); 
        }
      });
});
	


});
	function toggleSignup(){
   document.getElementById("login-toggle").style.backgroundColor="#fff";
    document.getElementById("login-toggle").style.color="#222";
    document.getElementById("signup-toggle").style.backgroundColor="#FF9933";
    document.getElementById("signup-toggle").style.color="#fff";
    document.getElementById("login-form").style.display="none";
    document.getElementById("signup-form").style.display="block";
}

function toggleLogin(){
    document.getElementById("login-toggle").style.backgroundColor="#FF9933";
    document.getElementById("login-toggle").style.color="#fff";
    document.getElementById("signup-toggle").style.backgroundColor="#fff";
    document.getElementById("signup-toggle").style.color="#222";
    document.getElementById("signup-form").style.display="none";
    document.getElementById("login-form").style.display="block";
}


//  jQuery(document).ready(function(){
//             var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
// jQuery("#registratiion-form").validate({
//     onkeyup: false,
// rules: {
//          username: "required", 
//          password:"required",
//          number:{
//             required: true,
//             number: true
//          },
//          email: {       
//             required: true,
//             email: true,
//              // remote: {
//              //        url: ajaxurl,
//              //        type: "post",
//              //        data:{
//              //           'c_email': function() { return jQuery( ".your_email" ).val(); },
//              //          'action': 'check_user_email'
//              //     }
//              // }
//          },
         
//         payment_proof:
// 	 {
//             required: true,
//             extension: "jpg|jpeg|png|ico|bmp"
//         },
    
//      },
//     messages: {
//        email:
//                  {
//                     required: "Please enter your email address.",
//                     email: "Please enter a valid email address.",
//                     remote: "This email is already taken."
//                  },
//         //           your_image:{
//         //     required:"Please upload image",                  
//         //     extension:"select valid input file format"
//         // },
      
//              },
//      submitHandler: function(form) {
//         // event.preventDefault();

//  var file_data = jQuery(".payment_proof").prop('files')[0];

//  var form_data = new FormData(jQuery("#registratiion-form")[0]);
      
//  // form_data.append('action', 'form_submit_ajax');

//   var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
        
//       jQuery.ajax({
//       type: "POST",      
//       url:ajaxurl,
//         data: form_data,
//         cache: false,
//         processData: false,
//         contentType: false,
//         success:  function(response){

//          // alert(response);  

//         if(response=='data_save'){
//          jQuery("#success-submit").css("display","block");
//            jQuery("#custom_reg-form").get(0).reset();

//         }    
         
//     },
     
//        });
//  }
// });


// });
