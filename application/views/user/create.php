<main>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-6">
        <h1>Criar usuário</h1>
        <?= form_open('user/store') ?>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" name="email" class="form-control" id="email" />
        </div>
        <div class="mb-3">
          <label for="name" class="form-label">Nome</label>
          <input type="text" name="name" class="form-control" id="name" />
        </div>
        <div class="mb-3">
          <label for="userName" class="form-label">Nome de usuário</label>
          <input type="text" name="userName" class="form-control" id="userName" />
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" id="password" />
        </div>
        <button type="submit" class="btn btn-primary mb-3">Cadastrar usuário</button>
        <?= form_close(); ?>
      </div>
    </div>
  </div>
</main>