<?php /*
* Template Name: Homepage
*/ get_header(); ?>

<main id="content">
   <?php 
      $hero_image = get_field('top_banner');
      $hero_url = $hero_image['sizes']['background-fullscreen'];
      $hero_alt = $hero_image['alt'];
   ?>

   <div id="welcome" class="hero-banner" style="background-image:url('<?php echo $hero_url; ?>')">
      <div class="container">
         <div class="row">
            <div class="columns-4">
               <div class="welcome-heading">
                  <?php 
                     $site_title = get_bloginfo('name');
                     $site_title_callout = get_field('title_callout');
                  ?>
                  <h1><?php echo $site_title; ?></h1>
                  <?php if($site_title_callout != ""){ ?>
                  <p><?php echo $site_callout; ?></p>
                  <?php } ?>
                  <!-- <a class="welcome button scroll-link" href="#project">About Us</a> -->
               </div>
            </div>
         </div>
         <div class="cta container">
            <a class="scroll-link" href="#project">
               <svg viewBox="0 0 101 60" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                   <title>Scroll Down</title>
                   <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                       <polygon id="Fill-2" fill="#FFFFFF" points="100.154993 9.77000044 91.3424934 0.957501066 50.1549927 42.5842911 9.02999318 0.894999816 0.154992743 9.77000044 50.1549927 59.7700004"></polygon>
                   </g>
               </svg>
            </a>
         </div>
      </div>
      <!-- <a class="button" href=""></a> -->
      <!-- <div class="has-parallax bg-image" style="background-image:url('<?php echo $hero_url; ?>')"></div> -->
   </div>
   <div id="project" class="panel green gradient overflow">
      <div class="container">
         <div class="row">
            <div class="columns-6">
               <?php 
                  $gs_title = get_field('gs_title');
                  $gs_description = get_field('gs_description');
               ?>
               <div class="panel-heading">
                     <h2><?php echo $gs_title; ?></h2>
               </div>
               <?php echo $gs_description; ?>
            </div>
            <div class="columns-6 map-container">
               <?php
                  $gs_bg = get_field('gs_bg');
                  $gs_bg_url = $gs_bg['sizes']['large'];
                  $gs_bg_alt = $gs_bg['alt'];
               ?>
               <div class="gmap" style="background-image:url('<?php echo $gs_bg_url; ?>');">
                  <span class="sr-only"><?php echo $gs_bg_alt;?></span>
               </div>
               <!-- <img src="https://maps.googleapis.com/maps/api/staticmap?center=40.653055,+-73.959605&zoom=17&scale=2&size=600x300&maptype=roadmap&key=AIzaSyDF0homieaRhM6dcMJdHAAjSx-ZboErVAo&format=png&visual_refresh=true&markers=size:mid%7Ccolor:0xff0000%7Clabel:%7C40.653055,+-73.959605" alt=""> -->
            </div>
         </div>
      </div>
   </div>
   <?php 
      $grid_section_bg = get_field('grid_section_background');
      $grid_bg_URL = $grid_section_bg['sizes']['background-fullscreen'];
   ?>
   <div id="benefits" class="panel white" style="background-image:url('<?php echo $grid_bg_URL; ?>');">
      <div class="panel-heading">
         <div class="container">
            <?php 
               $grid_title = get_field('grid_section_title');
               
            ?>
            <h2><?php echo $grid_title; ?></h2>
         </div>
      </div>
      <div class="container">
         
            <?php //start repeater here ?>
            <?php if (have_rows('grid_item')):
                  $g_cnt = 0; ?>
                  <div class="row grid-row">
                  <?php while(have_rows('grid_item')):the_row();
                  $g_cnt++;
            ?>
            <?php if ($g_cnt %4 == 0){?>
               </div><div class="row grid-row">
            <?php } 

               $grid_icon = get_sub_field('grid_item_icon');
               $grid_icon_url= $grid_icon['sizes']['small'];
               $grid_icon_alt = $grid_icon['alt'];
               $gi_title = get_sub_field('grid_item_title');
               $gi_description = get_sub_field('grid_item_description');
            ?>
             <div class="columns-4 benefit-card">
               <!-- <img src="<?php echo $grid_icon_url ?>" alt="<?php echo $grid_item_alt; ?>"> -->
               <div aria-hidden="true"><?php echo file_get_contents($grid_icon_url); ?></div>
               <p class="title"><?php echo $gi_title; ?></p>
               <p><?php echo $gi_description; ?></p>
            </div>
            <?php endwhile; endif; ?>
            </div><!-- ends row-->
         </div>
      </div>
   </div>
   <div id="press" class="panel green">
      <div class="panel-heading">
         <div class="container">
            <?php 

               $news_section_title = get_field('news_section_title');
            ?>
            <h2><?php echo $news_section_title; ?></h2>
         </div>
      </div>
      <div class="container">
         <div class="row">
         <?php if (have_rows('news_item')):
               $n_cnt=0;
               ?>
              <!--  <div class="row"> -->
               <?php
               while(have_rows('news_item')):the_row();
               $n_cnt++;
               $ni_url = get_sub_field('news_article_link');
               $ni_title = get_sub_field('news_item_title');
               $ni_image = get_sub_field('news_item_image');
               $ni_image_url = $ni_image['sizes']['large'];
               $ni_image_alt = $ni_image['alt'];
               $ni_desc = get_sub_field('news_item_body_copy');
               $ni_date = get_sub_field('news_item_date');

               if($n_cnt == 1){
                  $n_class = 'columns-6';
               }else{
                  $n_class = 'columns-3';
               }
                ?>
            <div class="<?php echo $n_class; ?>">
               <div class="press-story">
                  <!-- <div class="row"> -->
                     <?php if ($ni_image != ""){?>
                     <div class="press-thumbnail" style="background-image:url('<?php echo $ni_image_url; ?>')">
                        <span class="sr-only"><?php echo $ni_image_alt; ?></span>
                     </div>
                     <?php } ?>
                     <div class="press-text">
                        <h6 class="press-title"><?php echo $ni_title; ?></h6>
                        <p class="press-desc"><?php echo $ni_desc; ?></p>
                        <a class="press-url" href="<?php echo $ni_url; ?>" target="_blank" >Read the full article >></a>
                        <p class="press-date"><?php echo $ni_date; ?></p>
                     </div>
                  <!-- </div> -->
               </div>
            </div>
         <?php endwhile; endif; ?>
         </div><!--ends row -->
      </div> <!-- container -->
   </div>
   <?php 
      $us_img = get_field('section_background_image');
      $us_img_URL = $us_img['sizes']['background-fullscreen'];
      $update_title = get_field('project_section_title');   
   ?>
   <div id="news" class="panel white overflow news-panel" style="background-image:url('<?php echo $us_img_URL; ?>');">
      <div class="panel-heading">
         <div class="container">
            <h2><?php echo $update_title; ?></h2>
         </div>
      </div>
      <div class="container">
         <?php    
            $u_cnt = 0;
            if(have_rows('project_update_item')): ?>
         <div class="row grid-row">
         <?php
               while(have_rows('project_update_item')):the_row(); 
                  $u_cnt++;
                  $u_date = get_sub_field('pu_date');
                  $u_desc = get_sub_field('pu_description');

                  if ($u_cnt %4 == 0){?>
               </div><div class="row grid-row">
                  <?php }  ?>
            <div class="columns-4 news-item">
               <p class="news-date"><?php echo $u_date; ?></p>
               <p class="news-text"><?php echo $u_desc; ?></p>
            </div>
            <?php endwhile; endif; ?>
         </div><!-- end row-->
      </div>
   </div>

</main><!-- End of Content -->

<?php get_footer(); ?>
