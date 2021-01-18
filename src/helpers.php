<?php

if (!function_exists('responder')) {
    /**
     * @param null|mixed $data
     * @return \LaraToolbox\Responder\Responder
     */
    function responder($data = null) {
        $responder = app(\LaraToolbox\Responder\Responder::class);

        if (!is_null($data)) {
            $responder->setData($data);
        }

        return $responder;
    }
}
