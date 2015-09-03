<?php if ($view_mode == 'teaser'): ?>
  <!-- Begin - teaser (node--teaser.tpl.php) -->
  <article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> teaser"<?php print $attributes; ?>>

    <!-- Begin - full width image -->
    <?php if (isset($content['field_image'])) : ?>
      <div class="full-width-image">
        <?php print render($content['field_image']); ?>
      </div>
    <?php endif; ?>
    <!-- End - full width image -->

    <!-- Begin - body -->
    <div class="teaser-body">
    </div>
    <!-- End - body -->

  </article>
  <!-- End - teaser -->

<?php endif; ?>