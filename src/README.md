## Как да инсталирам
С Git bash: 
```sh
    $ git clone https://github.com/haspel-sign/br.git
```

или свалете .ZIP файла.
Поставете директорията "booking" в публичната директория на уеб сървъра (най-често е public_html)
Препоръчително е системната директория на приложението - "src" да не се намира в публичната директория.
В този случай отворете файлът `booking/index.php` и посочете в променливата `$autoloadPath` пътя до 
`/src/Core/Bootstrap/Bootstrap.php` на уеб сървъра.
пример:
```php
    $autoloadPath =  (dirname(__DIR__) . '/..') . '/src/Core/Bootstrap/Bootstrap.php';
//PHP7 only 
    $autoloadPath =  dirname(__DIR__, 2) . '/src/Core/Bootstrap/Bootstrap.php';
```
Основните настройки се намират в `src/App/Config/config.php`
Препоръчвам да промените:
```php
    'base_url' => ''
на
    'base_url' => 'http://your-sitename/booking/'
```
## Инсталиране на базата данни
Направете база данни в MySql примерно br_booking
Променете настройките във файла `src/App/Config/mysql_bd_config.php`

```php
    return [
        'driver'    => 'mysql',
        'host'      => 'localhost',
        'database'  => 'br_booking', // вашата база данни
        'username'  => 'yourusername',
        'password'  => 'yourpass',
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix'    => '',
    ];
```
В любимия браузър въведете 
```
http://your-sitename/booking/install
```
което ще създаде празно приложение
или
```
http://your-sitename/booking/install/demo
```
инсталира примерни данни , които може да променяте.
Създайте администраторски потребител.

### Това е !

### Сайта е на адрес:
http://your-sitename/booking

### Контролния панел е на адрес:

http://your-sitename/booking/booking-dashboard

### Интеграция със съществуващ сайт
На подходящо място във вашият сайт създайте линк към резервационната
система (примерни кодове има в директория "demo-code")
```sh
    <a href="http://your-site/booking-dir" class="">РЕЗЕРВИРАЙ</a>
```
или да вградите форма за търсене по дати
```sh
    <form id="searchForm" action="http://yoursite.com/booking-dir" method="get">
        <input type="text" name="checkin" id="checkin" placeholder="настаняване">
        <input type="text" name="checkout" id="checkout" placeholder="напускане">  
        <input type="number" name="adults" id="adults" placeholder="гости">
    <button id="searchButton" class="" type="submit">търси</button>
    </form>
```