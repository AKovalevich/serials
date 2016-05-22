'use strict';

var fs = require('fs'),
    stat,
    path,
    regexp,
    total,
    docroot = '../storage/app/public/videos/';


exports.videoStream = function (request, responce, next) {
  path = docroot + request.params.video;

  fs.access(path, fs.R_OK, function (err) {
    if (err) {
      responce.writeHead(403, {"Content-Type": "text/html"});
      responce.end('Access Denied');
    }
    else {
      stat = fs.statSync(path);
      total = stat.size;
      if (request.headers['range']) {
        var range = request.headers.range,
          parts = range.replace(/bytes=/, "").split("-"),
          partialStart = parts.shift(),
          partialEnd = parts.shift(),
          start = parseInt(partialStart, 10),
          end = partialEnd ? parseInt(partialEnd, 10) : total - 1,
          chunkSize = (end - start) + 1,
          file = fs.createReadStream(path, {start: start, end: end});

        responce.writeHead(206, {
          'Content-Range': 'bytes ' + start + '-' + end + '/' + total,
          'Accept-Ranges': 'bytes',
          'Content-Length': chunkSize,
          'Content-Type': 'video/mp4'
        });

        file.pipe(responce);
      }
      else {
        responce.writeHead(200, {'Content-Length': total, 'Content-Type': 'video/mp4'});
        fs.createReadStream(path).pipe(responce);
      }
    }
  });
};
