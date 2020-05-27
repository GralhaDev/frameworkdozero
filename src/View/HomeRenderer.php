<?php

namespace GralhaFW\View;

class HomeRenderer {
    public static function render(string $home_type) {
        return <<<TEMPLATE
        <h1>$home_type</h1>
        TEMPLATE;
    }
}