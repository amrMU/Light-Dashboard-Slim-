<p>after git clone dont forget follow this steps  </p>
<ol>
  <li>1 - run commend : sudo chmod -R 777 bootstrap/cache/</li>
  <li>2 - run commend : sudo chmod -R 777 storage</li>
  <li>3- run commend : sudo chmod -R 777 public/uploads </li>
  <li>4- create database Name is "base_custom" or create database as you like and open main directory on project then .env file to set database name connection(DB_DATABASE,DB_USERNAME,DB_PASSWORD) </li>
  </li>defualt is a ['DB_DATABASE'=>'base_custom' , 'DB_USERNAME'=>'root', 'DB_PASSWORD'= ''] </li>
  <li>5- Run commend : php artisan migrate --seed </li>
</ol>
<h3>can access dashboard using progict url/login try to use it and make a code review as you like  </h3>
