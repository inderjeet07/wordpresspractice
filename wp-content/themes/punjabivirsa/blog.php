<?php 
/*
Template Name:Blog
*/
get_header();
?>
<div class="container cstm-blog-section">
    <h2>ਲਿਖਤਾਂ</h2>
        <p class="comon-para">This is a custom coddee.This is a custom coddee.This is a custom coddee.This is a custom coddee.This is a custom coddee.This is a custom coddee.This is a custom coddee.This is a custom coddee.</p>
   
    <div class="punjabi-virsa-blog-main">
                            <section class="blogs-cstm-list">

                        
<?php 
$args = array(
    'post_type' => 'custom_stories',
    'post_status' => 'publish',
    'posts_per_page' => -1
);
$posts = new WP_Query( $args );

// print_r($posts);
// if ( $posts -> have_posts() ) {
//     while ( $posts -> have_posts() ) {

//         the_content();
//         // Or your video player code here

//     }
// }
// wp_reset_query();

 $loop = new WP_Query( array( 'post_type' => 'writings', 'posts_per_page' => -1 ) );

 $i=0;

while ( $loop->have_posts() ) : $loop->the_post(); 

// $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->ID ));

 $image_path = $image[0];

  $i++;

  // if($i==1){
  //   echo'<div class="carousel-item active">';

  // }else{
  //   echo'<div class="carousel-item">';
  // }

// endwhile;
  ?>

                             <div class="cont">
            <h2><?php the_title(); ?></h2>
								 <?php $description = get_field('short_description'); ?>
                             <p><?php echo $description; ?></p>

                        <a href="<?php the_permalink();?>">Learn More <i class="fas fa-arrow-right"></i></a>
            
          </div>
                          <!-- <div class="cont">
            <h2>This is a custom coddee.</h2>
                             <p>This is a custom coddee.</p>

                        <a href="#">Learn More <i class="fas fa-arrow-right"></i></a>
            
          </div>
                          <div class="cont">
            <h2>This is a custom code</h2>
                             <p>This is a custom code</p>

                        <a href="#">Learn More <i class="fas fa-arrow-right"></i></a>
            
          </div>
                          <div class="cont">
            <h2>This is a custom coddee.</h2>
                             <p>This is a custom coddee.</p>

                        <a href="#">Learn More <i class="fas fa-arrow-right"></i></a>
            
          </div>
                          <div class="cont">
            <h2>This is a custom code</h2>
                             <p>This is a custom code</p>

                        <a href="#">Learn More <i class="fas fa-arrow-right"></i></a>
            
          </div>
                          <div class="cont">
            <h2>This is a custom coddee.</h2>
                             <p>This is a custom coddee.</p>

                        <a href="#">Learn More <i class="fas fa-arrow-right"></i></a>
            
          </div>
                          <div class="cont">
            <h2>This is a custom coddee.</h2>
                             <p>This is a custom coddee.</p>

                        <a href="#">Learn More <i class="fas fa-arrow-right"></i></a>
            
          </div>
                          <div class="cont">
            <h2>This is a custom coddee.</h2>
                             <p>This is a custom coddee.</p>

                        <a href="#">Learn More <i class="fas fa-arrow-right"></i></a>
            
          </div> -->

          <?php 

        endwhile;

          ?>
              
  
     </section>                       
   </div>
</div>
<?php 

get_footer();
?>