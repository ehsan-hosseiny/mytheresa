### To run project please use below commands
`composer install`

`sudo docker-compose up -d`

### To run table migration, Should be call inside docker container
`sudo docker exec -it mytheresa_php_1 sh`

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
