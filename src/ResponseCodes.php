<?php

namespace LaraToolbox\Responder;

abstract class ResponseCodes
{
    public const SUCCESS = [
        'code' => 0,
        'message' => null
    ];

    public const ERROR = [
        'code' => 120,
        'message' => 'An error occurred'
    ];
}
