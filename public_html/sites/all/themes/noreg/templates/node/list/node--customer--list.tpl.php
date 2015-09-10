<?php if ($view_mode == 'list'): ?>
  <!-- node--customer--list.tpl.php -->
  <!-- Begin - list -->
  <section id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> noreg-list"<?php print $attributes; ?>>

    <!-- Begin - heading -->
    <div class="noreg-list-heading">
      <h3 class="noreg-list-title"><a href="<?php print $base_url . $node_url; ?>"><?php print $title; ?></a></h3>
    </div>
    <!-- End - heading -->

    <!-- Begin - body -->
    <div class="noreg-list-body">

      <?php if (isset($content['field_email_addresses'])): ?>
        <!-- Begin - email addresses -->
        <div class="noreg-list-body-email-addresses">
          <?php print render($content['field_email_addresses']); ?>
        </div>
        <!-- End - email addresses -->
      <?php endif; ?>

      <?php if (isset($content['field_phone_customer_no'])): ?>
        <!-- Begin - customer/phone number -->
        <div class="noreg-list-body-phone-customer-number">
          <?php print render($content['field_phone_customer_no']); ?>
        </div>
        <!-- End - customer/phone number -->
      <?php endif; ?>

    </div>
    <!-- End - body -->

  </section>
  <!-- End - list -->

<?php endif; ?>
