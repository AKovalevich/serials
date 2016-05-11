var http = require('http'),
  fs = require('fs'),
  cluster = require('cluster'),
  util = require('util');

if (cluster.isMaster) {
  var numWorkers = require('os').cpus().length;
  console.log('Master cluster setting up ' + numWorkers + ' workers...');

  for (var i = 0; i < numWorkers; i++) {
    cluster.fork();
  }

  cluster.on('online', function(worker) {
    console.log('Worker ' + worker.process.pid + ' is online');
  });

  cluster.on('exit', function(worker, code, signal) {
    console.log('Worker ' + worker.process.pid + ' died with code: ' + code + ', and signal: ' + signal);
    console.log('Starting a new worker');
    cluster.fork();
  });
}
else {
  http.createServer(function (req, res) {
    var path = '../storage/app/public/videos/1-Welcome%20to%20Republic%20City.%20A%20Leaf%20in%20the%20Wind.mp4';
    var stat = fs.statSync(path);
    var total = stat.size;
    if (req.headers['range']) {
      var range = req.headers.range;
      var parts = range.replace(/bytes=/, "").split("-");
      var partialstart = parts[0];
      var partialend = parts[1];
      var start = parseInt(partialstart, 10);
      var end = partialend ? parseInt(partialend, 10) : total-1;
      var chunksize = (end-start)+1;

      var file = fs.createReadStream(path, {start: start, end: end});
      res.writeHead(206, { 'Content-Range': 'bytes ' + start + '-' + end + '/' + total, 'Accept-Ranges': 'bytes', 'Content-Length': chunksize, 'Content-Type': 'video/mp4' });
      file.pipe(res);
    }
    else {
      res.writeHead(200, { 'Content-Length': total, 'Content-Type': 'video/mp4' });
      fs.createReadStream(path).pipe(res);
    }
  }).listen(1337);
}
