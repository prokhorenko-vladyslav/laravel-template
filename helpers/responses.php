<?php

use App\Enums\ResponseAlias;
use App\Exceptions\ThrowableResponse;
use App\Http\Responses\AppResponse;
use Symfony\Component\HttpFoundation\Response;

if (!function_exists("successResponse")) {
    function successResponse(int $code, ResponseAlias $alias, mixed $data = null): AppResponse
    {
        return new AppResponse(true, $code, $alias, $data);
    }
}

if (!function_exists("failedResponse")) {
    function failedResponse(int $code, ResponseAlias $alias, mixed $data = null): AppResponse
    {
        return new AppResponse(false, $code, $alias, $data);
    }
}

if (!function_exists("throwSuccessResponse")) {
    /**
     * @throws ThrowableResponse
     */
    function throwSuccessResponse(int $code, ResponseAlias $alias, mixed $data = null): void
    {
        $response = successResponse($code, $alias, $data);
        throw new ThrowableResponse($response);
    }
}

if (!function_exists("throwFailedResponse")) {
    /**
     * @throws ThrowableResponse
     */
    function throwFailedResponse(int $code, ResponseAlias $alias, mixed $data = null): void
    {
        $response = failedResponse($code, $alias, $data);
        throw new ThrowableResponse($response);
    }
}

if (! function_exists("ok")) {
    function ok(ResponseAlias $alias, mixed $data = null): AppResponse
    {
        return successResponse(Response::HTTP_OK, $alias, $data);
    }
}

if (! function_exists("throwOk")) {
    /**
     * @throws ThrowableResponse
     */
    function throwOk(ResponseAlias $alias, mixed $data = null): void
    {
        throwFailedResponse(Response::HTTP_OK, $alias, $data);
    }
}

if (! function_exists("created")) {
    function created(ResponseAlias $alias, mixed $data = null): AppResponse
    {
        return successResponse(Response::HTTP_CREATED, $alias, $data);
    }
}

if (! function_exists("throwCreated")) {
    /**
     * @throws ThrowableResponse
     */
    function throwCreated(ResponseAlias $alias, mixed $data = null): void
    {
        throwFailedResponse(Response::HTTP_CREATED, $alias, $data);
    }
}

if (! function_exists("notFound")) {
    function notFound(ResponseAlias $alias): AppResponse
    {
        return successResponse(Response::HTTP_NOT_FOUND, $alias);
    }
}

if (! function_exists("throwNotFound")) {
    /**
     * @throws ThrowableResponse
     */
    function throwNotFound(ResponseAlias $alias, mixed $data = null): void
    {
        throwFailedResponse(Response::HTTP_NOT_FOUND, $alias, $data);
    }
}

if (! function_exists("notAuthorized")) {
    /**
     * @throws ThrowableResponse
     */
    function notAuthorized(ResponseAlias $alias, mixed $data = null): void
    {
        throwFailedResponse(Response::HTTP_UNAUTHORIZED, $alias, $data);
    }
}

if (! function_exists("throwUnauthorized")) {
    /**
     * @throws ThrowableResponse
     */
    function throwUnauthorized(ResponseAlias $alias, mixed $data = null): void
    {
        throwFailedResponse(Response::HTTP_UNAUTHORIZED, $alias, $data);
    }
}
