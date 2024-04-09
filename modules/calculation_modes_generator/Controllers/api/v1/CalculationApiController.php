<?php

namespace app\Controllers\api\v1;

use Craft\Http\Message\Stream;
use Craft\Http\ResponseTypes\JsonResponse;

use app\Handler\HandlerInterface;
use app\DTO\DTO;
use ReflectionException;

class CalculationApiController
{
    /**
     * @param HandlerInterface $handler
     */
    public function __construct(public HandlerInterface $handler) { }

    /**
     * @param $request
     * @return JsonResponse
     * @throws ReflectionException
     */
    public function actionCalculate($request): JsonResponse
    {
        $response = new JsonResponse();

        $queryParams = $request->getUri()->getQueryParams();

        $firstNumber = $queryParams['firstNumber'];
        $secondNumber = $queryParams['secondNumber'];

        $context = new DTO($firstNumber, $secondNumber);

        $this->handler->handle($context);

        $data = (array) $context;

        $response->setBody(new Stream(json_encode($data, JSON_UNESCAPED_UNICODE)));

        return $response;
    }
}
