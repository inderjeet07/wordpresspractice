<?php

get_header();
 ?>
 <div class="container-single-cstm">
<div style="margin: 0 auto;">
  <div class="bacon-blog-post bacon-shadow">

  	<div class="bacon-blog-post-inner">
      <h2><?php the_title(); ?></h2>
   
<?php the_content(); ?>

  </div>
</div>
</div>
</div>
 <?php 
get_footer();
?>