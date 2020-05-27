<?php

namespace GralhaFW\ServiceContainer;

class Resolver {

    private static $services = [];

    public static function get(string $service_name) {
        if (!\array_key_exists($service_name, self::$services)) {
            self::$services[$service_name] = $service_name::factory();
        }
        return self::$services[$service_name];
    }
}