# Performance-comparison-of-PHP-frameworks

## Table of contents
* [Introduction](#introduction)
* [Technologies](#technologies)
* [Application usage](#application-usage)
* [Results](#results)
* [Source](#source)

## Introduction
The aim of the project was to check and compare the performance of platforms and programming microplatforms
in terms of created REST API services. It indicates two programming platforms and two microplatforms that were used to create web applications and a tool that allows to perform tests on previously implemented applications. The results of the research have been shown below. The times of sending requests were compared for basic types of HTTP methods found in created REST API web services.

## Technologies
* Laravel v6.9
* Symfony v4.4
* Lumen v6.2
* Slim v4.1
* Codeception v4.1

## Application usage
The four notes aplications allows for sending following requests:

| Type | URI | Description |
| ------ | ------ | ------ |
| GET | api/text | Return 'Hello World' message |
| GET | api/note| Return list of all notes |
| GET | api/note/{id} | Return single note |
| POST| api/note | Create new note |
| PUT| api/note/{id}  | Update existing note |
| DELETE| api/note/{id}  | Delete note |

Codeception tests running:
```sh
> php codecept.phar run tests\api\TextCest.php
> php codecept.phar run tests\api\NoteCest.php
```
## Results

##### Test case 1: Time of returning 'Hello World' message
![Hello World GET test](https://github.com/lukaszszy/Performance-comparison-of-PHP-frameworks/blob/master/test-codeception/tests/results/HW.jpg?raw=true)

##### Test case 2: Time of returning list of all notes
![GET test](https://github.com/lukaszszy/Performance-comparison-of-PHP-frameworks/blob/master/test-codeception/tests/results/GET.jpg?raw=true)

##### Test case 3: Time of returning single note
![GET one test](https://github.com/lukaszszy/Performance-comparison-of-PHP-frameworks/blob/master/test-codeception/tests/results/GET1.jpg?raw=true)

##### Test case 4: Time of creating new note
![POST test](https://github.com/lukaszszy/Performance-comparison-of-PHP-frameworks/blob/master/test-codeception/tests/results/POST.jpg?raw=true)

##### Test case 5: Time of updating existing note
![PUT test](https://github.com/lukaszszy/Performance-comparison-of-PHP-frameworks/blob/master/test-codeception/tests/results/PUT.jpg?raw=true)

##### Test case 6: Time of deleting note
![DELETE test](https://github.com/lukaszszy/Performance-comparison-of-PHP-frameworks/blob/master/test-codeception/tests/results/DELETE.jpg?raw=true)

## Source
These results come from *''The impact of using programming microframeworks on the performance of created REST API services''* publication.