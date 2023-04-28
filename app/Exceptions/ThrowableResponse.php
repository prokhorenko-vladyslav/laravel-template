<?php

namespace App\Exceptions;

use App\Http\Responses\AppResponse;
use Exception;

class ThrowableResponse extends Exception
{
    public function __construct(
        public readonly AppResponse $response
    ) {
        parent::__construct();
    }
}
