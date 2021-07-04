<!DOCTYPE html>
<html lang="en">

<head>
  <?= $this->include('templates/header') ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <?= $this->include('templates/nav') ?>

  <div class="container my-3">
    <?= $this->renderSection('content') ?>
  </div>
    
  <?= $this->include('templates/footer') ?>
</body>

</html>