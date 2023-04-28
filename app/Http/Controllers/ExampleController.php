<?php

namespace App\Http\Controllers;

use App\Actions\ExampleAction;
use App\DTO\ExampleDTO;
use App\Exceptions\ThrowableResponse;
use App\Http\Responses\AppResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ExampleController
{
    /**
     * @throws ValidationException
     * @throws ThrowableResponse
     */
    public function route(Request $request, ExampleAction $action): AppResponse
    {
        $dto = ExampleDTO::make($request->all());
        return $action->handle($dto);
    }
}
