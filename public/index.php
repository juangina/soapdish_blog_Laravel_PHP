<?php
//This is the same as use Illuminate\Contracts\Http\Kernel as Kernal;
use Illuminate\Contracts\Http\Kernel;
//This is the same as use Illuminate\Http\Request as Request;
use Illuminate\Http\Request;

//echo __DIR__.'/../vendor/autoload.php';

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Check If Application Is Under Maintenance
|--------------------------------------------------------------------------
|
| If the application is maintenance / demo mode via the "down" command we
| will require this file so that any prerendered template can be shown
| instead of starting the framework, which could cause an exception.
|
*/

if (file_exists(__DIR__.'/../storage/framework/maintenance.php')) {
    require __DIR__.'/../storage/framework/maintenance.php';
}

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| this application. We just need to utilize it! We'll simply require it
| into the script here so we don't need to manually load our classes.
|
*/

require __DIR__.'/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request using
| the application's HTTP kernel. Then, we will send the response back
| to this client's browser, allowing them to enjoy our application.
|
*/

$app = require_once __DIR__.'/../bootstrap/app.php';

$kernel = $app->make(Kernel::class);

// Typically tap has two arguments($value, $func).  In this example, it only has one argument ($func)
// Tap is like a value pass through operator function.  The value is operated on
// and the original value is returned from the function.
// The argument is passed to the arrowed shorthand function send for some operation
// Then the argument is returned back to response.
$response = tap(
    $kernel->handle($request = Request::capture())
)->send();

$kernel->terminate($request, $response);
