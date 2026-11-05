<?php
/**
 * Homepage: the Discover Orem hero, Why Orem cards, and Plan a Visit section.
 *
 * @package Discover_Orem
 */

get_header();
?>

  <main id="main">
 
    <section class="hero" id="hero">
      <div class="hero__media" role="img" aria-label="Golden-hour view of the Wasatch mountains and fall foliage in Provo Canyon, Utah"></div>
      <div class="hero__scrim"></div>
      <div class="container hero__content">
        <p class="hero__eyebrow">Utah County · Foot of Mt. Timpanogos</p>
        <h1 class="hero__title">A mountain town worth exploring.</h1>
        <p class="hero__subtitle">
          Trailheads, Utah Lake sunsets, and a close-knit community — all
          fifteen minutes from the city.
        </p>
        <a class="button button--primary" href="#features">See what's here</a>
      </div>
    </section>

   
    <section class="section" id="features">
      <div class="container">
        <p class="section__eyebrow">Why Orem</p>
        <h2 class="section__title">Three reasons locals never leave.</h2>
        <p class="section__lede">
          Orem sits where the mountains meet the lake — close enough to
          Salt Lake City for a commute, far enough to actually breathe.
        </p>

        <div class="card-grid">
          <article class="card">
            <div class="card__icon card__icon--primary" aria-hidden="true">▲</div>
            <h3 class="card__title">The Mountain</h3>
            <p class="card__text">
              Mt. Timpanogos anchors the skyline, with trailheads for
              every skill level just minutes from downtown.
            </p>
          </article>

          <article class="card">
            <div class="card__icon card__icon--secondary" aria-hidden="true">●</div>
            <h3 class="card__title">The Lake</h3>
            <p class="card__text">
              Utah Lake's shoreline is a five-minute drive for sunset
              walks, paddleboarding, and quiet evenings.
            </p>
          </article>

          <article class="card">
            <div class="card__icon card__icon--primary" aria-hidden="true">◆</div>
            <h3 class="card__title">The Community</h3>
            <p class="card__text">
              Farmers markets, UVU events, and a downtown that actually
              fills up on a Friday night.
            </p>
          </article>
        </div>
      </div>
    </section>

    
    <section class="section section--alt" id="visit">
      <div class="container visit">
        <div class="visit__text">
          <p class="section__eyebrow">Plan a visit</p>
          <h2 class="section__title">Start at the trailhead, end at the lake.</h2>
          <p class="section__lede">
            Most visitors spend the morning on the Bonneville Shoreline
            Trail, grab lunch downtown, then catch the sunset from Utah
            Lake State Park. It's an easy day, and a good one.
          </p>
          <a class="button button--secondary" href="#hero">Back to top</a>
        </div>
        <div class="visit__panel">
          <dl class="stat-list">
            <div class="stat">
              <dt class="stat__label">Elevation</dt>
              <dd class="stat__value">4,774 ft</dd>
            </div>
            <div class="stat">
              <dt class="stat__label">From SLC</dt>
              <dd class="stat__value">~35 min</dd>
            </div>
            <div class="stat">
              <dt class="stat__label">Trailheads</dt>
              <dd class="stat__value">12+</dd>
            </div>
          </dl>
        </div>
      </div>
    </section>
  </main>

<?php
get_footer();
