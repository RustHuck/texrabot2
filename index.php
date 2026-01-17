<?php
// ===== НАСТРОЙКИ =====
$checkUrl = 'https://	nightworld.free.nf/admin.txt'; // ГДЕ ПРОВЕРЯЕМ ФАЙЛ
$redirectUrl = 'https://	nightworld.free.nf';        // КУДА РЕДИРЕКТ
$timeout = 3; // секунды
// ====================

// Проверка файла на другом сайте (через HTTP)
$context = stream_context_create([
    'http' => [
        'method'  => 'HEAD',
        'timeout' => $timeout
    ]
]);

$headers = @get_headers($checkUrl, 1, $context);

if ($headers === false || strpos($headers[0], '200') === false) {
    header('Location: ' . $redirectUrl);
    exit;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Технические работы сервера</title>

  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
      background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
      font-family: Arial, Helvetica, sans-serif;
      color: #ffffff;
    }

    .container {
      width: 100%;
      max-width: 520px;
      text-align: center;
      background: rgba(0, 0, 0, 0.45);
      padding: 32px 24px;
      border-radius: 18px;
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
    }

    h1 {
      margin-top: 0;
      font-size: clamp(1.6rem, 4vw, 2.1rem);
    }

    p {
      font-size: clamp(1rem, 3.5vw, 1.1rem);
      line-height: 1.5;
      margin-bottom: 24px;
    }

    img {
      width: 100%;
      max-width: 360px;
      border-radius: 14px;
      margin: 10px auto;
      display: block;
    }

    .footer {
      margin-top: 20px;
      font-size: 0.9rem;
      opacity: 0.8;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>🔧 Сервер на технических работах</h1>

    <p>
      Мы проводим технические работы и скоро вернёмся.
      <br />
      Спасибо за терпение!
    </p>

    <div class="footer">
      Ожидаемое время завершения: скоро
    </div>
  </div>
</body>
</html>
