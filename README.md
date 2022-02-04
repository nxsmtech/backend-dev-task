# backend-dev-task

<h1>Task:</h1>

<li>Create backend application API for business domain.</li>
<li>Fork your own copy of backend-dev-task and share the result with us.</li>

<h2>Requirements:</h2>
<li>Use PHP 7+</li>
<li>Use OOP</li>
<li>Follow best practices SOLID, Clean codde etc.</li>
<li>Use plain PHP or Laravel</li>
<li>Data storage solution is up to you. DB, filesystem, cache, memory... </li>
<li>Cover code by tests. If you need use e.g. PHPUnit. There is no need to cover all code, just create a couple to show the principle</li>
 
<h3>Addtional points will be awarded for:</h3>
<li>Using DDD (Domain-Driven Design, Domain-Driven Design in PHP)</li>
<li>Using Hexagonal architecture</li>

<h2>Business logic:</h2>

Online shop has product sets and products. One product can only exist within one set. Product set is published if at least one product inside the set is published.

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
<li>Delete product set</li>
<li>Find product - returns data from product, publishing state</li>
<li>Create product</li>
<li>Update product</li>
<li>Delete product</li>
