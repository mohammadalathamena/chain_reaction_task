# Chain Reaction Task

## Reqierment

### 1- php 8.0^

### 2- PHP Laravel Extensions

### 3- composer 

### 4- mysql 8.0^ 

#
## Installation 


### 1- run create database command 
```sh
echo "create database <Your Database Name , for example chain_reaction > ;" | mysql -u <Your Database User Name> -p 
```
### 1- copy .env.example and edit it 
```sh
cp .env.example ./.env
```
### 3- Edit .env  file


##### 1- edit APP_URL and insert your port if you are not work in port:8000
###### for example : " APP_URL=http://localhost:8000 "

##### 2- Insert your database name in DB_DATABASE

##### 3- Insert your database name and password in DB_USERNAME , DB_PASSWORD


### For Ubuntu 

##### run install file 

```sh
sh install.sh 
```
### For Windows  


##### 1- install composer  

```sh
composer install
```

##### 2- install npm  
```sh
npm install
```

##### 3- Run php artisan commands 

```sh
php artisan key:generate && php artisan migrate --seed && php artisan storage:link 
```
#
### Run server 

```sh
php artisan serve 
```

### Open your localhost with port

##### for example http://127.0.0.1:8000

## License

MIT

