<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="card shadow-sm col-md-6 mx-auto border-primary">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Editar cliente</h4>
            </div>
            <div class="card-body">
                <form action="<?= URL_BASE ?>/clientes/atualizar" method="post">

                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $cliente['id'] ?>">


                    <div class="mb-3">
                        <label for="nomeCliente" class="form-label">Nome de cliente</label>
                        <input type="text" class="form-control" id="nomeCliente" name="nomeCliente" value="<?= $cliente['nomeCliente'] ?>">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= $cliente['email'] ?>">
                    </div>

                    <div class="mb-3">
                        <label for="senha" class="form-label">Nova Senha (Deixe em branco para não alterar)</label>
                        <input type="password" class="form-control" id="senha" name="senha">
                    </div>

                    <div class="mb-3">
                        <label for="perfil" class="form-label">Perfil de Acesso</label>
                        <select class="form-select" id="perfil" name="perfil">
                            <option value="user" <?= $cliente['perfil'] === 'user' ? 'selected' : '' ?>>clientes Padrão</option>
                            <option value="admin" <?= $cliente['perfil'] === 'admin' ? 'selected' : '' ?>>Administrador</option>
                        </select>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-save"></i> Atualizar Dados
                        </button>
                        <a href="<?= URL_BASE ?>/clientes" class="btn btn-outline-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>