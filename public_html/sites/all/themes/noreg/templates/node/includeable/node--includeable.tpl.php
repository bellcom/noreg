<?php if ($view_mode == 'includeable'): ?>
  <!-- node--includeable.tpl.php -->
  <!-- Begin - includeable -->
  <article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> noreg-includeable"<?php print $attributes; ?>>

    <!-- Begin - heading -->
    <div class="noreg-includeable-heading">
      <h3 class="noreg-includeable-title"><a href="<?php print $base_url . $node_url; ?>"><?php print $title; ?></a></h3>
    </div>
    <!-- End - heading -->

    <!-- Begin - body -->
    <div class="noreg-includeable-body">
    </div>
    <!-- End - body -->

  </article>
  <!-- End - includeable -->

<?php endif; ?>
