<?php if ($view_mode == 'includeable'): ?>
  <!-- node--customer--includeable.tpl.php -->
  <!-- Begin - includeable -->
  <article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> noreg-includeable"<?php print $attributes; ?>>

    <!-- Begin - heading -->
    <div class="noreg-includeable-heading">
      <h3 class="noreg-includeable-title"><a href="<?php print $base_url . $node_url; ?>"><?php print $title; ?></a></h3>
    </div>
    <!-- End - heading -->

    <!-- Begin - body -->
    <div class="noreg-includeable-body">

      <?php if (isset($content['field_email_addresses'])): ?>
        <!-- Begin - email addresses -->
        <div class="noreg-includeable-body-email-addresses">
          <?php print render($content['field_email_addresses']); ?>
        </div>
        <!-- End - email addresses -->
      <?php endif; ?>

      <?php if (isset($content['field_phone_customer_no'])): ?>
        <!-- Begin - customer/phone number -->
        <div class="noreg-includeable-body-phone-customer-number">
          <?php print render($content['field_phone_customer_no']); ?>
        </div>
        <!-- End - customer/phone number -->
      <?php endif; ?>

    </div>
    <!-- End - body -->

  </article>
  <!-- End - includeable -->

<?php endif; ?>
