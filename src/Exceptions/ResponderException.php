<?php

namespace LaraToolbox\Responder\Exceptions;

use Exception;

class ResponderException extends Exception
{
    private $responseCode;
    private $responseData;

    /**
     * ResponderException constructor.
     *
     * @param array $responseCode
     * @param null $data
     * @see \LaraToolbox\Responder\ResponseCodes
     */
    public function __construct($responseCode, $data = null)
    {
        parent::__construct($responseCode['message'], $responseCode['code']);

        $this->responseCode = $responseCode;
        $this->responseData = $data;
    }

    /**
     * Disable reporting
     */
    public function report()
    {
        //
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function render()
    {
        return responder()
            ->setResponseMeta($this->responseCode)
            ->setData($this->responseData)
            ->send();
    }
}
