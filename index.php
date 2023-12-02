<?php
$url = 'https://z3.fm/';
$ch = curl_init($url);

// Установка опций cURL
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Выполнение запроса и получение HTML-кода
$html = curl_exec($ch);

// Проверка на наличие ошибок
if (curl_errno($ch)) {
    echo 'Ошибка cURL: ' . curl_error($ch);
} else {
    // Парсинг HTML с использованием, например, SimpleHTMLDOM
    include 'simple_html_dom.php';
    $dom = new simple_html_dom();
    $dom->load($html);

    // Пример вывода всех текстовых узлов внутри тегов h2
    foreach ($dom->find('h2') as $header) {
        echo $header->plaintext . '<br>';
    }

    // Очистка ресурсов
    $dom->clear();
    unset($dom);
}

// Закрытие cURL-соединения
curl_close($ch);
?>
