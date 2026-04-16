<?php

namespace app\repositories;

use app\database\ConnectionFactory;
use app\models\Cliente;
use PDO;

class ClienteRepository
{
    private PDO $connection;

    public function __construct()
    {
        $this->connection = ConnectionFactory::getConnection();
    }

    public function getClientes(): array
    {
        $sql = "SELECT * from cliente";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function saveCliente(Cliente $cliente): ?Cliente
    {

        $sql = "INSERT INTO cliente (nome, email, senha) VALUES (:nome, :email, :senha)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(':nome', $cliente->getNome());
        $stmt->bindValue(':email', $cliente->getEmail());
        $stmt->bindValue(':senha', password_hash($cliente->getSenha(), PASSWORD_DEFAULT));

        $resultado =  $stmt->execute();

        if($resultado){
            $id = $this->connection->lastInsertId();
            $cliente->setId($id);
            return $cliente;
        }

        return null;
    }

    public function getClienteById(int $id)
    {
        $sql = "SELECT id, nome, email, WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function updateCliente(Cliente $cliente): bool
    {
        $sql = "UPDATE clientes SET nome = :nome, email = :email, perfil = :perfil WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(':nome', $cliente->getNome());
        $stmt->bindValue(':email', $cliente->getEmail());
        $stmt->bindValue(':id', $cliente->getId());
        return $stmt->execute();
    }

    public function deleteCliente (int $id): bool
    {
        $sql = "DELETE FROM clientes WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    }
    public function getClienteByEmail(string $email)
    {
        $sql = "SELECT * FROM cliente WHERE email = :email";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC); // Retorna o usuário se encontrar, ou falso se não existir

        if($resultado == NULL){
            return NULL;
        }

        $cliente = new Cliente ($resultado["nome"], $resultado["email"], $resultado["senha"]);
        $cliente->setId($resultado["id"]);

        return $cliente;
    }
}
