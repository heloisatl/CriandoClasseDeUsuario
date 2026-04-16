<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Projeto Integrador • Lista de Usuários</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Lista de Clientes</h2>
            <a href="<?= URL_BASE ?>/clientes/cadastrar" class="btn btn-primary">
                <i class="bi bi-person-plus"></i> Novo Cliente
            </a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="px-4 py-3">ID</th>
                                <th class="px-4 py-3">Nome de Usuário</th>
                                <th class="px-4 py-3">E-mail</th>
                                <!-- <th class="px-4 py-3">Perfil</th> -->
                                <th class="px-4 py-3 text-end">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($clientes as $c): ?>
                                <tr>
                                    <td class="px-4 py-3 align-middle"><?= $c['id'] ?></td>
                                    <td class="px-4 py-3 align-middle"><?= $c['nome'] ?></td>
                                    <td class="px-4 py-3 align-middle"><?= $c['email'] ?></td>

                                    <td class="px-4 py-3 align-middle text-end">
                                        <a href="<?= URL_BASE ?>/clientes/editar?id=<?= $c['id'] ?>" class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-pencil"></i> Editar
                                        </a>
                                        <a href="<?= URL_BASE ?>/clientes/excluir?id=<?= $c['id'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Deseja excluir este cliente?')">
                                            <i class="bi bi-trash"></i> Excluir
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="mt-4">
            <a href="<?= URL_BASE ?>/clientes" class="btn btn-link">Ver clientes</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
