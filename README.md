Settings OpenServer:
  HTTP: Apache_2.4-PHP_7.2-7.4,
  PHP: PHP_7.2,
  MySQL/MariaDB: MySQL-8.0-Win10

В корне есть файл testTaskVK.sql с sql-кодом для создания и заполнения таблиц данными. БД должна называться так же как файл. Переместить папку test.task.vk в папку domains Open server и запустить проект.

Доступны следующие API-endpoint'ы:
  1. GET /users возвращает json-файл с данными обо всех пользователях 
  2. GET /users/:id возвращает json-файл с данными о конкретном пользователе
  3. GET /user/:id возвращает json-файл с данными о выполненных заданиях и балансе конкретного пользователя
  4. POST /users создаёт пользователя, принимая параметры name, balance
  5. POST /quest создаёт задание, принимая параметры name, cost
  
  
