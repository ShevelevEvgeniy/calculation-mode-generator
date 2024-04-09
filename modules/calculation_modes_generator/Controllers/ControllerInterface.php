<?php

namespace app\Controllers;

use Craft\Http\ResponseTypes\HtmlResponse;

interface ControllerInterface
{
    public function actionCalculate($request): HtmlResponse;
}
