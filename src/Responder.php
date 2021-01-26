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

    public function setHttpStatusCode(int $httpStatus): self
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
    public function setResponseMeta(array $response): self
    {
        $this->setResponseCode($response['code']);
        $this->setResponseMessage($response['message']);

        return $this;
    }

    public function setResponseCode(int $code): self
    {
        $this->responseCode = $code;

        return $this;
    }

    public function setResponseMessage(?string $message): self
    {
        $this->responseMessage = $message;

        return $this;
    }

    public function setData($data): self
    {
        $this->responseData = $data;

        return $this;
    }

    public function addExtraData($key, $value): self
    {
        $this->extraData[$key] = $value;

        return $this;
    }

    public function addHeader($key, $value): self
    {
        $this->headers[$key] = $value;

        return $this;
    }

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
