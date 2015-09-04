<?php if ($view_mode == 'list'): ?>
  <!-- node--list.tpl.php -->
  <!-- Begin - list -->
  <section id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> noreg-list"<?php print $attributes; ?>>

    <!-- Begin - heading -->
    <div class="noreg-list-heading">
      <h3 class="noreg-list-title"><a href="<?php print $base_url . $node_url; ?>"><?php print $title; ?></a></h3>
    </div>
    <!-- End - heading -->

    <!-- Begin - body -->
    <div class="noreg-list-body">
    </div>
    <!-- End - body -->

  </section>
  <!-- End - list -->

<?php endif; ?>
