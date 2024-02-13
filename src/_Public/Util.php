<?php

    namespace Src\_Public;

    class Util
    {
       
        public static function iniciarSessao() : void
        {
            if (!isset($_SESSION))
                session_start();
        }

        public static function criarSessao(int $id, string $nome) : void
        {
            self::iniciarSessao();
            $_SESSION['id_usuario'] = $id;
            $_SESSION['nome_usuario'] = $nome;
        }

        public static function idLogado() 
        {
            self::iniciarSessao();
            return $_SESSION['id_usuario'];
        }

        public static function nomeLogado() 
        {
            self::iniciarSessao();
            return $_SESSION['nome_usuario'];
        }

        public static function deslogar()
        {
            self::iniciarSessao();
            unset($_SESSION['id_usuario']);
            unset($_SESSION['nome_usuario']);
            self::chamarPagina('https://localhost/controleos/src/View/acesso/login');
        }

        public static function verificarLogado()
        {
            self::iniciarSessao();
            if (!isset($_SESSION['id_usuario']) || empty($_SESSION['id_usuario']))
                self::chamarPagina('https://localhost/controleos/src/View/acesso/login');
        }

        private static function SetarFusoHorario(){
            date_default_timezone_set('America/Sao_Paulo');
        }

        public static function DataAtual(){
            self::SetarFusoHorario();
            return date('Y-m-d');
        }

        public static function DataAtualBr(){
            self::SetarFusoHorario();
            return date('d/mYd');
        }

        public static function HoraAtual() {
            self::SetarFusoHorario();
            return date('H:i');
        }

        public static function DataHoraAtual() {
            self::SetarFusoHorario();
            return date('Y-m-d H:i');
        }

        public static function TratarCaracteresEspeciais($palavra) {
            $especiais = array(".", ",", ";", "!", "@", "#", "%", "¨", "*", "(", ")", "+", "-", "=", "§", "$", "|", "\\", ":", "/", "<", ">", "?", "{", "}", "[", "]", "&", "'", '"', "´", "`", "?", '“', '”', '$', "'", "'");
            $palavra = str_replace($especiais, "", $palavra);
            $palavra = strip_tags($palavra);
            return $palavra;
        }

        public static function RemoverTags($palavra){
            $palavra = strip_tags($palavra);
            return $palavra;
        }

        public static function TratarDados($palavra){

            $especiais = array(".", ",", ";", "!", "@", "#", "%", "¨", "*", "(", ")", "+", "-", "=", "§", "$", "|", "\\", ":", "/", "<", ">", "?", "{", "}", "[", "]", "&", "'", '"', "´", "`", "?", '“', '”', '$', "'", "'", ' ');
            $palavra = strip_tags($palavra);
            $palavra = str_replace($especiais, "", $palavra);
            return $palavra;

        }

        public static function chamarPagina($pag){
            header("location: $pag.php");
            exit;
        }

        public static function TratarExibicao($descricao) {

            if(strlen($descricao) > 40){
                return substr($descricao, 0, 40) . "...";
            }
            else {
                return $descricao;
            }
        }

        public static function criptografarSenha($senha) : string 
        {
            return password_hash($senha, PASSWORD_DEFAULT);
        }

        public static function verificarSenha($senha_digitada, $senha_hash) : bool 
        {
            return password_verify($senha_digitada, $senha_hash);
        }

        public static function MostrarTipoUsuario($tipo) {
            $nome_tipo = '';

            switch ($tipo) {
                case 1:
                    $nome_tipo = 'Administrador';
                    break;
                case 2:
                    $nome_tipo = 'Funcionário';
                    break;
                case 3:
                    $nome_tipo = 'Técnico';
                    break;
            }

            return $nome_tipo;
        }

    }

?>