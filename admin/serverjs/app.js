'use strict';

var express = require('express'),
  cluster = require('cluster'),
  vs = require('./helpers/video-stream'),
  app = express();

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
  app.get('/watch/:video', function(req, res, next) {
    vs.videoStream(req, res, next)
  });

  app.listen(1337);
}
