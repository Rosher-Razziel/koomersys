<!DOCTYPE html>
<html lang="es">

<head>
  <?= view('templates/header'); ?>
</head>

<body class="app">
  <header class="app-header fixed-top">
    <?= view('templates/nav'); ?>
    <?= view('templates/sidebar'); ?>
  </header>

  <div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
      <div class="container-xl">

        <h1 class="app-page-title">Products</h1>

      </div>
    </div>
    <?= view('templates/footer'); ?>
  </div>
  <?= view('templates/scripts'); ?> 
</body>

</html>