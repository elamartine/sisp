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
        <div class="col py-rv-12">
          <a class="spot d-block flex-row text-decoration-none color-initial rounded shadow" href="#">
            <img src="<?= base_url('assets/img/spot.png') ?>" alt="Ponta Negra" class="thumb" />
            <div class="p-3 fz-14">
              <h2 class="fw-bold fz-14">
                Praia de Ponta Negra
              </h2>
              <p class="mb-3">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus pellentesque diam nec posuere blandit.
                Mauris a augue eu nunc posuere rhoncus. Class aptent taciti sociosqu ad litora torquent per conubia.
              </p>
              <div class="d-flex align-items-center justify-content-end">
                <img src="<?= base_url('assets/img/icons/location-orange.svg'); ?>" alt="Ícone de localização">
                <span class="city ms-2">Natal, RN</span>
              </div>
            </div>
          </a>
        </div>
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
            <input type="email" id="email" name="email" placeholder="john@email.com" required />
          </label>
          <label for="name" class="custom-input">
            Nome
            <input type="text" id="name" name="name" placeholder="John Cena" required />
          </label>
          <label for="userName" class="custom-input">
            Nome de Usuário
            <input type="text" id="userName" name="userName" placeholder="john_cena" required />
          </label>
          <label for="password" class="custom-input">
            Senha
            <input type="password" name="password" id="password" placeholder="********" required />
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
          <h2 class="fw-semibold mb-rs-32 text-rv-black-1">Login</h2>
          <?= form_open('login/store'); ?>
          <label for="emailLogin" class="custom-input">
            Email
            <input type="email" id="emailLogin" name="email" placeholder="john@email.com" required />
          </label>
          <label for="passwordLogin" class="custom-input">
            Senha
            <input type="password" name="password" id="passwordLogin" placeholder="********" required />
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

<?php else : ?>

  <div class="modal fade" id="modal-create-spot">
    <div class="modal-dialog modal-dialog-centered spot-modal">
      <div class="modal-content">
        <div class="modal-body p-rv-32">
          <h2 class="fw-semibold mb-rs-32 text-rv-black-1">Adicionar ponto turistíco</h2>
          <?= form_open(''); ?>
          <label for="nameSpot" class="custom-input">
            Nome
            <input type="text" id="nameSpot" name="name" placeholder="Praia da Redinha" required />
          </label>

          <div class="grid-thmb-pos">
            <div>
              <label for="thumb" class="custom-input">
                Foto de Destaque
                <input type="file" name="thumb" id="thumb" class="d-none" />
                <div class="bg-thumb">
                  <div class="label">
                    <img src="<?= base_url('assets/img/icons/image-add.svg'); ?>" alt="Ícone de upload">
                    <span class="text-rv-black-1 fw-semibold">Fazer upload da imagem</span>
                  </div>
                </div>
              </label>
            </div>
            <div>
              <label for="map" class="custom-input">
                Localização
                <div id="map"></div>

                <input type="hidden" id="lat" name="lat" />
                <input type="hidden" id="lng" name="lng" />
              </label>
            </div>
          </div>

          <div class="d-flex flex-row align-items-end justify-content-end">
            <button type="submit" class="btn btn-rv-blue-2 fw-semibold">Adicionar</button>
          </div>
          <?= form_close(); ?>
        </div>
      </div>
    </div>
  </div>

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDrrB9We9tVcHsIjQmiEC0sIyMCIgxVtz0&callback=initMap&libraries=&v=weekly" async></script>
  <script src="<?= base_url('assets/js/map.js'); ?>"></script>
<?php endif; ?>