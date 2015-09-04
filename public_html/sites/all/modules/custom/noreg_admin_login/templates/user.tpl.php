<?php
/**
 * @file
 * Template for Noreg login admin users.
 */
?>

<!-- Begin - user -->
<div class="col-md-6">
    <a href="/admin/login/form/<?php print $user->uid; ?>">
        <?php print $user->name; ?>
    </a>
</div>
<!-- End - user -->