## Laravel Monolog MySQL Handler.

MySQL driver for Laravel Monolog.

### Installation

- [MonoSQL on Packagist](https://packagist.org/packages/teepluss/monosql)
- [MonoSQL on GitHub](https://github.com/teepluss/laravel4-monosql)

To get the lastest version of Theme simply require it in your `composer.json` file.

~~~
"teepluss/monosql": "dev-master"
~~~

You'll then need to run `composer install` to download it and have the autoloader updated.

Once MonoSQL is installed you need to register the service provider with the application. Open up `app/config/app.php` and find the `providers` key.

~~~
'providers' => array(

    'Teepluss\Monosql\MonosqlServiceProvider'

)
~~~

Publish config using artisan CLI.

~~~
php artisan config:publish teepluss/monosql
~~~

Migrate tables.

~~~
php artisan migrate --package=teepluss/monosql
~~~

## Usage
File: /app/start/global.php
~~~php
//Log::useDailyFiles(storage_path().'/logs/'.$logFile);
Log::getMonolog()->pushHandler(new Teepluss\Monosql\MySQLHandler(DB::connection()));
~~~

That's it!

## Support or Contact

If you have some problem, Contact teepluss@gmail.com

[![Support via PayPal](https://rawgithub.com/chris---/Donation-Badges/master/paypal.jpeg)](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=9GEC8J7FAG6JA)