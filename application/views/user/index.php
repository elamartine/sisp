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
          <h1>Usuários</h1>

          <?= anchor("/user/create/", 'Criar Usuário', 'class="btn btn-primary"') ?>
        </div>

        <table class="table">
          <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Nome</th>
            <th>Nome de Usuário</th>
            <th>Ação</th>
          </tr>

          <?php foreach ($users as $user) : ?>
            <tr>
              <td><?= $user->id; ?></td>
              <td><?= $user->email; ?></td>
              <td><?= $user->name; ?></td>
              <td><?= $user->username; ?></td>
              <td>
                <?= anchor("/user/edit/$user->id", 'Editar') ?>
                <?= anchor("/user/delete/$user->id", 'Apagar') ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </table>
      </div>
    </div>
  </div>
</main>