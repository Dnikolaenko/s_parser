# s_parser
Парсер синонимов с ресурса http://www.wordreference.com/synonyms/

О скрипте:
Скрипт обрабатывает заданные в файле (https://raw.githubusercontent.com/dwyl/english-words/master/words.txt) для парсинга слова и парсит страницы с задаными для них синонимами с ресурса (http://www.wordreference.com/synonyms/), после чего записывает данные страницы в папку download_files, после чего по файлам проходит библиотека для парсинга html и ищет нужный нам тег, в моем случае (.content div#article) и записывает найденые файлы в базу данных mongodb

Используемые библиотеки:
- Simple_Html_Dom_Parser //для парсинга данных с html
- Mongodb // для связки mongodb с php

Все данные прописаны в Config.php. Но также можно задать ограничение на записи коллекции в базу данный в файле Database свойство db_parts, сейчас стоит ограничение на запись по 50 записей.

Для запуска парсинга у себя на машине нужно:
- Склонировать или загрузить проект
- Убедиться в наличии библиотеки mongodb (рекомендуется использовать версию 3.2)
- Дать права на запись и чтении папке download_files(755 будет достаточно) и вложеным в неё файлам
- Подтянуть нужные библиотеки командой composer install
- Для запуска перейдите в папку с проектом и введите в консоли php -S localhost:8000 и перейдите по указаном адресу,
или же запустите скрипт index.php в консоли командой (php index.php), или создайте локальную версию сайта через apache2 или nginx

Если будут какие нибудь вопросы моя почта Dnikolaenko2908@gmail.com
В дальнейшем возможна доработка скрипта,или его адаптация к другим бд.
