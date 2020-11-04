# tyrellsys-client

`A simple react client application for playing card distribution.
 @author Md.Rajib Ul Islam <mdrajibul@gmail.com>
`

### Installation

 - clone repo from git https://github.com/mdrajibul/tyrellsys-assignment.git
 - cd to tyrellsys-assignment/tyrellsys-client
 - run ```npm install```
 - run ```npm start```
 - Browse in browser
 - Please update api url in src/api-config.json if base url changed

### Commands
 - To make production build run ```npm run build```
 - To test project  ```npm run test```
 - To prettify code base ```npm run prettier```
 - To linr code base ```npm run lint:fix```

### This project dockerised. To run the project in container you have to follow below steps
- cd to /project. As I set WORKDIR to /project. If you want to change then please change
- clone repo from git https://github.com/mdrajibul/tyrellsys-assignment.git
- cd to ./tyrellsys-assignment/tyrellsys-client
- Please update api url in src/api-config.json if base url changed
- After done run below command
- docker build -t tyrellsys-client .
- docker run -p 3000:3000 -d --name=docker-tyrellsys-client tyrellsys-client
- Finally browse http://HOST:3000