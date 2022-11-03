# Test technique

## Prérequis

- [laravel](https://laravel.com/docs/9.x/)

## Misc

Les permissions sont gérées avec [spatie permissions](https://spatie.be/docs/laravel-permission/v5/basic-usage/basic-usage)
 et l'authentification avec [passport](https://laravel.com/docs/9.x/passport)

## Lancer les tests

- `php artisan test`

## Installation


- Copier .env.example dans .env et remplir les infos de la bdd
- `composer install`
- `php artisan key:generate`
- `php artisan migrate:fresh --seed`
- `php artisan passport:install`
- Remplir les lignes PASSPORT_PERSONAL_ACCESS_CLIENT_ID et PASSPORT_PERSONAL_ACCESS_CLIENT_SECRET du .env avec les 
credentials générés par `php artisan passport:client --personal`

## Démarrer le serveur

- `php artisan serve`
- `php artisan queue:work`

## Api

### Routes disponibles

- `POST` `/api/register` {

    - "firstname",
    - "lastname",
    - "password",
    - "password_confirmation"
    - "email"
  
}
- `POST` `/api/login` {

    - "email"
    - "password"
  
}

- `POST` `/api/post/create` {

    - "title"
    - "body"
    - "publication_date"
    - "status"

}

- `POST` `/api/post/update` {

    - "title"
    - "body"
    - "publication_date"
    - "status"

}

- `DELETE` `/api/post/delete/{id}`


- `POST` `/api/post/index` {

    - "status"
    - "title"
 
}
