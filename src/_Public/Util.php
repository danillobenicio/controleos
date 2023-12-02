<?php

    namespace Src\_Public;

    class Util{
       
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

        public static function ChamarPagina($pag){
            header("Location: $pag.php");
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

        public static function CriptografarSenha($senha) : string {
            return password_hash($senha, PASSWORD_DEFAULT);
        }

        public static function VerificarSenha($senhaDigitada, $senha_hash) : bool {
            return password_verify($senhaDigitada, $senha_hash);
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