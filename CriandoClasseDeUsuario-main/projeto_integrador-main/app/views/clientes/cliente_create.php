<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Projeto Integrador • <?= isset($cliente['id']) ? 'Editar' : 'Novo' ?> Cliente</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0"><?= isset($cliente['id']) ? 'Editar' : 'Novo' ?> Cliente</h2>
            <a href="<?= URL_BASE ?>/clientes" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Voltar
            </a>
        </div>

        <div class="card shadow-sm col-md-8 mx-auto">
            <div class="card-body p-4">
                <form action="<?= URL_BASE ?>/clientes/<?= isset($cliente['id']) ? 'atualizar' : 'salvar' ?>" method="post">
                    <?php if (isset($cliente['id'])): ?>
                        <input type="hidden" name="id" value="<?= $cliente['id'] ?>">
                    <?php endif; ?>

                    <div class="mb-3">
                        <label for="nomeCliente" class="form-label">Nome do Cliente</label>
                        <input type="text" class="form-control" id="nomeCliente" name="nomeCliente" value="<?= $cliente['nomeCliente'] ?? '' ?>">
                        <?php if (isset($erros['nomeCliente'])): ?>
                            <div class="text-danger small"><?= $erros['nomeCliente'] ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= $cliente['email'] ?? '' ?>">
                        <?php if (isset($erros['email'])): ?>
                            <div class="text-danger small"><?= $erros['email'] ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="senha" class="form-label">Senha <?= isset($cliente['id']) ? '(Preencha apenas se quiser alterar)' : '' ?></label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="senha" name="senha">
                            <button class="btn btn-outline-secondary" type="button" id="toggleSenha">
                                <i class="bi bi-eye" id="iconSenha"></i>
                            </button>
                        </div>
                        <?php if (isset($erros['senha'])): ?>
                            <div class="text-danger small"><?= $erros['senha'] ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="perfil" class="form-label">Perfil</label>
                        <select class="form-select" id="perfil" name="perfil">
                            <option value="user" <?= (isset($cliente['perfil']) && $cliente['perfil'] == 'user') ? 'selected' : '' ?>>Cliente Padrão</option>
                            <option value="admin" <?= (isset($cliente['perfil']) && $cliente['perfil'] == 'admin') ? 'selected' : '' ?>>Administrador</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-check-circle"></i> <?= isset($cliente['id']) ? 'Atualizar' : 'Salvar' ?>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const toggleSenha = document.querySelector('#toggleSenha');
        const senhaInput = document.querySelector('#senha');
        const iconSenha = document.querySelector('#iconSenha');

        if (toggleSenha) {
            toggleSenha.addEventListener('click', function() {
                const type = senhaInput.getAttribute('type') === 'password' ? 'text' : 'password';
                senhaInput.setAttribute('type', type);
                
                iconSenha.classList.toggle('bi-eye');
                iconSenha.classList.toggle('bi-eye-slash');
            });
        }
    </script>
</body>

</html>
