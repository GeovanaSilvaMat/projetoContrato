<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detalhes do Contratante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Detalhes do Contratante
                            <!-- Botão para voltar para a página de busca -->
                            <a href="<?= base_url('contrato') ?>" class="btn btn-danger float-end">Voltar</a>
                        </h4>
                    </div>
                <form action="<?= base_url('contratante/edit');?>" method ="post">
                    <div class="card-body">
                            <!-- Seção de Dados da Empresa Contratante -->
                            <h5 class="mt-2">Dados da Empresa</h5>
                            <hr>
                            <div class="mb-3">
                                <label>Razão Social</label>
                                <input type="text" class="form-control bg-light" <?= $contratante->nome; ?> id="nome">
                            </div>
                            <div class="mb-3">
                                <label>CNPJ</label>
                                <input type="text" class="form-control bg-light"<?= $contratante->cnpj; ?> id="cnpj">
                            </div>
                             <div class="mb-3">
                                <label>E-mail</label>
                                <input type="email"class="form-control bg-light"<?= $contratante->email; ?> id="email">
                            </div>
                             <div class="mb-3">
                                <label>Endereço</label>
                                <input type="text" class="form-control bg-light" <?= $contratante->logradouro; ?> id="logradouro">
                            </div>
                            <div class="mb-3">
                                <label>Cidade</label>
                                <input type="text" class="form-control bg-light" <?= $contratante->cidade; ?> id="cidade">
                            </div>
                            <div class="mb-3">
                                <label>Estado</label>
                                <input type="text" class="form-control bg-light" <?= $contratante->estado; ?> id="estado">
                            </div>
                            <div class="mb-3">
                                <label for="faturamento_id" class="form-label"> Prazo Faturamento </label>
                                <select class="form-control" name="faturamento_id"  id="faturamento_id">
                                    
                                    <?php 
                                    for($i=0; $i < count($faturamento);$i++){ 
                                        $selected = '';
                                        if($faturamento[$i]->id == $contratante->faturamento_id){
                                            $selected = 'selected'; 
                                        }
                                    ?>
                                        <option <?= $selected; ?> value="<?= $faturamento[$i]->id; ?>">
                                            <?= $faturamento[$i]->prazo; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="faturamento_id" class="form-label"> Vencimento Faturamento </label>
                                <select class="form-control" name="faturamento_id"  id="faturamento_id">
                                    
                                    <?php 
                                    for($i=0; $i < count($faturamento);$i++){ 
                                        $selected = '';
                                        if($faturamento[$i]->id == $contratante->faturamento_id){
                                            $selected = 'selected'; 
                                        }
                                    ?>
                                        <option <?= $selected; ?> value="<?= $faturamento[$i]->id; ?>">
                                            <?= $faturamento[$i]->vencimento; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <!-- Seção de Dados do Representante Legal -->
                            <h5 class="mt-4">Dados do Representante Legal</h5>
                            <hr>
                            <div class="mb-3">
                                <label>Nome</label>
                                <p class="form-control bg-light"><?= esc($contratante['representante_nome']) ?></p>
                            </div>
                            <div class="mb-3">
                                <label>E-mail do Representante</label>
                                <p class="form-control bg-light"><?= esc($contratante['representante_email']) ?></p>
                            </div>
                            <div class="mb-3">
                                <label>Endereço do Representante</label>
                                <p class="form-control bg-light">
                                    <?= esc($contratante['representante_logradouro']) ?>, <?= esc($contratante['representante_cidade']) ?> - <?= esc($contratante['representante_estado']) ?>
                                </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>