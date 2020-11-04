# tyrellsys-api

`A simple rest api framework and card distribution api.
 @author Md.Rajib Ul Islam <mdrajibul@gmail.com>
`

### Installation
 - clone repo from git https://github.com/mdrajibul/tyrellsys-assignment.git
 - cd to tyrellsys-assignment/tyrellsys-api
 - Copy project to any web server apache 2, NgInx etc
 - If project run under context then please update APPNAME config in app/config.define.php file
 - browse the project or use any rest api test tool

### Framework overview
 - core: all core related library placed here to make simple rest framework
 - app: application directory. all application related source code need to place here
 
### available api endpoints
 - /card/distribute/:noOfPlayer  - distribute card api 
 
 ### This project dockerised. To run the project in container you have to follow below steps
 - cmd to /project. As I set WORKDIR to /project. If you want to change then please change
 - clone repo from git https://github.com/mdrajibul/tyrellsys-assignment.git
 - cmd to ./tyrellsys-assignment/tyrellsys-api
 - After done run below command
 - docker build -t tyrellsys-api .
 - docker run -p 82:82 -d --name=docker-tyrellsys-api tyrellsys-api
 - Finally browse http://HOST:82