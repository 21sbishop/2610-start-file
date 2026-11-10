<?php
get_header();

while ( have_posts() ) :
  the_post();

  // The homepage content has its own hero <h1>, so only other pages show the title.
  if ( is_front_page() ) :
    the_content();
  else :
    ?>
    <section class="section">
      <div class="container page-content">
        <h1><?php the_title(); ?></h1>
        <?php the_content(); ?>
      </div>
    </section>
    <?php
  endif;
endwhile;

get_footer();
