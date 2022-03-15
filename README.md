# backend-dev-task

<h2>How to launch project: </h2>

1. Run "composer install" command to install laravel and all needed dependencies
2. Run "sail up" to build docker containers for launching demo project
3. Duplicate .env.example file to .env file and change DB connection variables to:
   <hr>
   DB_CONNECTION=mysql <br>
   DB_HOST=mysql <br>
   DB_PORT=3306 <br>
   DB_DATABASE=laravel <br>
   DB_USERNAME=sail <br>
   DB_PASSWORD=password <br>
   <hr>

4. Run "php artisan key:generate" command
5. Run "php artisan migrate --seed" to build database structure and seed dummy data
6. Hit http://localhost/products/api/products to get test API endpoint of all products stored into database
7. Examine project for more endpoints
8. Run "php artisan test"

<h1>Task:</h1>

<li>Create backend application API for business domain.</li>
<li>Fork your own copy of backend-dev-task and share the result with us.</li>

<h2>Requirements:</h2>
<li>Use PHP 7+</li>
<li>Use OOP</li>
<li>Follow best practices SOLID, Clean code etc.</li>
<li>Use plain PHP or Laravel</li>
<li>Data storage solution is up to you. DB, filesystem, cache, memory... </li>
<li>Cover code by tests. If you need use e.g. PHPUnit. There is no need to cover all code, just create a couple to show the principle</li>

<h3>Optional requirements for which additional points will be awarded for:</h3>
<li>Using DDD (Domain-Driven Design, Domain-Driven Design in PHP)</li>
<li>Using Hexagonal architecture</li>

<h2>Business logic:</h2>

Online shop has product sets and products. One product can only exist within one set. Product set is published if at
least one product inside the set is published. Set cannot contain 0 products.

<h4>Product set consists from:</h4>
<li>id</li>
<li>name - maximum length of 50</li>
<li>collection of products</li>

<h4>Product consists from:</h4>
<li>id</li>
<li>sku code</li>
<li>name - maximum length of 40</li>
<li>type - device or service</li>
<li>condition - new, used, refurbished</li>
<li>description title</li>
<li>description text</li>
<li>price</li>
<li>published - true, false</li>

<h4>Functionality</h4>
<li>Find product set - returns data from set, publishing state and product data within set</li>
<li>Create product set</li>
<li>Update product set</li>
<li>Find product - returns data from product, publishing state</li>
<li>Create product</li>
<li>Update product</li>
