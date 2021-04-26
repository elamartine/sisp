<main>
  <section>
    <div class="container py-2">
      <div class="row justify-content-end">
        <div class="col-12 col-md-10 col-lg-6 col-xl-4">
          <div>
            <input type="text" class="search-bar" placeholder="Pesquise por um ponto turístico" />
          </div>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="container py-3">
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xxl-4">
        <?php foreach ($touristSpots as $touristSpot) : ?>
          <div class="col py-rv-12">
            <button type="button" class="spot d-flex flex-column text-decoration-none color-initial rounded shadow h-100" data-spot='<?= json_encode($touristSpot); ?>'>
              <img src="<?= base_url("uploads/pictures/$touristSpot->path"); ?>" alt="Ponta Negra" class="thumb" />
              <div class="p-3 fz-14 w-100 flex-1 d-flex flex-column justify-content-between">
                <div>
                  <h2 class="fw-bold fz-14">
                    <?= $touristSpot->name ?>
                  </h2>
                  <p class="mb-3">
                    <?= $touristSpot->description ?>
                  </p>
                </div>
                <div class="d-flex align-items-center justify-content-end">
                  <img src="<?= base_url('assets/img/icons/location-orange.svg'); ?>" alt="Ícone de localização">
                  <span class="city ms-2"><?= $touristSpot->location; ?></span>
                </div>
              </div>
            </button>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
</main>

<?php if (!$logged) : ?>

  <div class="modal fade" id="modal-register">
    <div class="modal-dialog modal-dialog-centered user-modal">
      <div class="modal-content">
        <div class="modal-body p-rv-32">
          <h2 class="fw-semibold mb-rs-32 text-rv-black-1">Cadastre-se</h2>
          <?= form_open('user/store'); ?>
          <label for="email" class="custom-input">
            Email

            <?php if ($this->session->flashdata('hasWithEmail') || $this->session->flashdata('hasWithUserName')) : ?>
              <input type="email" id="email" name="email" placeholder="john@email.com" value="<?= $this->session->flashdata('errorDataRegister')['email']; ?>" required />
            <?php else : ?>
              <input type="email" id="email" name="email" placeholder="john@email.com" required />
            <?php endif; ?>

            <?php if ($this->session->flashdata('hasWithEmail')) : ?>
              <span class="text-danger fz-12 error-message"><?= $this->session->flashdata('hasWithEmail'); ?></span>
            <?php endif; ?>
          </label>
          <label for="name" class="custom-input">
            Nome

            <?php if ($this->session->flashdata('hasWithEmail') || $this->session->flashdata('hasWithUserName')) : ?>
              <input type="text" id="name" name="name" placeholder="John Cena" value="<?= $this->session->flashdata('errorDataRegister')['name']; ?>" required />
            <?php else : ?>
              <input type="text" id="name" name="name" placeholder="John Cena" required />
            <?php endif; ?>
          </label>
          <label for="userName" class="custom-input">
            Nome de Usuário

            <?php if ($this->session->flashdata('hasWithEmail') || $this->session->flashdata('hasWithUserName')) : ?>
              <input type="text" id="userName" name="userName" placeholder="john_cena" value="<?= $this->session->flashdata('errorDataRegister')['userName']; ?>" required />
            <?php else : ?>
              <input type="text" id="userName" name="userName" placeholder="john_cena" required />
            <?php endif; ?>

            <?php if ($this->session->flashdata('hasWithUserName')) : ?>
              <span class="text-danger fz-12 error-message"><?= $this->session->flashdata('hasWithUserName'); ?></span>
            <?php endif; ?>
          </label>
          <label for="password" class="custom-input">
            Senha

            <?php if ($this->session->flashdata('hasWithEmail') || $this->session->flashdata('hasWithUserName')) : ?>
              <input type="password" name="password" id="password" placeholder="********" value="<?= $this->session->flashdata('errorDataRegister')['password']; ?>" required />
            <?php else : ?>
              <input type="password" name="password" id="password" placeholder="********" required />
            <?php endif; ?>
          </label>
          <div class="d-flex flex-row align-items-end justify-content-between">
            <button type="button" class="text-decoration-underline border-0 bg-transparent p-0 text-rv-blue-1 fz-12" data-bs-toggle="modal" data-bs-target="#modal-login" data-bs-dismiss="modal">Login</button>
            <button type="submit" class="btn btn-rv-orange-1 fw-semibold">Cadastrar</button>
          </div>
          <?= form_close(); ?>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modal-login">
    <div class="modal-dialog modal-dialog-centered user-modal">
      <div class="modal-content">
        <div class="modal-body p-rv-32">
          <div class="mb-rs-32">
            <h2 class="fw-semibold mb-0 text-rv-black-1">Login</h2>
            <?php if ($this->session->flashdata('loginError')) : ?>
              <span class="text-danger fz-12"><?= $this->session->flashdata('loginError'); ?></span>
            <?php endif; ?>
          </div>
          <?= form_open('login/store'); ?>
          <label for="emailLogin" class="custom-input">
            Email

            <?php if ($this->session->flashdata('loginError')) : ?>
              <input type="email" id="emailLogin" name="email" placeholder="john@email.com" value="<?= $this->session->flashdata('errorDataLogin')['email']; ?>" required />
            <?php else : ?>
              <input type="email" id="emailLogin" name="email" placeholder="john@email.com" required />
            <?php endif; ?>
          </label>
          <label for="passwordLogin" class="custom-input">
            Senha

            <?php if ($this->session->flashdata('loginError')) : ?>
              <input type="password" name="password" id="passwordLogin" placeholder="********" value="<?= $this->session->flashdata('errorDataLogin')['password']; ?>" required />
            <?php else : ?>
              <input type="password" name="password" id="passwordLogin" placeholder="********" required />
            <?php endif; ?>
          </label>
          <div class="d-flex flex-row align-items-end justify-content-between">
            <button type="button" class="text-decoration-underline border-0 bg-transparent p-0 text-rv-blue-1 fz-12" data-bs-toggle="modal" data-bs-target="#modal-register" data-bs-dismiss="modal">Cadastre-se</button>
            <button type="submit" class="btn btn-rv-orange-1 fw-semibold">Entrar</button>
          </div>
          <?= form_close(); ?>
        </div>
      </div>
    </div>
  </div>

  <?php if ($this->session->flashdata('hasWithEmail') || $this->session->flashdata('hasWithUserName') || $this->session->flashdata('loginError')) : ?>
    <script src="<?= base_url('assets/js/register-modal-auth.js'); ?>"></script>
  <?php endif; ?>

  <?php if ($this->session->flashdata('hasWithEmail') || $this->session->flashdata('hasWithUserName')) : ?>
    <script>
      modalRegister.show();
    </script>
  <?php endif; ?>

  <?php if ($this->session->flashdata('loginError')) : ?>
    <script>
      modalLogin.show();
    </script>
  <?php endif; ?>

<?php else : ?>

  <div class="modal fade" id="modal-create-spot">
    <div class="modal-dialog modal-dialog-centered spot-modal">
      <div class="modal-content">
        <div class="modal-body p-rv-32">
          <h2 class="fw-semibold mb-rs-32 text-rv-black-1">Adicionar ponto turistíco</h2>
          <?= form_open('/touristSpot/store', array("enctype" => "multipart/form-data")); ?>
          <label for="nameSpot" class="custom-input">
            Nome

            <?php if ($this->session->flashdata('errorUpload')) : ?>
              <input type="text" id="nameSpot" name="name" placeholder="Praia da Redinha" value="<?= $this->session->flashdata('errorUploadData')['name']; ?>" required />
            <?php else : ?>
              <input type="text" id="nameSpot" name="name" placeholder="Praia da Redinha" required />
            <?php endif; ?>
          </label>

          <label for="descriptionSpot" class="custom-input">
            Descrição

            <?php if ($this->session->flashdata('errorUpload')) : ?>
              <textarea type="text" id="descriptionSpot" name="description" placeholder="Um lugar muito bacana" value="<?= $this->session->flashdata('errorUploadData')['description']; ?>" required></textarea>
            <?php else : ?>
              <textarea type="text" id="descriptionSpot" name="description" placeholder="Um lugar muito bacana" required></textarea>
            <?php endif; ?>
          </label>

          <div class="grid-thmb-pos">
            <div>
              <label for="thumb" class="custom-input">
                Foto de Destaque
                <input type="file" name="thumb" id="thumb" class="d-none" />
                <div class="bg-thumb">
                  <div class="label">
                    <img src="<?= base_url('assets/img/icons/image-add.svg'); ?>" alt="Ícone de upload">
                    <span class="text-rv-black-1 fw-semibold" id="title-img-upload">Fazer upload da imagem</span>
                  </div>
                </div>

                <?php if ($this->session->flashdata('errorUpload')) : ?>
                  <span class="text-danger fz-12 error-message"><?= $this->session->flashdata('errorUpload'); ?></span>
                <?php endif; ?>
              </label>
            </div>

            <div>
              <label for="map" class="custom-input">
                Localização
                <div id="map"></div>

                <span class="text-danger fz-12 error-message" id="alert-location">Selecione uma localização</span>

                <input type="hidden" id="lat" name="lat" required />
                <input type="hidden" id="lng" name="lng" required />
                <input type="hidden" id="location" name="location" required />
              </label>
            </div>
          </div>

          <div class="d-flex flex-row align-items-end justify-content-end">
            <button type="submit" class="btn btn-rv-blue-2 fw-semibold" id="submit-btn" disabled>Adicionar</button>
          </div>
          <?= form_close(); ?>
        </div>
      </div>
    </div>
  </div>

  <?php if ($this->session->flashdata('successStore')) : ?>
    <div class="toast align-items-center text-white bg-success border-0 position-fixed bottom-0 end-0 me-3 mb-3" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="d-flex">
        <div class="toast-body">
          <?= $this->session->flashdata('successStore'); ?>
        </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
    </div>

    <script>
      let toastEl = document.querySelector('.toast');
      let toast = new bootstrap.Toast(toastEl, {
        delay: 3000
      });

      toast.show();
    </script>
  <?php endif; ?>

  <script src="<?= base_url('assets/js/map.js'); ?>"></script>
  <script src="<?= base_url('assets/js/upload-thumb.js'); ?>"></script>
<?php endif; ?>

<div class="modal fade" id="spotModal">
  <div class="modal-dialog">
    <div class="modal-content position-relative">
      <div class="modal-body p-0">
        <img src="" alt="" id="img-spot" class="img-fluid rounded-top w-100" />
        <div id="map-modal"></div>
        <div class="p-rv-32">
          <div>
            <h1 id="title" class="fw-bold fz-24 mb-3"></h1>
            <p id="description" class="mb-0"></p>
          </div>
        </div>
      </div>
      <div class="validate-area">
        <a class="rounded-circle bg-success text-white p-2 d-flex border-0 text-decoration-none text-center" href="#" id="approve-spot">
          <i class="fas fa-check"></i>
        </a>
        <a class="rounded-circle bg-danger text-white p-2 d-flex border-0 text-decoration-none text-center" href="#" id="fail-spot">
          <i class="fas fa-times"></i>
        </a>
      </div>
    </div>
  </div>
</div>

<script src="<?= base_url('assets/js/register-modal-touristspot.js'); ?>"></script>
