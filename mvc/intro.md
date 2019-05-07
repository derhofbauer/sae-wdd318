MVC - Model/View/Controller
===========================

## Models 

+ Topic
+ User
+ ...

- abstraktion der DB
- $user->get(<id>); <-- CRUD (MySQL) im Model abgebildet

## Views

+ Topic Overview
+ Topic Detail
+ Topic Abos
+ Login
+ ...

## Controller

+ Geschäftslogik
+ TopicController
  - Action list
  - Action show
  - Action delete
  - Action create
  - Action update
+ UserController
  - Action login
  - Action logout
  - Action create (signup)
  - Action update
  - ...

## Routes

GET  / -> TopicController:list
GET  /admin -> AdminController:list
GET  /admin/login -> LoginController:showForm
POST /admin/login -> LoginController:login

--> <DOMAIN>/index.php?controller=<name>&action=<action>