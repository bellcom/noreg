<?php if ($view_mode == 'teaser_simple'): ?>
  <!-- Begin - teaser simple (node--sale-ad--teaser_simple.tpl.php) -->
  <article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> ha-teaser-simple"<?php print $attributes; ?>>

    <!-- Begin - full width image -->
    <?php if (isset($content['field_images'])) : ?>
      <div class="ha-full-width-image ha-image-cover-container">
        <?php print render($content['field_images']); ?>

        <?php if (isset($animal_breed) && isset($content['field_sales_date'])): ?>
        <!-- Begin - image cover -->
        <div class="ha-image-cover-content">
          <?php if (isset($animal_breed)): ?>
            <div class="ha-teaser-simple-breed-container">
              <h5 class="ha-teaser-simple-content-field"><?php print render($animal_breed); ?></h5>
            </div>
          <?php endif ?>

          <?php if (isset($content['field_sales_date'])): ?>
            <div class="ha-teaser-simple-sales-date-container">
              <div class="ha-teaser-simple-content-field"><small><?php print render($content['field_sales_date']); ?></small></div>
            </div>
          <?php endif ?>
        </div>
        <!-- End - image cover -->
        <?php endif ?>

      </div>
    <?php endif; ?>
    <!-- End - full width image -->

    <!-- Begin - body -->
    <div class="ha-teaser-simple-body">

      <!-- Begin - location, price and link -->
      <section class="ha-teaser-simple-section-2-columns">

        <?php if (isset($litter_price_per_young) && isset($user_location)): ?>
          <div class="ha-teaser-simple-section-column">

            <?php if (isset($user_location)): ?>
              <div class="ha-teaser-simple-location-container">
                <?php print render($user_location); ?>
              </div>
            <?php endif ?>

            <?php if (isset($litter_price_per_young)): ?>
              <div class="ha-teaser-simple-price-per-young-container">
                <p class="ha-teaser-simple-content-field"><?php print render($litter_price_per_young); ?> <?php print t('pr. hvalp'); ?></p>
              </div>
            <?php endif ?>

          </div>
        <?php endif ?>

        <div class="ha-teaser-simple-section-column">
          <div class="ha-teaser-simple-link-container">
            <?php print l(t('Vis'), 'node/' . $node->nid, array('attributes' => array('class' => array('button', 'right')))); ?>
          </div>
        </div>

      </section>
      <!-- End - location, price and link -->

    </div>
    <!-- End - body -->

  </article>
  <!-- End - teaser simple -->
<?php endif; ?>
