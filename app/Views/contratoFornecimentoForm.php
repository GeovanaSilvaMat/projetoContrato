<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Detalhes do Contratante</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5 mb-5">
    <div class="card">
      <div class="card-header">
        <h4>Detalhes do Contratante
          <a href="<?= base_url('contratante') ?>" class="btn btn-danger float-end">Voltar</a>
        </h4>
      </div>
      <form action="<?= base_url('contratante/update'); ?>" method="post">
        <div class="card-body">
          <input type="hidden" name="id" value="<?= esc($contratante->id ?? '') ?>">
          <div class="mb-3">
            <label>Razão Social</label>
            <input type="text" class="form-control bg-light" name="razaosocial" value="<?= esc($contratante->razaosocial ?? '') ?>">
          </div>
          <div class="mb-3">
            <label>CNPJ</label>
            <input type="text" class="form-control bg-light" name="cnpj" value="<?= esc($contratante->cnpj ?? '') ?>">
          </div>
          <div class="mb-3">
            <label>Email</label>
            <input type="email" class="form-control bg-light" name="email" value="<?= esc($contratante->email ?? '') ?>">
          </div>
          <div class="mb-3">
            <label>Endereço</label>
            <input type="text" class="form-control bg-light" name="logradouro" value="<?= esc($contratante->logradouro ?? '') ?>">
          </div>
          <div class="mb-3">
            <label>Cidade</label>
            <input type="text" class="form-control bg-light" name="cidade" value="<?= esc($contratante->cidade ?? '') ?>">
          </div>
          <div class="mb-3">
            <label>Estado</label>
            <input type="text" class="form-control bg-light" name="estado" value="<?= esc($contratante->estado ?? '') ?>">
          </div>
          <div class="mb-3">
            <label>Prazo Faturamento</label>
            <select class="form-control" name="faturamento_id">
              <?php foreach ($faturamento as $f): ?>
              <option value="<?= $f->id ?>" <?= ($f->id == ($contratante->faturamento_id ?? null)) ? 'selected' : '' ?>>
                <?= $f->prazo ?>
              </option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="mb-3">
            <label>Vencimento</label>
            <select class="form-control" name="faturamento_id">
              <?php foreach ($faturamento as $f): ?>
              <option value="<?= $f->id ?>" <?= ($f->id == ($contratante->faturamento_id ?? null)) ? 'selected' : '' ?>>
                <?= $f->vencimento ?>
              </option>
              <?php endforeach; ?>
            </select>
          </div>
          <h5 class="mt-4">Dados do Representante Legal</h5>
          <hr>
          <div class="mb-3">
            <label>Nome</label>
            <p class="form-control bg-light"><?= esc($contratante->representante_nome ?? '') ?></p>
          </div>
          <div class="mb-3">
            <label>Email do Representante</label>
            <p class="form-control bg-light"><?= esc($contratante->representante_email ?? '') ?></p>
          </div>
          <div class="mb-3">
            <label>Endereço do Representante</label>
            <p class="form-control bg-light">
              <?= esc($contratante->representante_logradouro ?? '') ?>,
              <?= esc($contratante->representante_cidade ?? '') ?> -
              <?= esc($contratante->representante_estado ?? '') ?>
            </p>
          </div>
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-success">Salvar</button>
        </div>
      </form>
    </div>
  </div>
</body>
</html>