# Modelarium example

This project is an example of how to use [Modelarium](https://github.com/Corollarium/modelarium) and [Lighthouse](https://lighthouse-php.com/) to quickly scaffold a GraphQL serving backend with Laravel.

For documentaton [check the Modelarium tutorial](https://corollarium.github.io/modelarium/laraveltutorial.html) and its [full docs](https://corollarium.github.io/modelarium/).

## Just tell me what to run

Install deps:

```
composer install
```

Init modelarium:

```
php artisan modelarium:init
```

The graphql files in `graphql/data/` are ready for you. Generate backend scaffolding:

```
php artisan modelarium:scaffold '*' --everything --overwrite --lighthouse
```

Setup your `.env` file with the app database information. Then just run the usual process to migrate and seed:

```
php artisan key:generate
php artisan migrate:fresh --seed
```

Serve the site:

```
php artisan serve --host 0.0.0.0 --port 8000
```

Now open http://localhost:8000/graphql-playground and run a query to check it all works:

```graphql
{
  post(id: 1) {
    id
    title
    description
    user {
      id
      name
    }
  }
}
```

### Frontend

You can also generate the frontend now:

```shell
# add laravel ui deps
composer require laravel/ui

# install ui deps
php artisan ui vue --auth

# install npm deps
npm install

# add prettier to generate well formatted code
npm add prettier
```

Now let's export the actual frontend files. Let's pick a HTML/Bootstrap/Vue frontend:

```
artisan modelarium:frontend '*' --framework=HTML --framework=Bootstrap --framework=Vue --overwrite --prettier
```

## License

This repo is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
