<?php

if (!function_exists('responder')) {
    /**
     * @return \LaraToolbox\Responder\Responder
     */
    function responder() {
        return app(\LaraToolbox\Responder\Responder::class);
    }
}
