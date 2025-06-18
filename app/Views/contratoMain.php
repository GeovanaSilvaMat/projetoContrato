<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contrato CNPJ</title>

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="style.css" rel="stylesheet">

<body>
    <div class="search-container">
        <h2>CONTRATO DE FORNECIMENTO</h2>
        <hr>

        <!-- Formulário do CodeIgniter -->
        <form action="<?= base_url('Contratante/search'); ?>" class="d-flex" role="search" method="post" novalidate>
            <div class="mb-4">
                <label for="cnpj" class="form-label">CNPJ</label>
                <div class="input-wrapper">
                    <input type="text" class="form-control" id="cnpj" name="cnpj" placeholder="Informe o CNPJ do cliente" required/>
                    <div class="invalid-feedback">Por favor, informe o CNPJ do cliente.</div>
                </div>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-buscar">Buscar</button>
            </div>

        </form>
    </div>

  <script src="script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>