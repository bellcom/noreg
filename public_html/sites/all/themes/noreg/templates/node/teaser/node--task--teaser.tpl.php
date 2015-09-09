<?php if ($view_mode == 'teaser'): ?>
  <!-- node--task--teaser.tpl.php -->
  <!-- Begin - teaser -->
  <article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> noreg-teaser"<?php print $attributes; ?>>

    <!-- Begin - heading -->
    <div class="noreg-teaser-heading">
      <h3 class="noreg-teaser-title"><a href="<?php print $base_url . $node_url; ?>"><?php print $title; ?></a></h3>
    </div>
    <!-- End - heading -->

    <!-- Begin - body -->
    <div class="noreg-teaser-body">

      <?php if (isset($content['field_starting_date'])): ?>
        <!-- Begin - starting date -->
        <div class="noreg-teaser-body-starting-date">
          <?php print render($content['field_starting_date']); ?>
        </div>
        <!-- End - starting date -->
      <?php endif; ?>

      <?php if (isset($content['field_vehicle'])): ?>
        <!-- Begin - vehicle -->
        <div class="noreg-teaser-vehicle">
          <?php print render($content['field_vehicle']); ?>
        </div>
        <!-- End - vehicle -->
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
        <a href="<?php print $base_url . $node_url; ?>" class="btn btn-primary btn-loader"><?php print t('Vis opgave'); ?> <span class="icon fa fa-arrow-right"></span></a>
      </div>
      <!-- End - action -->

    </div>
    <!-- End - body -->

    <!-- Begin - footer -->
    <?php if (isset($content['field_invoice_no'])): ?>
      <div class="noreg-teaser-footer">

        <?php if (isset($content['field_invoice_no'])): ?>
          <!-- Begin - order number -->
          <span class="noreg-teaser-footer-button" data-toggle="tooltip" title="<?php print t('Faktura nr.'); ?>">
          <span class="icon fa fa-file-text-o"></span>
            <?php print render($content['field_invoice_no']); ?>
        </span>
          <!-- End - order number -->
        <?php endif; ?>

      </div>
    <?php endif; ?>
    <!-- End - footer -->

  </article>
  <!-- End - teaser -->

<?php endif; ?>
