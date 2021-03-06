Symfony Blog DCCG
========================

this is a reference application created to show how
to develop applications following the [Symfony Best Practices][1].

Requirements
------------

  * PHP 7.3 or higher;
  * PDO-SQLite/MySql PHP extension enabled;
  * and the [usual Symfony application requirements][2].

Installation
------------

Usage
-----


```bash
$ symfony serve
```

Then access the application in your browser at the given URL (<https://localhost:8000> by default).

If you don't have the Symfony binary installed, run `php -S localhost:8000 -t public/`
to use the built-in PHP web server or [configure a web server][3] like Nginx or
Apache to run the application.

Tests
-----

Execute this command to run tests:

```bash
$ cd my_project/
$ ./bin/phpunit
```

[1]: https://symfony.com/doc/current/best_practices.html
[2]: https://symfony.com/doc/current/reference/requirements.html
[3]: https://symfony.com/doc/current/cookbook/configuration/web_server_configuration.html
[4]: https://symfony.com/download
