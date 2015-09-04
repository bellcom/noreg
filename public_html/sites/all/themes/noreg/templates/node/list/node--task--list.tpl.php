<?php if ($view_mode == 'list'): ?>
  <!-- node--task--list.tpl.php -->
  <!-- Begin - list -->
  <section id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> noreg-list"<?php print $attributes; ?>>

    <!-- Begin - heading -->
    <div class="noreg-list-heading">
      <h3 class="noreg-list-title"><a href="<?php print $base_url . $node_url; ?>"><?php print $title; ?></a></h3>
    </div>
    <!-- End - heading -->

    <!-- Begin - body -->
    <div class="noreg-list-body">

      <?php if (isset($content['field_starting_date'])): ?>
        <!-- Begin - starting date -->
        <div class="noreg-list-body-starting-date">
          <?php print render($content['field_starting_date']); ?>
        </div>
        <!-- End - starting date -->
      <?php endif; ?>

      <?php if (isset($content['field_vehicle'])): ?>
        <!-- Begin - vehicle -->
        <div class="noreg-list-body-vehicle">
          <?php print render($content['field_vehicle']); ?>
        </div>
        <!-- End - vehicle -->
      <?php endif; ?>

    </div>
    <!-- End - body -->

  </section>
  <!-- End - list -->

<?php endif; ?>
