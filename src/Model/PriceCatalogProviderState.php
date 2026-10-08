<?php

/*
 * infrawrench/sdk v1.77.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.77.0).
 *
 * DO NOT EDIT. Regenerate with:
 *   pnpm --filter @infrawrench/web generate:sdk
 *
 * Internal routes are absent by construction: the generator consumes the same
 * published spec that /openapi.json serves, which drops every operation
 * marked x-internal.
 */

declare(strict_types=1);

namespace Infrawrench\Sdk\Model;

/**
 * `no-account`: the provider's price API needs credentials and the org has no account on it.
 * `loading`: the first fetch is still running, ask again shortly.
 *
 * The values `PriceCatalogProviderState` accepts.
 *
 * Constants rather than an enum, deliberately: a value added by a newer API version has to
 * deserialize, and `enum::from()` would raise instead.
 */
final class PriceCatalogProviderState
{
    public const READY = 'ready';
    public const NO_ACCOUNT = 'no-account';
    public const NO_REGION = 'no-region';
    public const LOADING = 'loading';
    public const ERROR = 'error';

    /**
     * Every value, in the order the spec lists them.
     *
     * @return list<string>
     */
    public static function values(): array
    {
        return [
            self::READY,
            self::NO_ACCOUNT,
            self::NO_REGION,
            self::LOADING,
            self::ERROR,
        ];
    }
}
