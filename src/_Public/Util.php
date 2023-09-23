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

    }

?>