<?php

use Carbon\Carbon;
use Illuminate\Support\Arr;
use Symfony\Component\Process\Process;

if( !function_exists('formatoGravarData') ){
    function formatoGravarData($data)
    {
        if($data != null){
            return substr( $data,0,4 )."-".substr($data,4,2)."-".substr($data,6,2);
        } else {
            return null;
        }
    }
}

if( !function_exists('formatoDataSql') ){
    function formatoDataSql($data)
    {
        if($data != null){
            $formatoBarra = explode('/',$data);
            $formatoTraco = explode('-',$data);
            $data = str_replace("/","",$data);
            $data = str_replace("-","",$data);
            if(isset($formatoBarra[1])){

                $tamanho = strlen($formatoBarra[0]);
                if($tamanho>2){
                    return substr( $data,0,4 )."-".substr($data,4,2)."-".substr($data,6,2);
                }else{
                   // 01092019
                    return substr( $data,4,4 )."-".substr( $data,2,2 )."-".substr( $data,0,2 );
                }
            }elseif(isset($formatoTraco[1])){
                $tamanho = strlen($formatoTraco[0]);
                if($tamanho>2){
                    return substr( $data,0,4 )."-".substr($data,4,2)."-".substr($data,6,2);
                }else{
                    return substr( $data,4,4 )."-".substr( $data,2,2 )."-".substr( $data,0,2 );
                }
            }else{
                return substr( $data,0,4 )."-".substr($data,4,2)."-".substr($data,6,2);
            }
        } else {
            return null;
        }
    }
}

if( !function_exists('calculaTempoData') ){
    function calculaTempoDataMeses($value, $periodo)
    {
        $ar_value = explode("-",$value);
        $valor1 = (int)$ar_value[0];
        $valor2 = (int)$ar_value[1];
        $valor3 = (int)$ar_value[2];
        $dt = Carbon::create((int)$ar_value[0],(int)$ar_value[1],(int)$ar_value[2]);
        $dt->modify($periodo.'months');
        $novadata = substr("".$dt,0,10);
        return $novadata;
    }
}

if( !function_exists('deduzDias') ) {
    function deduzDias($data, $sinal, $qtdeDias)
    {
        return date('d/m/Y', strtotime($sinal.$qtdeDias." days",strtotime($data)));
    }
}

// Converte a string em somente números
if( !function_exists('soNumero')){
    function soNumero($str = null){
        return preg_replace("/[^0-9]/", "", $str);
    }
}

if( !function_exists('guidv4')){
    function guidv4($data = null) {
        // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
        $data = $data ?? random_bytes(16);
        assert(strlen($data) == 16);

        // Set version to 0100
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
        // Set bits 6-7 to 10
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

        // Output the 36 character UUID.
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }
}

if( !function_exists('gerarUUID')){
    function gerarUUID() {
        return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
            mt_rand( 0, 0xffff ),
            mt_rand( 0, 0x0C2f ) | 0x4000,
            mt_rand( 0, 0x3fff ) | 0x8000,
            mt_rand( 0, 0x2Aff ), mt_rand( 0, 0xffD3 ), mt_rand( 0, 0xff4B )
        );
    }
}

if ( !function_exists('formataDataUTCParaLocal') ) {
    function formataDataUTCParaLocal($data, $timezone = 'America/Sao_Paulo')
    {
        $utcDate = Carbon::createFromFormat('Y-m-d H:i:s', $data, 'UTC');
        $localDate = $utcDate->setTimezone($timezone);

        return $localDate;
    }
}

if( !function_exists('genuuid')){
    function genuuid($l=10): string
    {
        return substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXZ"), 0, $l);
    }
}

if( !function_exists('formatMoney') ){
    function formatMoney($value): array|int|string
    {
        if($value>0){
            $value = str_replace(',', '', $value);
            $value = str_replace(',', '.', $value);
            return $value;
        }else{
            return 0;
        }
    }

}

if(!function_exists('dataExibicaoHora')){
    function dataExibicaoHora($data) {
        return \Carbon\Carbon::parse($data)->format('d/m/Y H:i');
    }
}

if (!function_exists('formatBytes')) {

    function formatBytes(int $bytes, int $precision = 2): string
    {
        if ($bytes <= 0) {
            return '0 B';
        }

        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        $base = 1024;
        $i = floor(log($bytes, $base));

        // Garante que não exceda o limite do array de unidades
        $i = min($i, count($units) - 1);

        $size = $bytes / pow($base, $i);

        // Usa number_format para formatação local-aware de decimais e milhares, se possível,
        // mas sem depender de 'intl' para as unidades.
        return round($size, $precision) . ' ' . $units[$i];
    }
}

if (!function_exists('tentarFormatarData'))
{
    function tentarFormatarData($valor) {
        if (is_string($valor) && preg_match('/^\d{4}-\d{2}-\d{2}/', $valor)) {
            $timestamp = strtotime($valor);

            if ($timestamp !== false) {
                // Retorna no formato DD/MM/YYYY
                return date('d/m/Y', $timestamp);
            }
        }

        // Se não for data válida, retorna o valor original
        return $valor;
    }
}
