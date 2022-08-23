<?php
/**TODO comment below three lines */
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
require_once '../vendor/autoload.php';
require_once($_SERVER['DOCUMENT_ROOT'].'/../src/config/config.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../src/config/default_timeout.php');
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory; 

$app = AppFactory::create();
$app->addBodyParsingMiddleware();

$app->get('/', function (Request $request, Response $response, array $args) {
  $response->getBody()->write("200");
  return $response;
});

require_once '../src/routes/compiler_route.php';

$app->run();
