'use strict';

var fs = require('fs'),
  cluster = require('cluster'),
  http = require('http'),
  auth = require('basic-auth'),
  mkdirp = require('mkdirp');

if (cluster.isMaster) {
  var numWorkers = require('os').cpus().length;
  console.log('Master cluster setting up ' + numWorkers + ' workers...');

  for (var i = 0; i < numWorkers; i++) {
    cluster.fork();
  }

  cluster.on('online', function (worker) {
    console.log('Worker ' + worker.process.pid + ' is online');
  });

  cluster.on('exit', function (worker, code, signal) {
    console.log('Worker ' + worker.process.pid + ' died with code: ' + code + ', and signal: ' + signal);
    console.log('Starting a new worker');
    cluster.fork();
  });
}
else {
  http.createServer(function (request, response) {
    var credentials = auth(request);

    if (!credentials || credentials.name !== 'bwb' || credentials.pass !== 'bwb2016') {
      response.statusCode = 401;
      response.setHeader('WWW-Authenticate', 'Basic realm="example"');
      response.end('Access denied');
    }
    else {
      var file = request.url,
        folders = file.split('.'),
        tvShow = folders.shift(),
        season = folders.shift(),
        episode = folders.shift(),
        quality = folders.shift(),
        name = folders.shift(),
        extension = folders.shift(),
        filename = [name, extension].join('.'),
        path = [tvShow, season, episode, quality].join('/');

      path = path.replace(/%20/g, ' ');
      filename = filename.replace(/%20/g, ' ');

      mkdirp('../storage/app/public/videos/' + path, function(err) {
        if (err) {
          console.error(err)
        }
        else {
          var newFile = fs.createWriteStream('../storage/app/public/videos/' + path + '/' + filename),
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
            response.end('Uploaded');
          });
        }
      });
    }
  }).listen(8888);
}
