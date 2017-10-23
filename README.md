doctrine-demo-nantes
====================

Demo project to explain how Doctrine works (query, lazy-loading, cache, ...).

## Run the tests

### Install database

Run a postgresql in docker
```bash
docker run --name doctrine-demo-db -e POSTGRES_PASSWORD=DemoNantes44 -p 5432:5432 -d postgres:9.6.5
```

Note: To start or stop the container, use the commands:
```bash
docker stop doctrine-demo-db
docker start doctrine-demo-db
```

Create the database
```bash
php bin/console doctrine:database:create --env=test
php bin/console doctrine:schema:update --force --env=test
php bin/console doctrine:schema:validate --env=test
```

### Run all the tests

```bash
vendor/bin/phpunit
```

### How to use the tests

These tests are a support to show how doctrine worked.

The idea is to execute the test and see when Doctrine trigger sql requests.

Run the test in debug, go forward step by step and analyze: 
- sql requests by watching the log with `tail -f var/logs/test.log`
- query results by looking at the console output