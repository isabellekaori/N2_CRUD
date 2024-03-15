<?php
include_once('../modelo/vagas.php');
include_once('../modelo/vagasDAO.php');

$vagasDAO = new vagasDAO();

if (isset($_POST['salvar'])) {
    $vagasDAO->inserir($_POST['descricao'], $_POST['info'], $_POST['email']);
}
if (isset($_POST['bt_listar'])) {
    $vagasDAO->listar();
}
if (isset($_POST['bt_consultar'])) {
    $vagasDAO->buscarVaga($_POST['idVaga']);
}

if (isset($_POST['botao_excluir'])) {
    $vagasDAO->excluir($_POST['idVaga']);
}
if (isset($_POST['botao_editar'])) {
    $vagasDAO->editar($_POST['idVaga']);
}
if (isset($_POST['salvar_alteracao'])) {
    $vagasDAO->SalvarEdicao($_POST['idVaga'], $_POST['descricao'], $_POST['info'], $_POST['email']);
    $vagasDAO->listar();
}
