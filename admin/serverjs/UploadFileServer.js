var fs = require('fs'),
  http = require('http'),
  auth = require('basic-auth'),
  mkdirp = require('mkdirp');

http.createServer(function (request, response) {
  'use strict';

  var credentials = auth(request);

  if (!credentials || credentials.name !== 'bwb' || credentials.pass !== 'bwb2016') {
    response.statusCode = 401;
    response.setHeader('WWW-Authenticate', 'Basic realm="example"');
    response.end('Access denied');
  } else {
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
          //response.write("progress: " + parseFloat(progress).toFixed(4) + "%\n");
        });

        request.on('end', function () {
          response.end('Uploaded');
        });
      }
    });
  }
}).listen(8888);
