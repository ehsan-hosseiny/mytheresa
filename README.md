### To run project please use below commands
`composer install`

`sudo docker-compose up -d`

### To run table migration, Should be call inside docker container
`sudo docker exec -it mytheresa_php_1 sh`

Copy .env.example to make .env with below database configure
- DB_CONNECTION=mysql
- DB_HOST=database
- DB_PORT=3306
- DB_DATABASE=mytheresa_db
- DB_USERNAME=root
- DB_PASSWORD=root
then run below command

`php artisan migrate --seed`

<br><hr>

#### You can also run test inside docker container

- **`docker exec -it mytheresa_php_1 bash`**
- **`php artisan test`**

<hr>

#### Request url
`localhost/api/products`
<hr>

#### Query string parameters
- category
- priceLessThan
