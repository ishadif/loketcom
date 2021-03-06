## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, yet powerful, providing tools needed for large, robust applications. A superb combination of simplicity, elegance, and innovation give you tools you need to build any application with which you are tasked.

## How to Install

1. clone this repository
2. install [laravel](https://laravel.com/docs/5.5#installation) in your machine
3. run `composer install` on command line
4. edit your `.env` file
5. run `php artisan migrate` to migrate the database
6. run `php artisan vendor:publish --provider="Thujohn\Twitter\TwitterServiceProvider"` and modifiy the config file with your own information. refer to [this package](https://github.com/thujohn/twitter) for further info
7. run `npm install` then `npm run dev` to compile all assets

## Testing Configuration

since i use `PHPUnit` and `sqlite` for testing, you might want to edit `phpunit.xml` file as follow:

```
	// rest of the file
	
    <php>
        <env name="APP_ENV" value="testing"/>
        <env name="DB_CONNECTION" value="sqlite"/>
        <env name="DB_DATABASE" value=":memory:"/>
        <env name="CACHE_DRIVER" value="array"/>
        <env name="SESSION_DRIVER" value="array"/>
        <env name="QUEUE_DRIVER" value="sync"/>
    </php>

   //rest of the file
```

