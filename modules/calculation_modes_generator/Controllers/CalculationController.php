<?php

namespace app\Controllers;

use Craft\Http\Message\Stream;
use Craft\Http\ResponseTypes\HtmlResponse;

use app\Repositories\StorageCalculationLogRepository;
use app\Handler\HandlerInterface;
use app\Http\Render\RenderHTML;
use app\DTO\DTO;
use ReflectionException;

class CalculationController implements ControllerInterface
{
    /**
     * @param HandlerInterface $handler
     * @param StorageCalculationLogRepository $repository
     */
    public function __construct(
        public HandlerInterface $handler,
        protected StorageCalculationLogRepository $repository
    ) { }

    /**
     * @param $request
     * @return HtmlResponse
     * @throws ReflectionException
     */
    public function actionCalculate($request): HtmlResponse
    {
        $response = new HtmlResponse();

        $firstNumber = $request->getUri()->getQueryParams()['firstNumber'];
        $secondNumber = $request->getUri()->getQueryParams()['secondNumber'];

        $context = new DTO($firstNumber, $secondNumber);

        $this->handler->handle($context);

        $this->repository->save($context);

        $render = new RenderHTML();

        $data = $render->render($context);

        $response->setBody(new Stream($data));

        return $response;
    }
}
