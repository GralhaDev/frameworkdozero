<?php

namespace GralhaFW;

class HomeController {

    /** @var array */
    private $tipos;

    public function __construct(array $tipos) {
        $this->tipos = $tipos;
    }

    public function __invoke(?array $url_params) {
        print (\GralhaFW\View\HomeRenderer::render($this->tipos[$url_params['type']] ?? 'Num tem casa'));
    }

    public static function factory() {
        return new self(
            include "config/homes.php"
        );
    }
}