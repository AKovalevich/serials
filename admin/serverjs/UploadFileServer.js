var fs = require('fs'),
  http = require('http'),
  auth = require('basic-auth');

http.createServer(function (request, response) {
    'use strict';

    var credentials = auth(request);

    if (!credentials || credentials.name !== 'bwb' || credentials.pass !== 'bwb2016') {
        response.statusCode = 401;
        response.setHeader('WWW-Authenticate', 'Basic realm="example"');
        response.end('Access denied');
    } else {
        var newFile = fs.createWriteStream('../storage/app/public/videos' + request.url),
            fileBytes = request.headers['content-length'],
            uploadedBytes = 0,
            progress;

        request.pipe(newFile);

        request.on('data', function (chunk) {
            uploadedBytes += chunk.length;
            progress = (uploadedBytes / fileBytes) * 100;
            response.write("progress: " + parseFloat(progress).toFixed(4) + "%\n");
        });

        request.on('end', function () {
            response.end('uploaded!');
        });
    }
}).listen(8888);