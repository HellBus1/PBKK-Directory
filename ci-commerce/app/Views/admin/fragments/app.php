<!DOCTYPE html>
<html lang="en">

<head>
  <?= $this->include('admin/fragments/header') ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div id="wrapper">
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="<?= base_url('dist/img/AdminLTELogo.png') ?>" alt="AdminLTELogo" height="60" width="60">
    </div>
    
    <?= $this->include('admin/fragments/navbar') ?>
    
    <?= $this->include('admin/fragments/sidebar') ?>

    <?= $this->renderSection('content') ?>
    
  </div>
  <?= $this->include('admin/fragments/footer') ?>
</body>

</html>