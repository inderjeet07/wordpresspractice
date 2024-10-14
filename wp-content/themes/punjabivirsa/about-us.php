<?php
/*
Template Name: About Us
*/

get_header();
 ?>
 <div class="container">
 	<div class="about-us-heading">
 		<h1><?php the_title(); ?></h1>
 	</div>
 	<div class="about-us-main-section">
 		<div class="about-us-content">
 			<?php the_content(); ?>
 		</div>
 		<div class="about-us-form-cstm">


<section id="contact">
  
  <h1 class="section-header">Contact US</h1>
  
  <div class="contact-wrapper">
  
  <!-- Left contact page --> 
	  
	  <?php echo do_shortcode('[contact-form-7 id="87c597b" title="contact_us" html_id="contact-form" html_class="form-horizontal"]'); ?>
	  
	<?php //echo do_shortcode('[contact-form-7 id="5774032" title="Contact form 1"]'); ?>
    
 
    
  </div>
  
</section>  
  
 			
 		</div>
 	</div>
 </div>

 <?php 

 get_footer();

?>