<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title></title>
  <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.css') ?>">

  <style>
    body {
      height: 80vh;
      width: 100vw;
    }
  </style>
</head>

<body class="align-items-center d-flex">
  <div class="container main-content app-content">
    <div class="col-lg-5 col-md-6 mx-auto shadow-sm py-3 bg-light">
      <div class="h2 border-bottom d-inline-block pb-2 mx-auto font-weight-bold">
        Login Process
      </div>
      <!-- <?php if ($type == 'error' && $message && $message !== NULL) : ?>
        <div class="alert alert-danger">
          <?= $message ?>
        </div>
      <?php endif ?> -->
      <form action="<?= base_url('login/process_login') ?>" class="py-2 w-75" method="post">
        <input type="text" class="form-control bg-transparent mb-3" placeholder="NIK" name="NIK">
        <input type="password" class="form-control bg-transparent mb-3" placeholder="password" name="password">
        <button class="btn btn-secondary" type="submit">Sign in</button>
      </form>
    </div>
  </div>
</body>

</html>