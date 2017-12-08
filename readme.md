# Book store
## Description

"Book store" is a little website to manage a library or... your library!

What you can do with this one?
* Create/Read/Update/Delete books
* Create/Read/Update/Delete customers
* Inventory system



## First time using Laravel's project?

Well, if it is your first time with Laravel, you need to run these commands to test the project after downloading master's branch:

```
cd /your/location/folder
cp .env.example .env
php artisan key:generate
```
Now, on this step, open your .env file and edit some lines...
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=book_store <-- The database name of your choice
DB_USERNAME=root <-- MySql username
DB_PASSWORD= <-- Blank if you don't have password, also put it
```

```
php artisan migrate && php artisan serve
```
