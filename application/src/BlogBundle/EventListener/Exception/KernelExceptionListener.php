<?php

namespace BlogBundle\EventListener\Exception;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\VarDumper\VarDumper;

/**
 * Class KernelExceptionListener
 * @package BlogBunle\EventListener\Exception
 */
class KernelExceptionListener
{
    const DEFAULT_EXCEPTION_CONTENT_PATTERN = 'Error: %s with code: %s';
    const HTTP_EXCEPTION_CONTENT_PATTERN = 'Error: %s with code: %s';
    const NOT_FOUNT_HTTP_EXCEPTION_CONTENT_PATTERN = 'Error: entity not found. Code: %s';

    /**
     * @param GetResponseForExceptionEvent $event
     */
    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        $exception = $event->getException();
        VarDumper::dump($exception);
        switch (true) {
            case $exception instanceof HttpException:
                $response = $this->generateHttpExceptionResponse($exception);
                break;
            default:
                $response = $this->generateDefaultExceptionResponse($exception);
        }

        $event->setResponse($response);
    }

    /**
     * @param \Exception $exception
     *
     * @return JsonResponse
     */
    private function generateDefaultExceptionResponse(\Exception $exception)
    {
        $content = sprintf(
            self::DEFAULT_EXCEPTION_CONTENT_PATTERN,
            $exception->getMessage(),
            $exception->getCode()
        );

        return $this->setResponseStatusCodeAndContent(
            new JsonResponse(),
            Response::HTTP_INTERNAL_SERVER_ERROR,
            $content
        );
    }

    /**
     * @param HttpException $exception
     *
     * @return JsonResponse
     */
    private function generateHttpExceptionResponse(HttpException $exception): JsonResponse
    {
        if ($exception instanceof NotFoundHttpException) {
            return $this->generateNotFountHttpResponse($exception);
        }

        $content = sprintf(
            self::HTTP_EXCEPTION_CONTENT_PATTERN,
            $exception->getMessage(),
            $exception->getCode()
        );

        $response = new JsonResponse();
        $response->headers->replace($exception->getHeaders());

        return $this->setResponseStatusCodeAndContent(
            new JsonResponse(),
            $exception->getStatusCode(),
            $content
        );
    }

    /**
     * @param NotFoundHttpException $exception
     *
     * @return JsonResponse
     */
    private function generateNotFountHttpResponse(NotFoundHttpException $exception): JsonResponse
    {
        $content = sprintf(
            self::NOT_FOUNT_HTTP_EXCEPTION_CONTENT_PATTERN,
            $exception->getCode()
        );

        return $this->setResponseStatusCodeAndContent(
            new JsonResponse(),
            Response::HTTP_NOT_FOUND,
            $content
        );
    }

    /**
     * @param JsonResponse $response
     * @param              $statusCode
     * @param              $content
     *
     * @return JsonResponse
     */
    private function setResponseStatusCodeAndContent(JsonResponse $response, $statusCode, $content): JsonResponse
    {
        $response->setStatusCode($statusCode);
        $response->setContent(json_encode([
            'message' => $content,
            'status'  => $statusCode
        ]));

        return $response;
    }
}