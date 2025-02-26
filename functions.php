<?php

function loadEnv($path = '.env')
{
  if (!file_exists($path)) {
    throw new Exception("Arquivo .env não encontrado em {$path}");
  }

  $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
  foreach ($lines as $line) {
    if (strpos(trim($line), '#') === 0) {
      continue; // Ignora comentários
    }

    list($name, $value) = explode('=', $line, 2);
    $name = trim($name);
    $value = trim($value);

    if (!empty($name)) {
      putenv("{$name}={$value}");
    }
  }
}

function siteUrl()
{
  return getenv('SITE_URL');
}


function logError($message)
{
  error_log("[ERRO] {$message}\r", 3, __DIR__ . "/logs/error.log");
}


// Apenas para verificar alguns arrays formatado
function fldPre($string)
{
  echo '<pre>';
  print_r($string);
  echo '</pre>';
}

function fldPreDie($string)
{
  echo '<pre>';
  print_r($string);
  echo '</pre>';
  die;
}

/**
 * TIPOS:
 *- primary, secondary, success, danger, warning, info, light e dark 
 */
function fldMessage($tipo, $text)
{
  echo "
  <div class='alert alert-{$tipo} mx-5 alert-dismissible fade show mt-3' role='alert'>
    <p>
      {$text}
    </p>
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>
  ";
}

/**
 *- $tipo : 0 -> criptografa
 *- $tipo : 1 -> descriptografa
 *- $caracter : Texto/Número
 */
function fldCrip($caracter, $tipo)
{
  $key = 'FiliD_Danela-Gatins';
  $iv = '2500910555066936';
  $method = 'AES-256-CBC';
  if ($tipo == 0) {
    $encrypted = openssl_encrypt($caracter, $method, $key, 0, $iv);
    $safeEncrypted = strtr(base64_encode($encrypted), '+/', '-_');
    return $safeEncrypted;
  } elseif ($tipo == 1) {
    $decoded = base64_decode(strtr($caracter, '-_', '+/'));
    $decrypted = openssl_decrypt($decoded, $method, $key, 0, $iv);
    return $decrypted;
  }
}

function fldMesBrasil($date)
{
  $meses = [
    '01' => 'Janeiro',
    '02' => 'Fevereiro',
    '03' => 'Março',
    '04' => 'Abril',
    '05' => 'Maio',
    '06' => 'Junho',
    '07' => 'Julho',
    '08' => 'Agosto',
    '09' => 'Setembro',
    '10' => 'Outubro',
    '11' => 'Novembro',
    '12' => 'Dezembro'
  ];
  return $meses[$date];
}

/**
 *- Transformar uma data 2025-11-25
 *- Em 25 Nov, 2025
 */
function fldDateExtenso($date)
{
  $timestamp = strtotime($date);
  $dia = date('d', $timestamp);
  $mes = date('m', $timestamp);
  $ano = date('Y', $timestamp);
  return "{$dia} de " . fldMesBrasil($mes) . ", {$ano}";
}

/**
 *- Transformar texto tipo -> Cartão IT Mozão em cartaoitmozao
 *- $texto -> texto a ser modificado
 */
function fldTirarAcento($texto)
{
  // Normaliza a string para remover acentos
  $texto = iconv('UTF-8', 'ASCII//TRANSLIT', $texto);

  // Remover espaços e caracteres especiais
  $texto = preg_replace('/[^a-zA-Z0-9]/', '', $texto);

  // Transformar em minúsculas
  return strtolower($texto);
}

/**
 * TIPOS: primary, secondary, success, danger, warning, info, light e dark 
 */
function fldCard($tipo, $header, $title, $text)
{
  echo "
    <div class='card text-bg-{$tipo} mt-3' style='max-width: 100%;'>
      <div class='card-header'>{$header}</div>
      <div class='card-body'>
        <h5 class='card-title'>{$title}</h5>
        <p class='card-text'>{$text}</p>
      </div>
    </div>
  ";
}

/**
 * 
 * - $tipo: editar, lixeira, addUser
 * - $cor: text-primary text-secondary text-success, text-danger, text-warning, text-info, text-light, text-dark
 */
function fldIco($tipo, $cor, $i)
{
  $svg = 'fsdfsd';
  switch ($tipo) {
    case 'editar':
      $svg = '<svg xmlns="http://www.w3.org/2000/svg" width="' . $i . '" height="' . $i . '" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
</svg>';
      break;
    case 'lixeira':
      $svg = '<svg xmlns="http://www.w3.org/2000/svg" width="' . $i . '" height="' . $i . '" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
  <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
</svg>';
      break;



    case 'addUser':
      $svg = '<svg xmlns="http://www.w3.org/2000/svg" width="' . $i . '" height="' . $i . '" fill="currentColor" class="bi bi-person-fill-add" viewBox="0 0 16 16">
  <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
  <path d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4"/>
</svg>';
      break;


    case 'Filid':
      $svg = '';
      break;
  }

  echo "
  <i class='{$cor}'>
    $svg
  </i>
  ";
}
