<main>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-6">
        <h1>Editar ponto turistíco</h1>
        <?= form_open("touristSpot/update/$touristSpot->id") ?>
        <div class="mb-3">
          <label for="id" class="form-label">Nome</label>
          <input type="text" class="form-control" id="id" disabled value="<?= $touristSpot->id; ?>" />
        </div>
        <div class="mb-3">
          <label for="name" class="form-label">Nome</label>
          <input type="text" name="name" class="form-control" id="name" value="<?= $touristSpot->name; ?>" />
        </div>
        <div class="mb-3">
          <label for="description" class="form-label">Descrição</label>
          <input type="text" name="description" class="form-control" id="description" value="<?= $touristSpot->description; ?>" />
        </div>
        <button type="submit" class="btn btn-primary mb-3">Cadastrar usuário</button>
        <?= form_close(); ?>
      </div>
    </div>
  </div>
</main>