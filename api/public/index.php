<?php
# Инициализируем профайлер
xhprof_enable(XHPROF_FLAGS_CPU + XHPROF_FLAGS_MEMORY);
/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| First we need to get an application instance. This creates an instance
| of the application / container and bootstraps the application so it
| is ready to receive HTTP / Console requests from the environment.
|
*/

$app = require __DIR__.'/../bootstrap/app.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request
| through the kernel, and send the associated response back to
| the client's browser allowing them to enjoy the creative
| and wonderful application we have prepared for them.
|
*/

$app->run();

# Останавливаем профайлер после выполнения программы
$xhprof_data = xhprof_disable();
include_once "/var/www/xhprof-0.9.4/xhprof_lib/utils/xhprof_lib.php";
include_once "/var/www/xhprof-0.9.4/xhprof_lib/utils/xhprof_runs.php";
$xhprof_runs = new XHProfRuns_Default();
$run_id = $xhprof_runs->save_run($xhprof_data, "test");