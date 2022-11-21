var http = require('http');

http.createServer(function (request, response) {

response.writeHead(200, {'Content-Type': 'text/plain'});
    response.end('Hello NodeJS!');
}).listen(9501);

console.log('Server is starting...');
