<?php

namespace App\Actions;

use App\Contracts\Action;
use App\DTO\ExampleDTO;
use App\Enums\CodeAction;
use App\Enums\ResponseAlias;
use App\Enums\UserFlag;
use App\Exceptions\ThrowableResponse;
use App\Http\Responses\AppResponse;
use App\Models\User;
use App\Services\Auth\CodeService;
use App\Services\Auth\UserService;

readonly class ExampleAction implements Action
{
    public function __construct(
        private UserService $userService,
        private CodeService $codeService,
    ) {}

    /**
     * @throws ThrowableResponse
     */
    public function handle(ExampleDTO $DTO): AppResponse
    {
        $user = $this->tryToIdentifyUserByCodeAndEmail($DTO->email, $DTO->code);
        $this->markEmailAsVerified($user);
        $this->revokeCodeFor($user, $DTO->code);

        return ok(ResponseAlias::USER_EMAIL_VERIFIED);
    }

    /**
     * @throws ThrowableResponse
     */
    private function tryToIdentifyUserByCodeAndEmail(string $email, string $code): User
    {
        $user = $this->userService->identifyByCodeAndEmail(
            $email,
            $code,
            CodeAction::USER_EMAIL_VERIFICATION
        );

        return $user ?? throwNotFound(ResponseAlias::USER_NOT_FOUND_OR_CODE_EXPIRED);
    }

    protected function markEmailAsVerified(User $user): void
    {
        $user->flag(UserFlag::EMAIL_VERIFIED->name);
    }

    protected function revokeCodeFor(User $user, string $code): void
    {
        $this->codeService->revokeFor($user, $code);
    }
}
