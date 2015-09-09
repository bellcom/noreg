<?php if ($view_mode == 'teaser'): ?>
  <!-- node--vehicle--teaser.tpl.php -->
  <!-- Begin - teaser -->
  <article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> noreg-teaser"<?php print $attributes; ?>>

    <!-- Begin - heading -->
    <div class="noreg-teaser-heading">
      <h3 class="noreg-teaser-title"><a href="<?php print $base_url . $node_url; ?>"><?php print $title; ?></a></h3>
    </div>
    <!-- End - heading -->

    <!-- Begin - body -->
    <div class="noreg-teaser-body">

      <?php if (isset($content['field_registration_date'])): ?>
        <!-- Begin - registration date -->
        <div class="noreg-teaser-body-registration-date">
          <?php print render($content['field_registration_date']); ?>
        </div>
        <!-- End - registration date -->
      <?php endif; ?>

      <?php if (isset($content['field_license_plate'])): ?>
        <!-- Begin - license plate -->
        <div class="noreg-teaser-body-license-plate">
          <?php print render($content['field_license_plate']); ?>
        </div>
        <!-- End - license plate -->
      <?php endif; ?>

      <?php if (isset($content['field_brand'])): ?>
        <!-- Begin - brand -->
        <div class="noreg-teaser-body-brand">
          <?php print render($content['field_brand']); ?>
        </div>
        <!-- End - brand -->
      <?php endif; ?>

      <?php if (isset($content['field_vin_no'])): ?>
        <!-- Begin - VIN number -->
        <div class="noreg-teaser-body-vin-number">
          <?php print render($content['field_vin_no']); ?>
        </div>
        <!-- End - VIN number -->
      <?php endif; ?>

      <?php if (isset($content['field_customer'])): ?>
        <!-- Begin - customer -->
        <div class="noreg-teaser-body-customer">
          <?php print render($content['field_customer']); ?>
        </div>
        <!-- End - customer -->
      <?php endif; ?>

      <!-- Begin - action -->
      <div class="noreg-teaser-body-action-button">
        <a href="<?php print $base_url . $node_url; ?>" class="btn btn-primary btn-loader"><?php print t('Vis køretøj'); ?> <span class="icon fa fa-arrow-right"></span></a>
      </div>
      <!-- End - action -->

    </div>
    <!-- End - body -->

    <!-- Begin - footer -->
    <?php if (isset($content['field_license_plate'])): ?>
      <div class="noreg-teaser-footer">

        <?php if (isset($content['field_license_plate'])): ?>
          <!-- Begin - license plate -->
          <span class="noreg-teaser-footer-button" data-toggle="tooltip" title="<?php print t('Reg. nr.'); ?>">
          <span class="icon fa fa-car"></span>
            <?php print render($content['field_license_plate']); ?>
        </span>
          <!-- End - license plate -->
        <?php endif; ?>

      </div>
    <?php endif; ?>
    <!-- End - footer -->

  </article>
  <!-- End - teaser -->

<?php endif; ?>
