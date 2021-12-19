<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="google-signin-client_id" content="341935830742-e37605411gr45otg22o765p1qthtfacd.apps.googleusercontent.com">
  <title>SISP</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

  <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
</head>

<body data-home="<?= base_url();  ?>">
  <header class="d-flex align-items-center sticky-top shadow">
    <div class="container py-3">
      <div class="row">
        <div class="col">
          <a href="<?= base_url('/') ?>">
            <img src="<?= base_url('assets/img/logo.png'); ?>" alt="Logo do Rosa dos Ventos" class="img-fluid brand" />
          </a>
        </div>
        <div class="col d-lg-none">
          <div class="h-100 d-flex align-items-center justify-content-end">
            <button class="hamburguer collapsed" data-bs-toggle="collapse" data-bs-target="#menu">
              <span class="line"></span>
              <span class="line"></span>
              <span class="line"></span>
            </button>
          </div>
        </div>

        <div class="col-12 col-lg-9">
          <div class="collapse d-lg-block h-lg-100" id="menu">
            <div class="h-lg-100 d-flex flex-column flex-lg-row align-items-end align-items-lg-center justify-content-lg-end pt-2 pt-lg-0">
              <?php if (!$logged) : ?>
                <button type="button" class="btn btn-rv-blue-2 fw-semibold" data-bs-toggle="modal" data-bs-target="#modal-login">Login</button>
                <button type="button" class="btn btn-rv-orange-1 fw-semibold" data-bs-toggle="modal" data-bs-target="#modal-register">Cadastre-se</button>
              <?php else : ?>
                <?php var_dump($this->session->userdata("user")); ?>
                <?php if ($this->session->userdata("user")->role !== 'common') : ?>
                  <?= anchor('moderate', 'Área de moderação', array('class' => 'btn btn-rv-blue-2 fw-semibold me-lg-2 mb-3 mb-lg-0')); ?>
                <?php endif; ?>

                <button type="button" class="btn btn-rv-orange-1 fw-semibold me-lg-5 d-none d-lg-block" data-bs-toggle="modal" data-bs-target="#modal-create-spot">Adicionar ponto turistíco</button>
                <div class="fz-14 text-white">
                  <div class="text-end">
                    Olá, <strong class="fz-16"><?= $this->session->userdata("user")->name; ?></strong>
                  </div>
                  <div class="text-end">
                    <strong class="fz-16">Seja bem-vindo, </strong>
                    <?= anchor('/login/delete', 'sair', 'class="text-white text-decoration-none"') ?>
                  </div>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <?php if ($logged) : ?>
    <button type="button" class="btn btn-rv-orange-1 fw-semibold me-md-5 special-btn d-lg-none rounded-0" data-bs-toggle="modal" data-bs-target="#modal-create-spot">Adicionar ponto turistíco</button>
  <?php endif ?>
