# larablog-base

`pull`

`composer install`

`touch database/database.sqlite`

create .env with:

```
APP_KEY=base64:DsSmd5RqLDrTc9O2UkZz0NOejvZsdzqO+sx7n05C6rM=

DB_CONNECTION=sqlite
DB_DATABASE=c://wamp64/www/blog4/database/database.sqlite
```

`php artisan migrate:fresh --seed -v`

`php artisan serve`


DBAdmin password for phpLiteadmin is `admin`
