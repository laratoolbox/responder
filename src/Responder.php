<?php

namespace LaraToolbox\Responder;

class Responder
{
    private $httpStatus = 200;
    private $responseCode = ResponseCodes::SUCCESS['code'];
    private $responseMessage = ResponseCodes::SUCCESS['message'];
    private $responseData = null;
    private $extraData = [];
    private $headers = [];

    /**
     * @param null|mixed $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function send($data = null)
    {
        if (!is_null($data)) {
            $this->setData($data);
        }

        return $this->sendResponse();
    }

    /**
     * @param int $httpStatus
     * @return \LaraToolbox\Responder\Responder
     */
    public function setStatusCode(int $httpStatus): self
    {
        $this->httpStatus = $httpStatus;

        return $this;
    }

    /**
     * @param $response (array should have code and message keys)
     * @return \LaraToolbox\Responder\Responder
     *
     * @see \LaraToolbox\Responder\ResponseCodes
     */
    public function setResponseCode($response): self
    {
        $this->responseCode = $response['code'];
        $this->responseMessage = $response['message'];

        return $this;
    }

    /**
     * @param mixed $data
     * @return \LaraToolbox\Responder\Responder
     */
    public function setData($data): self
    {
        $this->responseData = $data;

        return $this;
    }

    /**
     * @param $key
     * @param $value
     * @return \LaraToolbox\Responder\Responder
     */
    public function addExtraData($key, $value): self
    {
        $this->extraData[$key] = $value;

        return $this;
    }

    /**
     * @param $key
     * @param $value
     * @return \LaraToolbox\Responder\Responder
     */
    public function addHeader($key, $value): self
    {
        $this->headers[$key] = $value;

        return $this;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    private function sendResponse()
    {
        return response()
            ->json(
                array_merge(
                    [
                        'code' => $this->responseCode,
                        'message' => $this->responseMessage,
                        'data' => $this->responseData,
                    ],
                    $this->extraData
                )
            )
            ->withHeaders($this->headers)
            ->setStatusCode($this->httpStatus);
    }
}
