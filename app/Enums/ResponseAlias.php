<?php

namespace App\Enums;

enum ResponseAlias
{
    /**
     * Common
     */
    case VALIDATION_ERRORS;
    case TOO_MANY_REQUESTS;
    case NOT_AUTHENTICATED;

    /**
     * Auth
     */
    case USER_FOUND;
    case USER_NOT_FOUND;
    case USER_NOT_FOUND_OR_CODE_EXPIRED;
    case USER_LOGGED_IN;
    case USER_LOGGED_OUT;
    case USER_REGISTERED;
    case USER_WITH_SAME_EMAIL_EXISTS;
    case USER_CREDENTIALS_INVALID;
    case USER_EMAIL_NOT_VERIFIED;
    case USER_EMAIL_VERIFIED;
    case USER_VERIFICATION_EMAIL_SENT;
    case USER_PASSWORD_RECOVER_EMAIL_SENT;
    case USER_PASSWORD_CHANGED;
}
