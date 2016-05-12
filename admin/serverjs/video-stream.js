'use strict';

var fs = require('fs');

exports.videoStream = function (request, responce, next) {
  var path = request.params.video;

  var regexp = /http/;
  //path = 'http://static.videogular.com/assets/videos/videogular.mp4';
  //path = '../storage/app/public/videos/1-Welcome%20to%20Republic%20City.%20A%20Leaf%20in%20the%20Wind.mp4';

  if (regexp.test(path)) {
    responce.writeHead(200, {"Content-Type": "text/html"});
    responce.end('<video src="' + path + '" controls></video>');
  }
  else {
    var stat = fs.statSync(path),
      total = stat.size;
    if (request.headers['range']) {
      var range = request.headers.range,
        parts = range.replace(/bytes=/, "").split("-"),
        partialstart = parts[0],
        partialend = parts[1],
        start = parseInt(partialstart, 10),
        end = partialend ? parseInt(partialend, 10) : total - 1,
        chunksize = (end - start) + 1,
        file = fs.createReadStream(path, {start: start, end: end});

      responce.writeHead(206, {
        'Content-Range': 'bytes ' + start + '-' + end + '/' + total,
        'Accept-Ranges': 'bytes',
        'Content-Length': chunksize,
        'Content-Type': 'video/mp4'
      });

      file.pipe(responce);
    }
    else {
      responce.writeHead(200, {'Content-Length': total, 'Content-Type': 'video/mp4'});
      fs.createReadStream(path).pipe(responce);
    }
  }
};
