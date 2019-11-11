# REST API with API Platform

## Setup

Please follow these steps:

**Download Composer dependencies**

Just run:

```
composer install
```

**Start the built-in web server**

You can use Nginx or Apache, but Symfony's local web server
works even better.

To start the web server, open a terminal, move into the
project, and run:

```
symfony serve -d
```

You can already check out the site at `https://localhost:8000/api`

**Add sample data**

First, create a database as specified in `.env` within `DATABASE_URL` with:

```
php bin/console doctrine:database:create
```

Now, run migrations to sync between entities and database tables with:

```
php bin/console doctrine:migrations:migrate
```

Finally, import database dump provided under `sql/products.sql`.

**Try some endpoints too**

For getting all products paginated, try to hit
`https://localhost:8000/api/products.jsonld`, 
where `.jsonld` is a way to force your browser to accept and retrieve `application/json` mime type format. In `hydra:search` you will see how to use ordering by fields feature, e.g. by hitting `https://localhost:8000/api/products.jsonld?orderBy[rating]`

If you want to get a single product, just type into your browser
`https://localhost:8000/api/products/2.jsonld`

Or search products containing `apple` in their names with:
`https://localhost:8000/api/products.jsonld?name=apple` 

For other endpoints (POST new product, update with PATCH, replace with PUT, DELETE a product), 
use swagger's `Try it out` feature on `https://localhost:8000/api` 