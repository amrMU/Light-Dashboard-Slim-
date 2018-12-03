after git clone dont forget follow this steps  <br>
1 - run commend : sudo chmod -R 777 bootstrap/cache/ <br>
2 - run commend : sudo chmod -R 777 storage/ <br>
3- run commend : sudo chmod -R 777 public/uploads <br>

4- create database Name is "base_custom" or create database as you like and open <br>
main directory on project then .env file to set database name connection(DB_DATABASE,DB_USERNAME,DB_PASSWORD) <br>
defualt is a [<br>
'DB_DATABASE'=>'base_custom' , <br>
'DB_USERNAME'=>'root', <br>
'DB_PASSWORD'= '' <br>
] <br>
5- Run commend : php artisan migrate --seed <br>
can access dashboard using progict url/login <br>
try to use it and make a code review as you like <br> 