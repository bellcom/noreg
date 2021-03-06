<?php if ($view_mode == 'list'): ?>
  <!-- node--vehicle--list.tpl.php -->
  <!-- Begin - list -->
  <section id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> noreg-list"<?php print $attributes; ?>>

    <!-- Begin - heading -->
    <div class="noreg-list-heading">
      <h3 class="noreg-list-title"><a href="<?php print $base_url . $node_url; ?>"><?php print $title; ?></a></h3>
    </div>
    <!-- End - heading -->

    <!-- Begin - body -->
    <div class="noreg-list-body">

      <?php if (isset($content['field_license_plate'])): ?>
        <!-- Begin - license plate -->
        <div class="noreg-list-body-license-plate">
          <?php print render($content['field_license_plate']); ?>
        </div>
        <!-- End - license plate -->
      <?php endif; ?>

      <?php if (isset($content['field_status'])): ?>
        <!-- Begin - status -->
        <div class="noreg-list-body-status">
          <?php print render($content['field_status']); ?>
        </div>
        <!-- End - status -->
      <?php endif; ?>

    </div>
    <!-- End - body -->

  </section>
  <!-- End - list -->

<?php endif; ?>
