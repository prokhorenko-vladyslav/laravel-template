<?php

namespace App\Http\Responses;

use App\Enums\ResponseAlias;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;

readonly class AppResponse implements Responsable
{
    public bool $status;

    public int $code;

    public ResponseAlias $alias;

    public mixed $data;

    public array $meta;

    public function __construct(
        bool $status,
        int $code,
        ResponseAlias $alias,
        mixed $data = null,
        array $meta = []
    ) {
        $this->status = $status;
        $this->code = $code;
        $this->alias = $alias;
        $this->data = $this->parseData($data);
        $this->meta = $meta;
    }

    public function successful(): bool
    {
        return $this->status;
    }

    public function failed(): bool
    {
        return !$this->successful();
    }

    public function toResponse($request): JsonResponse
    {
        $alias = $this->alias()->name;
        $message = __($alias);

        return response()->json([
            "message" => $message,
            "alias" => $alias,
            ...$this->data()
        ], $this->code);
    }

    private function parseData(mixed $data): array
    {
        if ($data instanceof ResourceCollection) {
            return $data->toResponse(request())->getData(true);
        }

        return [ "data" => $data ];
    }
}
