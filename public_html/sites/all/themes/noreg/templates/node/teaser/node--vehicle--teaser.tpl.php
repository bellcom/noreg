<?php if ($view_mode == 'teaser'): ?>
  <!-- Begin - teaser (node--vehicle--teaser.tpl.php) -->
  <article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> teaser"<?php print $attributes; ?>>

    <!-- Begin - body -->
    <div class="teaser-body">

      <!-- Begin - breed, location and price -->
      <section class="teaser-section-2-columns">

        <?php if (isset($animal_breed) && isset($user_location)): ?>
          <div class="teaser-section-column">

            <?php if (isset($animal_breed)): ?>
              <div class="teaser-breed-container">
                <p class="teaser-content-field"><?php print render($animal_breed); ?></p>
              </div>
            <?php endif ?>

            <?php if (isset($user_location)): ?>
              <div class="teaser-location-container">
                <p class="teaser-content-field"><?php print render($user_location); ?></p>
              </div>
            <?php endif ?>

          </div>
        <?php endif ?>

        <?php if (isset($litter_price_per_young)): ?>
          <div class="teaser-section-column">
            <div class="teaser-price-per-young-container">
              <p class="teaser-content-label"><?php print t('Pris pr. hvalp'); ?></p>
              <p class="teaser-content-field"><?php print render($litter_price_per_young); ?></p>
            </div>
          </div>
        <?php endif ?>

      </section>
      <!-- End - breed, location and price -->

      <!-- Begin - rating -->
      <section class="teaser-section-2-columns">
      </section>
      <!-- End - rating -->

      <!-- Begin - birth- and salesdate -->
      <section class="teaser-section-2-columns teaser-section-2-columns-bordered">

        <?php if (isset($litter_birthdate)): ?>
          <div class="teaser-section-column">
            <div class="teaser-birthdate-container">
              <p class="teaser-content-label"><?php print t('Fødselsdato'); ?></p>
              <p class="teaser-content-field"><?php print render($litter_birthdate); ?></p>
            </div>
          </div>
        <?php endif ?>

        <?php if (isset($content['field_sales_date'])): ?>
          <div class="teaser-section-column">
            <div class="teaser-sales-date-container">
              <p class="teaser-content-label"><?php print t('Salgsklar pr.'); ?></p>
              <?php print render($content['field_sales_date']); ?>
            </div>
          </div>
        <?php endif ?>

      </section>
      <!-- End - birth- and salesdate -->

      <!-- Begin - button -->
      <section>
        <div class="teaser-link-container">
          <?php print l(t('Vis annonce'), 'node/' . $node->nid, array('attributes' => array('class' => array('button', 'expand')))); ?>
        </div>
      </section>
      <!-- End - button -->

    </div>
    <!-- End - body -->

  </article>
  <!-- End - teaser -->
<?php endif; ?>
