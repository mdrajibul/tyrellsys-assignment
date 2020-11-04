const express = require('express');
const path = require('path');

const port = 3000;
const server = express();

server.use(express.static(path.resolve(__dirname, 'dist')));

server.listen(port);
console.log(`Applictaion Serving at http://**:${port}`);
