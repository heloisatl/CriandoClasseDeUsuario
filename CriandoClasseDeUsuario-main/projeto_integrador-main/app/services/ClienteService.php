<?php

namespace app\services;

use app\models\Cliente;
use app\repositories\ClienteRepository;


class ClienteService
{
    private ClienteRepository $repository;

    public function __construct()
    {
        $this->repository = new ClienteRepository();
    }

    public function getClientes(): array
    {
        return $this->repository->getClientes();
    }

    public function getClienteById(int $id)
    {
        return $this->repository->getClienteById($id);
    }

    public function updateCliente(Cliente $cliente): bool
    {
        return $this->repository->updateCliente($cliente);
    }

    public function deleteCliente(int $id): bool
    {
        return $this->repository->deleteCliente($id);
    }

    public function saveCliente(Cliente  $cliente):?Cliente
    {
        // 1. Verifica se o e-mail já está cadastrado
        $clienteExistente = $this->repository->getClienteByEmail($cliente->getEmail());

        if ($clienteExistente) {
            // Se o usuário existe, a regra de negócio impede o cadastro
            return null;
        }

        // 2. Se não existir, prossegue com o salvamento
        return $this->repository->saveCliente($cliente);
    }
}
