<?php

require_once "vendor/autoload.php";

/**
 * Três divisões básicas
 * 
 * Router - Done
 * Service Manager (Dependency Injection) - Done
 * """View""" - Done
 * 
 */

\GralhaFW\ServiceContainer\Resolver::get(
    \GralhaFW\Router\Resolver::class
)->resolve();