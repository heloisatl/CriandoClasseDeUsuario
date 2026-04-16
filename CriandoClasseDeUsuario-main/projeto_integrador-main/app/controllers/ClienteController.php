<?php

namespace app\controllers;

use app\core\Controller;
use app\models\Cliente;
use app\services\ClienteService;

class ClienteController extends Controller
{
    private  ClienteService $service;

    public function __construct()
    {
        $this->service = new  ClienteService();
    }

    public function index()
    {
        $data['clientes'] = $this->service->getClientes();
        $this->view('clientes/clientes_list', $data);
    }

    public function cadastrar()
    {
        $this->view('clientes/cliente_create');
    }

    public function salvar()
    {
        $cliente = new Cliente(
            $_POST['nomeCliente'],
            $_POST['email'],
            $_POST['senha'],
        );

        if ($this->service->saveCliente($cliente)) {
            $this->redirect(URL_BASE . '/clientes');
        } else {
            // Aqui você poderia passar uma mensagem de erro para a view
            echo "Erro: Este e-mail já está cadastrado!";
        }
    }

    public function editar()
    {
        $id = $_GET['id'];
        $data['cliente'] = $this->service->getClienteById($id);
        $this->view('clientes/cliente_edit', $data);
    }

    public function atualizar()
    {
        $cliente = new Cliente(
            $_POST['id'],
            $_POST['nomeCliente'],
            $_POST['email'],
            $_POST['senha'] ?? '',
        );
        $this->service->updateCliente($cliente);
        $this->redirect(URL_BASE . '/clientes');
    }

    public function excluir()
    {
        $id = $_GET['id'];
        $this->service->deleteCliente ($id);
        $this->redirect(URL_BASE . '/clientes');
    }
}
