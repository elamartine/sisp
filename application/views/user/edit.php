<main>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-6">
        <h1>Editar usuário</h1>
        <?= form_open("/user/update/$user->id"); ?>
        <div class="mb-3">
          <label for="id" class="form-label">ID</label>
          <input type="number" class="form-control" id="id" value="<?= $user->id; ?>" disabled>
        </div>
        <div class="mb-3">
          <label for="name" class="form-label">Nome</label>
          <input type="text" class="form-control" id="name" placeholder="John Cena" name="name" value="<?= $user->name; ?>">
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" placeholder="john@email.com" name="email" value="<?= $user->email; ?>">
        </div>
        <div class="mb-3">
          <label for="userName" class="form-label">Nome de usuário</label>
          <input type="text" class="form-control" id="userName" placeholder="johncena" name="userName" value="<?= $user->username; ?>">
        </div>
        <button type="submit" class="btn btn-primary mb-3">Atualizar usuário</button>
        <?= form_close(); ?>
      </div>
    </div>
  </div>
</main>