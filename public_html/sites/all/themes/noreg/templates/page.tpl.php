<!-- Begin - outer wrapper -->
<div class="outer-wrapper">

  <!-- Begin - inner wrapper -->
  <div class="inner-wrapper">

    <!-- Begin - header -->
    <header class="header">
      <div class="container text-center">
        <a href="<?php print $front_page; ?>" class="header-logo" title="<?php print t('Home'); ?>"></a>
      </div>
    </header>
    <!-- End - header -->

    <!-- Begin - navigation -->
    <nav class="navigation">

    </nav>
    <!-- End - navigation -->

    <!-- Begin - navbar -->
    <header id="navbar" role="banner" class="<?php print $navbar_classes; ?>">
      <div class="<?php print $container_class; ?>">
        <div class="navbar-header">
          <?php if ($logo): ?>
            <a class="logo navbar-btn pull-left" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
              <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
            </a>
          <?php endif; ?>

          <?php if (!empty($site_name)): ?>
            <a class="name navbar-brand" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><?php print $site_name; ?></a>
          <?php endif; ?>

          <?php if (!empty($primary_nav) || !empty($secondary_nav) || !empty($page['navigation'])): ?>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only"><?php print t('Toggle navigation'); ?></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          <?php endif; ?>
        </div>

        <?php if (!empty($primary_nav) || !empty($secondary_nav) || !empty($page['navigation'])): ?>
          <div class="navbar-collapse collapse">
            <nav role="navigation">
              <?php if (!empty($primary_nav)): ?>
                <?php print render($primary_nav); ?>
              <?php endif; ?>
              <?php if (!empty($secondary_nav)): ?>
                <?php print render($secondary_nav); ?>
              <?php endif; ?>
              <?php if (!empty($page['navigation'])): ?>
                <?php print render($page['navigation']); ?>
              <?php endif; ?>
            </nav>
          </div>
        <?php endif; ?>
      </div>
    </header>
    <!-- End - navbar -->

    <!-- Begin - content -->
    <div class="content">
      <div class="container">
        <a id="main-content"></a>
        <?php print render($page['content']); ?>
      </div>
    </div>
    <!-- End - content -->

    <!-- Begin - footer -->
    <footer class="footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 text-center-xs-only">
            <p>Carefully crafted with <span class="icon fa fa-heart"></span> <a href="https://github.com/by-nissen/" target="_blank">@by-nissen</a></p>
          </div>
          <div class="col-sm-6 text-center-xs-only">

          </div>
        </div>
      </div>
    </footer>
    <!-- End - footer -->

  </div>
  <!-- End - inner wrapper -->

</div>
<!-- End - outer wrapper -->
