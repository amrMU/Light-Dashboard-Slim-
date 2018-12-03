#after git clone dont forget follow this steps 

 1. run commend : sudo chmod -R 777 bootstrap/cache
  2. run commend : sudo chmod -R 777 storage
  3- run commend : sudo chmod -R 777 public/uploads 
  4- create database Name is "base_custom" or create database as you like and open main directory on project then .env file to set database name connection(DB_DATABASE,DB_USERNAME,DB_PASSWORD) 
 defualt is a ['DB_DATABASE'=>'base_custom' , 'DB_USERNAME'=>'root', 'DB_PASSWORD'= ''] 
 5. Run commend : php artisan migrate --seed

### can access dashboard using progict url/login try to use it and make a code review as you like  
