<?php 

//Retorna raíz da hospedagem do projeto
define('PATH', $_SERVER['DOCUMENT_ROOT'] . '/ControleOs/src/');

//Flags status
const SITUACAO_ATIVO = 1;
const SITUACAO_INATIVO = 0;
const SITUACAO_DESCARTADO = 0;


//Situação equipamento
const SITUACAO_EQUIPAMENTO_ALOCADO = 1;
const SITUACAO_EQUIPAMENTO_REMOVIDO = 2;
const SITUACAO_EQUIPAMENTO_MANUTENÇÃO = 3;


//Tipos de usuários
const USUARIO_ADM = 1;
const USUARIO_FUNC = 2;
const USUARIO_TEC = 3;