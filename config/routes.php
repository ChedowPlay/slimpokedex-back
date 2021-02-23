<?php
use Slim\App;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

return function (App $app) {

    $app->get('/', function (
        ServerRequestInterface $request,
        ResponseInterface $response
    ) {
        $response->getBody()->write('Hello, World!');

        return $response;
    });


    $app->post('/poke', \App\Action\PokeCreateAction::class);
    $app->get('/poke', \App\Action\PokeListAction::class);
    $app->get('/poke/{id}', \App\Action\PokeReaderAction::class);
    $app->put('/poke', \App\Action\PokeUpdateAction::class);
    $app->delete('/poke/{id}', \App\Action\PokeDeleteAction::class);


  




};
