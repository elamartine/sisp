<main>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-8">
        <h1>Login</h1>
        <?= form_open('/login/store'); ?>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" name="email" class="form-control" id="email" placeholder="john@email.com" />
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Senha</label>
          <input type="password" name="password" class="form-control" id="password" placeholder="********" />
        </div>
        <button type="submit" class="btn btn-primary mb-3">Login</button>
        <?= form_close(); ?>
      </div>
    </div>
  </div>
</main>