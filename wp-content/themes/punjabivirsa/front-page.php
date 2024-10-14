<?php 
get_header();
?>
<div class="">
  <section class="ban_sec">
    <div class="">
      <div class="ban_img">
          <img src="<?php echo site_url();?>/wp-content/uploads/2023/08/abhinav-sharma-2i3LRHALx4E-unsplash-1-scaled.jpg" alt="banner" border="0">
      <div class="ban_text">
         <p>"ਸਤਿਗੁਰ ਨਾਨਕ ਪ੍ਰਗਟਿਆ <br>ਮਿਟੀ ਧੁੰਧੁ ਜਗਿ ਚਾਨਣੁ ਹੋਆ।"</p>
      </div>
      </div>
  </div>
</section>
</div>
<div class="container">
<div class="legends-cstm">
<h1>ਸ਼ਰਧਾਂਜਲੀ</h1>
<p class="important-para">ਇਹ ਤਿੰਨੋਂ ਵਿਅਕਤੀਆਂ ਦੀ ਸ਼ਰਧਾਂਜਲੀ ਦੇ ਮੌਕੇ ਸਾਡੇ ਦਿਲਾਂ ਵਿੱਚ ਉਨ੍ਹਾਂ ਦੀ ਯਾਦ ਸਦੀ ਜਿੰਦਗੀ ਭਰ ਜੁਦੀ ਰਹੇਗੀ, ਅਤੇ ਉਨ੍ਹਾਂ ਦੇ ਯਾਗ ਅਤੇ ਸ੍ਰੇਸ਼ਠ ਯਾਤਰੇ ਨੂੰ ਯਾਦ ਰੱਖਣ ਦਾ ਅਵਸਰ ਹੈ। ਉਨ੍ਹਾਂ ਦੀਆਂ ਆਤਮਾਵਾਦੀ ਉਮੀਦਾਂ ਅਤੇ ਮਹਾਨ ਯਾਤਰਾਵਾਂ ਨੂੰ ਸਮਾਜ ਵਿੱਚ ਯਾਦ ਰੱਖਣਾ ਹੈ, ਜੋ ਸਾਡੇ ਸਮਾਜ ਦੇ ਨਾਗਰਿਕ ਜੀਵਨ ਵਿੱਚ ਉਨ੍ਹਾਂ ਦੇ ਸੰਘਰਸ਼ ਅਤੇ ਯਾਤਰਾਵਾਂ ਦੇ ਮੂਲ ਸੰਦੇਸ਼ ਨੂੰ ਜਿਵੇਂਦਾ ਰਖੇਗਾ।</p>
<div class="myGallery">

  <div class="item">
    <img src="<?php echo site_url();?>/wp-content/uploads/2023/08/sidhu-moosewala.jpg" />
    <span class="caption">Sidhu Moosewala</span>
  </div>
  <div class="item">
    <img src="<?php echo site_url();?>/wp-content/uploads/2023/08/deep-sidhu.jpg" />
    <span class="caption">Deep Sidhu</span>
  </div>
  <div class="item">
    <img src="<?php echo site_url();?>/wp-content/uploads/2023/08/Sandeep-Nangal-Ambia.webp" />
    <span class="caption">Sandeep Nangal</span>
  </div>
</div>
</div>
<div class="">

    <section class="testimonial text-center">
<!--         <div class="container"> -->

            <div class="heading white-heading">
              ਲੇਖਕ
            </div>
            <div id="testimonial4" class="carousel slide testimonial4_indicators testimonial4_control_button thumb_scroll_x swipe_x" data-ride="carousel" data-pause="hover" data-interval="5000" data-duration="2000">
             
                <div class="carousel-inner" role="listbox">


        
        <?php // Or your video player code here
				

          $loop = new WP_Query( array( 'post_type' => 'writings', 'posts_per_page' => -1 ) );

          $i=0;

          while ( $loop->have_posts() ) : $loop->the_post(); 

          $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->ID ));

          $image_path = "$image[0]";

            $i++;

            if($i==1){
              echo'<div class="carousel-item active">';

            }else{
              echo'<div class="carousel-item">';
            }

       ?>



                  <!--  <div class="carousel-item active"> -->
                        <div class="testimonial4_slide">
                            
							<?php 
							$short_description = get_field('short_description');
							?>
							<img src="<?php echo  $image_path; ?>" class="img-circle img-responsive" />
							<h3>
								<?php the_title(); ?>
							</h3>
                            <p> <?php echo $short_description; ?></p>
              <a href="<?php the_permalink(); ?>" class="full-story-link">Full Story</a>
							
                            <h4>ਛਿੰਦਰ ਸਮਰਾ</h4>
                        </div>
          </div>

          <?php endwhile; ?>
          

                   <!--  <div class="carousel-item">
                        <div class="testimonial4_slide">
                            <img src="http://localhost/punjabivirsa/wp-content/uploads/2023/08/shinder-image.png" class="img-circle img-responsive" /><p>ਮਾਂ ਬੋਲੀ ਪੰਜਾਬੀ ਇੱਕ ਸ਼ਾਨਦਾਰ ਭਾਸ਼ਾ ਹੈ ਜੋ ਭਾਰਤੀ ਸਭਿਆਚਾਰ ਅਤੇ ਵਿਰਸੇ ਦੀ ਅਗਾਂ ਪ੍ਰਕਾਸ਼ਾਂ ਕਰਦੀ ਹੈ। ਇਸ ਭਾਸ਼ਾ ਦੀ ਸੌਨੀ ਗਈ ਵਾਕ-ਵਿਚਾਰ ਦੁਨੀਆ ਭਰ ਵਿੱਚ ਪਸੰਦ ਕੀਤੀ ਜਾਂਦੀ ਹੈ ਅਤੇ ਇਸ ਦੀ ਲਿਖਤ ਸਾਹਿਤ ਦੇ ਕ੍ਰਿਏਟਰਾਂ ਨੂੰ ਵੀ ਮਾਂ ਬੋਲੀ ਪੰਜਾਬੀ ਵਿਚ ਗੱਲਾਂ ਪ੍ਰਗਟ ਕਰਨ ਦਾ ਮੌਕਾ ਮਿਲਦਾ ਹੈ। ਇਸ ਭਾਸ਼ਾ ਦੀ ਸਰਵਾਧਿਕ ਖਾਸੀਅਤ ਇਹ ਹੈ ਕਿ ਇਹ ਸਭ ਤਰ੍ਹਾਂ ਦੀਆਂ ਭਾਵਨਾਵਾਂ ਅਤੇ ਭਾਵਨਾਤਮਕਤਾ ਨੂੰ ਵੱਖਰੀ ਤਰੀਕੇ ਨਾਲ ਵਾਕ-ਵਿਚਾਰ ਕਰ ਸਕਦੀ ਹੈ। ਇਸ ਵਜੋਂ, ਮਾਂ ਬੋਲੀ ਪੰਜਾਬੀ ਨੂੰ ਇੱਕ ਅਨੂਠਾ ਜਗ੍ਹਾ ਮਿਲਦਾ ਹੈ ਜੋ ਸਾਨੂੰ ਆਪਣੇ ਵਿਚਾਰ ਅਤੇ ਭਾਵਨਾਵਾਂ ਨੂੰ ਪ੍ਰਕਟ ਕਰਨ ਦਾ ਮ਌ਕਾ ਦਿੰਦਾ ਹੈ।</p>
                            <h4>Client 2</h4>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="testimonial4_slide">
                            <img src="http://localhost/punjabivirsa/wp-content/uploads/2023/08/shinder-image.png" class="img-circle img-responsive" />
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
                            <h4>Client 3</h4>
                        </div>
                    </div> -->
                </div>
                <a class="carousel-control-prev" href="#testimonial4" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#testimonial4" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
<!--         </div> -->
    </section>
</div>

<section class="section_all bg-light" id="about">
            <div class="">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section_title_all text-center">
                            <h3 class="font-weight-bold">ਪੰਜਾਬੀ ਵਿਰਸੇ ਵਿੱਚ ਤੁਹਾਡਾ ਸਵਾਗਤ ਹੈ</h3>
                            <p class="section_subtitle mx-auto text-muted">ਪੰਜਾਬੀ ਵਿਰਸੇ ਦੀ ਸੰਗੀਤਮਯੀ ਦੁਨੀਆ ਦਾ ਏਕ ਮੁਖਰ ਹਿੱਸਾ ਬਣਾਇਆ ਹੈ। ਇਸ ਸਾਂਝੀ ਧਾਰਮਿਕ ਆਦਰਸ਼ ਅਤੇ ਸਮਾਜਿਕ ਸੰਦੇਸ਼ਾਂ ਦੀ ਵੱਡੀ ਸਾਂਝ ਹੈ, ਜੋ ਪੰਜਾਬੀ ਲੋਕ-ਸੰਸਕ੍ਰਿਤੀ ਦੇ ਮੂਲ ਹਿੱਸੇ ਦਾ ਹਿੱਸਾ ਬਣ ਚੁੱਕੀ ਹੈ। ਇਸ ਵਿਰਸੇ ਦੀ ਪੰਜਾਬੀ ਭਾਸ਼ਾ ਦੇ ਹੋਰੇਕ ਵਰਗ ਨੂੰ ਉਨ੍ਹਾਂ ਦੀ ਸਮਾਜਿਕ ਮੂਲਾਂਕਣ ਅਤੇ ਆਦਰਸ਼ ਦਰਸ਼ਾਉਣ ਵਿੱਚ ਮਦਦ ਮਿਲਦੀ ਹੈ। ਵਿਰਸੇ ਦੀ ਧੁਨ ਅਤੇ ਬੋਲਚਾਲ ਨੇ ਸੁਣਨ ਵਾਲੇ ਦੀ ਆਤਮਾ ਨੂੰ ਆਵਾਜ਼ ਮਿਲਾਉਣ ਵਿੱਚ ਮਦਦ ਕੀਤੀ ਹੈ ਅਤੇ ਇਹ ਸੰਗੀਤ ਸੰਸਾਰ ਦੇ ਮਹਤਵਪੂਰਣ ਹਿੱਸੇ ਵਿੱਚ ਹਰ ਪਿੱਛੇ ਜਾਣ ਵਾਲੇ ਦੇ ਮਨ ਵਿੱਚ ਜਗਹ ਬਣਾ ਚੁੱਕੀ ਹੈ। ਪੰਜਾਬੀ ਵਿਰਸੇ ਨੇ ਸਮਾਜ ਦੇ ਸਾਂਝੇ ਮੂਲ ਅਤੇ ਮੁੱਖ ਮੁੱਦਿਆਂ ਦੀ ਚਰਚਾ ਕਰਨ ਵਿੱਚ ਏਕ ਮਹਤਵਪੂਰਣ ਰੋਲ ਅਦਾ ਕੀਤਾ ਹੈ ਅਤੇ ਇਸ ਵਿਰਸੇ ਨੂੰ ਸਮਾਜ ਵਿੱਚ ਸਦੈਵ ਯਾਦ ਰੱਖਣ ਦਾ ਮੌਕਾ ਦੇਣਾ ਚਾਹੀਦਾ ਹੈ।</p>
                            <div class="">
                                <i class=""></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row vertical_content_manage mt-5">
                    <div class="col-lg-6">
                        <div class="about_header_main mt-3">
                            <div class="about_icon_box">
<!--                                 <p class="text_custom font-weight-bold">Lorem Ipsum is simply dummy text</p> -->
                            </div>
                            <h4 class="about_heading text-capitalize font-weight-bold mt-4">ਸਾਡੇ ਬਾਰੇ</h4>
                            <p class="text-muted mt-3">ਏਸ ਵੈੱਬਸਾਈਟ ਸਾਡੇ ਵਿਰਸੇ ਤੇ ਸਾਡੀ ਮਾਂ ਬੋਲੀ ਪੰਜਾਬੀ ਨੂੰ ਸੰਭਾਲ ਕੇ ਰੱਖਣ ਅਤੇ ਪਰਮੋਟ ਕਰਨ ਲਈ ਬਣਾਈ ਗਈ ਹੈ ਉਮੀਦ ਕਰਦੇ ਆ ਤੁਸੀ ਬਹੁਤ ਪਿਆਰ ਦੋਗੇ ਆਪਣੇ ਦੋਸਤਾਂ ਅਤੇ ਰਿਸ਼ਤੇਦਾਰਾਂ ਨਾਲ ਸਾਂਝਾ ਕਰੋ ਅਤੇ ਆਪਣੇ ਵਿਰਸੇ ਨੂੰ ਲੋਕਾਂ ਤੱਕ ਪਹੁੰਚਾਉਣ ਲਈ ਸਾਡੀ ਮਦਦ ਕਰੋ ਜੀ.</p>

              <p class="text-muted mt-3">ਤੁਸੀ ਇਸ ਵੈੱਬਸਾਈਟ ਤੇ ਵਿਰਸੇ ਬਾਰੇ ਜਿਵੇਂ ਕਿ ਪੁਰਾਣੇ ਸਮੇਂ ਬਾਰੇ, ਬਚਪਨ ਬਾਰੇ , ਲਿਖਤਾਂ ਪੜ੍ਹ ਸਕਦੇ ਹੋ । ਲਿਖਤਾਂ ਪੜ੍ਹਨ ਲਈ <a href="#">ਲਿੰਕ</a> ਤੇ ਕਲਿੱਕ ਕਰੋ।</p>
              
              <p class="text-muted mt-3">ਜੇਕਰ ਤੁਸੀ ਵੀ ਆਵਦੀਆਂ ਲਿਖਤਾਂ ਇਸ ਵੈੱਬਸਾਈਟ ਤੇ ਪੌਸਟ ਕਰਨਾ ਚਾਹੁੰਦੇ ਹੋ ਤੇ <a href="#">ਲਿੰਕ</a> ਤੇ ਕਲਿੱਕ ਕਰਕੇ ਪੂਰੀ ਜਾਣਕਾਰੀ ਲਾਹ ਸਕਦੇ ਹੋ </p>

<!--                             <p class="text-muted mt-3"> Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage.</p> -->
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="img_about mt-3">
                            <img src="<?php echo site_url();?>/wp-content/uploads/2023/08/abhinav-sharma-Js76NA2Qnzg-unsplash-1-scaled.jpg" alt="" class="img-fluid mx-auto d-block">
                        </div>
                    </div>
                </div>
  </div>
              
        </section>

<section id="contact">
  
  <h1 class="section-header">Contact US</h1>
  
  <div class="contact-wrapper">
  
  <!-- Left contact page --> 
    
    <form id="contact-form" class="form-horizontal" role="form">
       
      <div class="form-group">
        <div class="col-sm-12">
          <input type="text" class="form-control" id="name" placeholder="NAME" name="name" value="" required>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-12">
          <input type="email" class="form-control" id="email" placeholder="EMAIL" name="email" value="" required>
        </div>
      </div>

      <textarea class="form-control" rows="10" placeholder="MESSAGE" name="message" required></textarea>
      
      <button class="btn btn-primary send-button" id="submit" type="submit" value="SEND">SEND
<!--         <div class="alt-send-button">
          <i class="fa fa-paper-plane"></i><span class="send-text">SEND</span>
        </div> -->
      
      </button>
      
    </form>
    
  <!-- Left contact page --> 
    
      <div class="direct-contact-container">

        <ul class="contact-list">
          <li class="list-item"><i class="fa fa-map-marker fa-2x"><span class="contact-text place">City, State</span></i></li>
          
          <li class="list-item"><i class="fa fa-phone fa-2x"><span class="contact-text phone"><a href="tel:1-212-555-5555" title="Give me a call">(212) 555-2368</a></span></i></li>
          
          <li class="list-item"><i class="fa fa-envelope fa-2x"><span class="contact-text gmail"><a href="mailto:#" title="Send me an email">hitmeup@gmail.com</a></span></i></li>
          
        </ul>

        <hr>

      </div>
    
  </div>
  
</section>  
  
<!-- </div -->

<?php 

get_footer();
?>