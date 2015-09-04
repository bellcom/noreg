<?php if ($view_mode == 'list'): ?>
  <!-- Begin - teaser (node--vehicle--list.tpl.php) -->
  <article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> noreg-list"<?php print $attributes; ?>>

    <!-- Begin - body -->
    <div class="noreg-list-body">

      <!-- Begin - breed, location and price -->
      <section class="noreg-list-section-2-columns">

        <?php if (isset($animal_breed) && isset($user_location)): ?>
          <div class="noreg-list-section-column">

            <?php if (isset($animal_breed)): ?>
              <div class="noreg-list-breed-container">
                <p class="noreg-list-content-field"><?php print render($animal_breed); ?></p>
              </div>
            <?php endif ?>

            <?php if (isset($user_location)): ?>
              <div class="noreg-list-location-container">
                <p class="noreg-list-content-field"><?php print render($user_location); ?></p>
              </div>
            <?php endif ?>

          </div>
        <?php endif ?>

        <?php if (isset($litter_price_per_young)): ?>
          <div class="noreg-list-section-column">
            <div class="noreg-list-price-per-young-container">
              <p class="noreg-list-content-label"><?php print t('Pris pr. hvalp'); ?></p>
              <p class="noreg-list-content-field"><?php print render($litter_price_per_young); ?></p>
            </div>
          </div>
        <?php endif ?>

      </section>
      <!-- End - breed, location and price -->

      <!-- Begin - rating -->
      <section class="noreg-list-section-2-columns">
      </section>
      <!-- End - rating -->

      <!-- Begin - birth- and salesdate -->
      <section class="noreg-list-section-2-columns noreg-list-section-2-columns-bordered">

        <?php if (isset($litter_birthdate)): ?>
          <div class="noreg-list-section-column">
            <div class="noreg-list-birthdate-container">
              <p class="noreg-list-content-label"><?php print t('Fødselsdato'); ?></p>
              <p class="noreg-list-content-field"><?php print render($litter_birthdate); ?></p>
            </div>
          </div>
        <?php endif ?>

        <?php if (isset($content['field_sales_date'])): ?>
          <div class="noreg-list-section-column">
            <div class="noreg-list-sales-date-container">
              <p class="noreg-list-content-label"><?php print t('Salgsklar pr.'); ?></p>
              <?php print render($content['field_sales_date']); ?>
            </div>
          </div>
        <?php endif ?>

      </section>
      <!-- End - birth- and salesdate -->

      <!-- Begin - button -->
      <section>
        <div class="noreg-list-link-container">
          <?php print l(t('Vis annonce'), 'node/' . $node->nid, array('attributes' => array('class' => array('button', 'expand')))); ?>
        </div>
      </section>
      <!-- End - button -->

    </div>
    <!-- End - body -->

  </article>
  <!-- End - teaser -->
<?php endif; ?>
