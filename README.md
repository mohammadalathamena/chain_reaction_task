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
echo "create database your_database_name ;" | mysql -u root -p 
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

### First Step
##### You must LogIn , by defult there is user called "firstHr" , you can log in with this email : "hr_email@chainReaction.com" and password : "asd123"
#
#
#

### Api List

| Route        | method           | details  |how can use api  |
| ------------- |:-------------:| -----------------:|-----------------:|
| api/hr      | POST | store new user |HR Manager|
| api/employee      | GET      |list all employee |HR Manager|
| api/employee/{id} | GET      |    show employee by id |HR Manager|
| api/change-status/{id} | PUT      |    active and deactive employee by id |HR Manager |
| api/contact | PUT      |    change employee contact details  |Employee|
| api/login | POST      |    log in to system  |All|
| api/logout | POST      |log out from system |All|

### Open your localhost with port

##### for example http://127.0.0.1:8000

## License

MIT

