<?php

use Slim\App;

return function ( App $app ) {
    // routing middleware
    $app->addRoutingMiddleware();
    // Add Error Handling Middleware
    $app->addErrorMiddleware( true, true, true );

};