<?php

namespace app\Http\Middlewares;

use Craft\Contracts\RequestInterface;
use Craft\Contracts\MiddlewareInterface;

class LoggingMiddleware implements MiddlewareInterface
{
    /**
     * @param RequestInterface $request
     * @return void
     */
    public function process(RequestInterface $request): void
    {
        $filePath = PROJECT_ROOT . 'runtime/logs';

        if (is_dir($filePath) === false) {
            mkdir($filePath);
        }

        $logData = date('Y-m-d H:i:s') . ' - ' . $request->getMethod() . ' ' . $request->getUri() . PHP_EOL;

        file_put_contents($filePath . '/' . date('Y-m-d H:i:s'),  $logData, FILE_APPEND);
    }
}
