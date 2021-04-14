<main>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-10">
        <?php if ($this->session->flashdata('msg')) : ?>
          <div class="alert alert-success" role="alert">
            <?= $this->session->flashdata('msg'); ?>
          </div>
        <?php endif; ?>

        <div class="d-flex flex-row justify-content-between align-items-center mt-3 mb-2">
          <h1>Pontos turísticos</h1>

          <?php if ($logged) : ?>
            <?= anchor("/touristSpot/create/", 'Adicionar ponto turistíco', 'class="btn btn-primary"') ?>
          <?php endif; ?>
        </div>

        <table class="table">
          <tr>
            <th>Nome</th>
            <th>Descrição</th>
            <?php if ($logged) : ?>
              <th>Ação</th>
            <?php endif; ?>
          </tr>

          <?php foreach ($touristSpots as $touristSpot) : ?>
            <tr>
              <td><?= $touristSpot->name; ?></td>
              <td><?= $touristSpot->description; ?></td>
              <?php if ($logged) : ?>
                <td>
                  <?= anchor("/touristSpot/edit/$touristSpot->id", 'Editar') ?>
                  <?= anchor("/touristSpot/delete/$touristSpot->id", 'Apagar') ?>
                </td>
              <?php endif; ?>
            </tr>
          <?php endforeach; ?>
        </table>
      </div>
    </div>
  </div>
</main>