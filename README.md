## Uruchomienie aplikacji
### Wymagania

* PHP 8.0
* MongoDB
* MySQL

### Uruchomienie

Skonfigurowanie `.env` na podstawie `.env.example`

Tradycyjnie `composer install`

Następnie `php artisan migrate`

## Instrukcje

### Generowanie tokena

    php artisan create:token {client}

### Pobieranie danych użytkownika

    php artisan user:data:get

### Dostęp do API

    http://localhost/api/usersData?client=client&token=token
