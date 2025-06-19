<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>cliente CNPJ</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('style.css') ?>">
</head>
<body>
  <div class="container mt-5">
    <h2>CONSULTA CLIENTE</h2>
    <hr>
    <form action="<?= base_url('contratante/search'); ?>" method="post" class="row g-3 needs-validation" novalidate>
      <div class="col-12">
        <label for="cnpj" class="form-label">CNPJ</label>
        <input type="text" class="form-control" id="cnpj" name="cnpj" required>
        <div class="invalid-feedback">Por favor, informe o CNPJ do cliente.</div>
      </div>
      <div class="col-12">
        <button class="btn btn-primary" type="submit">Buscar</button>
      </div>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>