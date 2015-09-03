<?php
/**
 * @file
 * html.tpl.php
 */
?>
<!DOCTYPE html>
<!--[if IE 7]><html class="ie7 no-js" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"<?php print $rdf_namespaces; ?>><![endif]-->
<!--[if lte IE 8]><html class="ie8 no-js" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"<?php print $rdf_namespaces; ?>><![endif]-->
<!--[if (gte IE 9)|!(IE)]><html class="not-ie no-js" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"<?php print $rdf_namespaces; ?> xmlns="http://www.w3.org/1999/html"><!--<![endif]-->
<head>

  <title><?php print $head_title; ?></title>
  <meta http-equiv="content-language" content="da,en">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <?php print $head; ?>

  <!-- Begin - internal stylesheet -->
  <?php print $styles; ?>
  <!-- End - internal stylesheet -->

  <!-- Begin - internal javascript files -->

  <!--[if lt IE 9]>
  <!--<script src="<?php print $path_js . '/ie9-lt.min.js'; ?>"></script>-->
  <![endif]-->
  <!-- End - internal javascript files -->

  <!-- Begin - icons -->
  <link rel="shortcut icon" href="<?php print $path_img . '/icons/favicon.ico'; ?>">

  <link rel="apple-touch-icon" href="<?php print $path_img . '/icons/apple-touch-icon-precomposed.png'; ?>">
  <link rel="apple-touch-icon" sizes="72x72" href="<?php print $path_img . '/icons/apple-touch-icon-72x72-precomposed.png'; ?>">
  <link rel="apple-touch-icon" sizes="114x114" href="<?php print $path_img . '/icons/apple-touch-icon-114x114-precomposed.png'; ?>">
  <link rel="apple-touch-icon" sizes="144x144" href="<?php print $path_img . '/icons/apple-touch-icon-144x144-precomposed.png'; ?>">
  <!-- End - icons -->

</head>
<body class="<?php print $classes; ?>"<?php print $attributes; ?>>

<!-- Begin - skip link -->
<div id="skip-link" class="show-on-focus">
  <a href="#content" class="element-invisible element-focusable">
    <?php print t('Skip to main content'); ?>
  </a>
</div>
<!-- End - skip link -->

<?php print $page_top; ?>
<?php print $page; ?>

  <!-- Begin - load javascript files -->
  <?php print $scripts; ?>
  <!-- End - load javascript files -->

<?php print $page_bottom; ?>

</body>
</html>