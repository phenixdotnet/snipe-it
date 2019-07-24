<?php

/**
 * ---------------------------------------------------------------------
 * THIS IS NOT PART OF THE ORIGINAL CORS PACKAGE. IT IS A MODIFICATION
 * BY SNIPE-IT TO ALLOW ADDING ALLOWED ORIGINS VIA THE ENV.
 * ---------------------------------------------------------------------
 *
 * Since we don't really want people editing config files (lest they get
 * overwritten later), this enables the person managing the Snipe-IT
 * installation to modify these values without modifying the code.
 *
 * If APP_CORS_ALLOWED_ORIGINS is not set in the .env or is null (for example if no one added it
 * after amn upgrade from a previous version that didn't include it in the .env.example),
 * set it to * to allow all. If there is a value, either a single url or a comma-delimited
 * list of urls, explode that out into an array to whitelist just those urls.
 *
 */

$allowed_origins = env('APP_CORS_ALLOWED_ORIGINS') !== null ?
    explode(',', env('APP_CORS_ALLOWED_ORIGINS')) : ['*'];

return [

    /*
    |--------------------------------------------------------------------------
    | Laravel CORS
    |--------------------------------------------------------------------------
    |
    | allowedOrigins, allowedHeaders and allowedMethods can be set to array('*')
    | to accept any value.
    |
    */
   
    'supportsCredentials' => false,
    'allowedOrigins' => $allowed_origins,
    'allowedOriginsPatterns' => [],
    'allowedHeaders' => ['*'],
    'allowedMethods' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE'],
    'exposedHeaders' => [],
    'maxAge' => 0,

];
