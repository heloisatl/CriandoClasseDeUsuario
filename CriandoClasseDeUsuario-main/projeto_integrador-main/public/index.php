<?php 

require_once __DIR__ . '/../app/core/Autoload.php';
require_once __DIR__ . '/../app/config/Config.php';

use app\core\Router;

$router = new Router();

$router->get('/', 'JogadorController@listarTodos');

// Jogador Routes
$router->get('/jogadores', 'JogadorController@listarTodos');
$router->get('/jogadores/jogador', 'JogadorController@verJogador');
$router->get('/jogadores/cadastrar', 'JogadorController@criar');

$router->post('/jogadores/salvar', 'JogadorController@salvar');
$router->get('/jogadores/editar', 'JogadorController@editar');
$router->post('/jogadores/atualizar', 'JogadorController@atualizar');
$router->get('/jogadores/excluir', 'JogadorController@excluir');

$router->get('/teste', 'JogadorController@redirecionarTeste');


$router->get('/usuarios', 'UsuarioController@index');
$router->get('/usuarios/cadastrar', 'UsuarioController@cadastrar');
$router->post('/usuarios/salvar', 'UsuarioController@salvar');

$router->get('/usuarios/editar', 'UsuarioController@editar');
$router->post('/usuarios/atualizar', 'UsuarioController@atualizar');

$router->get('/usuarios/excluir', 'UsuarioController@excluir');



$router->get('/clientes', 'ClienteController@index');
$router->get('/clientes/cadastrar', 'ClienteController@cadastrar');
$router->post('/clientes/salvar', 'ClienteController@salvar');

$router->get('/clientes/editar', 'ClienteController@editar');
$router->post('/clientes/atualizar', 'ClienteController@atualizar');

$router->get('/clientes/excluir', 'ClienteController@excluir');



$router->run();
