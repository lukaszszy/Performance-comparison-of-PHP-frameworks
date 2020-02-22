<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\StreamInterface;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();
$app->addBodyParsingMiddleware();
$noteResource = new \App\Resource\NoteResource();

$app->get('/api/text', function (Request $request, Response $response, $args) {
    $data = array('message' => 'Hello world');
    $payload = json_encode($data);
    $response->getBody()->write($payload);
    return $response->withHeader('Content-Type', 'application/json');
});


// Note API

$app->get('/api/note', function (Request $request, Response $response, $args){
    $noteResource = new \App\Resource\NoteResource();
    $data = $noteResource->index();
    $response->getBody()->write($data);
    return $response->withHeader('Content-Type', 'application/json');
});

$app->get('/api/note/{id}', function (Request $request, Response $response, $args){
    $noteResource = new \App\Resource\NoteResource();
    $data = $noteResource->show($args['id']);
    $response->getBody()->write($data);
    return $response->withHeader('Content-Type', 'application/json');
});

$app->post('/api/note', function (Request $request, Response $response, $args){
    $noteResource = new \App\Resource\NoteResource();
    $data = $noteResource->create($request);
    $response->getBody()->write($data);
    return $response->withHeader('Content-Type', 'application/json');
});

$app->put('/api/note/{id}', function (Request $request, Response $response, $args){
    $noteResource = new \App\Resource\NoteResource();
    $data = $noteResource->update($args['id'], $request);
    $response->getBody()->write($data);
    return $response->withHeader('Content-Type', 'application/json');
});

$app->delete('/api/note/{id}', function (Request $request, Response $response, $args){
    $noteResource = new \App\Resource\NoteResource();
    $data = $noteResource->destroy($args['id']);
    $response->getBody()->write($data);
    return $response->withHeader('Content-Type', 'application/json');
});

$app->run();