<?php
/**
 * Fallback template for the blog, single posts, pages, and archives,
 * laid out with the site's section and container styles.
 *
 * @package Discover_Orem
 */

get_header();
?>

  <main id="main">
    <section class="section">
      <div class="container">
        <?php if ( is_home() || is_archive() || is_search() ) : ?>
          <h1 class="section__title">
            <?php
            if ( is_search() ) {
                /* translators: %s: search query. */
                printf( esc_html__( 'Search results for: %s', 'discover-orem' ), esc_html( get_search_query() ) );
            } elseif ( is_archive() ) {
                the_archive_title();
            } else {
                single_post_title();
            }
            ?>
          </h1>
        <?php endif; ?>

        <?php if ( have_posts() ) : ?>
          <?php
          while ( have_posts() ) :
              the_post();
              ?>
            <article <?php post_class(); ?>>
              <?php if ( is_singular() ) : ?>
                <h1 class="section__title"><?php the_title(); ?></h1>
                <div class="section__lede"><?php the_content(); ?></div>
              <?php else : ?>
                <h2 class="card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <div class="card__text"><?php the_excerpt(); ?></div>
              <?php endif; ?>
            </article>
          <?php endwhile; ?>

          <?php the_posts_navigation(); ?>
        <?php else : ?>
          <p class="section__lede"><?php esc_html_e( 'Nothing found.', 'discover-orem' ); ?></p>
        <?php endif; ?>
      </div>
    </section>
  </main>

<?php
get_footer();
