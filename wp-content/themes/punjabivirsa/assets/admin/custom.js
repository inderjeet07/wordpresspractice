jQuery( document ).ready(function() {
//     console.log( "ready!" );
});
var $=jQuery;
// console.log('run');
jQuery(".appoved_user_click").click(function() {
    var id_check = jQuery(this).attr('id'); // $(this) refers to button that was clicked
      jQuery.ajax({
      type: "POST",      
      url:ajaxurl,
        data: {
             action: 'approve_the_users',
            id_check:id_check,
        },
        success:  function(response){   

        alert(response);     
       
         window.location.reload();
      
    }
       });
});
  
  jQuery(".notappoved_user_click").click(function() {
    var not_approved = jQuery(this).attr('id'); // $(this) refers to button that was clicked
//     console.log('run');
    // alert(not_approved);
       // $(".cstm-"+id_check).hide()
     // var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
        
      jQuery.ajax({
      type: "POST",      
      url:ajaxurl,
        data: {
             action: 'unapprove_the_users',
            id_check:not_approved,
        },
        success:  function(response){        
         // console.log("---"+response);
         alert(response);
         window.location.reload();
          // $(".cstm-"+id_check).hide()
      
    }
       });
});


  jQuery(".proof_screenshot").click(function(){
    // $("#show_image_popup").fadeIn();
var src_value = jQuery(this).attr("src");
jQuery(".proof_image_modal").attr('src',src_value);
})

    jQuery(".matrimonial_proof_image").click(function(){
        alert('MAT');
    // $("#show_image_popup").fadeIn();
var src_value = jQuery(this).attr("src");
jQuery(".matrimonial_proof_image_modal").attr('src',src_value);
})


// jQuery("#btnExport").click(function(e) {
//  let table2excel = new Table2Excel();
//   table2excel.export(document.querySelector("#membership_export"));
//     e.preventDefault();
// });

// const el=document.getElementById("matribtnExport");
// if(el){
// el.addEventListener("click", () => {
//   let table2excel = new Table2Excel();
//   table2excel.export(document.querySelector("#matrimonial_export"));
// });
// }



