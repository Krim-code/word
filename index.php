<?php
require 'vendor/autoload.php'; // Подключаем автозагрузчик Composer

use PhpOffice\PhpWord\TemplateProcessor;
use Intervention\Image\ImageManagerStatic as Image;
// Проверка, что скрипт обрабатывает POST-запрос
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require 'vendor/autoload.php'; // Подключаем автозагрузчик Composer

   
    // use Intervention\Image\ImageManagerStatic as Image;

    // Функция для обработки изображения и вставки его в Word
    // function insertImage($templateProcessor, $imagePath, $imageName)
    // {
    //     $imageContent = file_get_contents($imagePath);
    //     $templateProcessor->setImageValue($imageName, $imageContent, ['width' => 80, 'height' => 80]);
    // }


    
    // Получаем данные из запроса (в данном случае, просто пример данных)
    $Name = $_POST['name'];
    $currentDate = date('d F Y'); // Текущая дата в формате "день месяц год"
    // ... (другие данные из запроса)

    // Путь к шаблону Word файла
    $templatePath = './template.docx';

    // Создаем объект TemplateProcessor
    $templateProcessor = new TemplateProcessor($templatePath);

    // Заменяем значения в шаблоне
    $templateProcessor->setValue('Name', $Name);
    // ... (другие замены)

    // Вставляем изображение (пример)
    // $imagePath = './signature.png';
    // $imageName = 'signature';
    // insertImage($templateProcessor, $imagePath, $imageName);

    // Сохраняем новый Word файл
    $outputPath = './output.docx';
    $templateProcessor->saveAs($outputPath);

    echo 'Данные успешно вставлены в шаблон Word файла.';
} else {
    echo 'Этот скрипт должен обрабатываться только как POST-запрос.';
}

