<?php

/*
 * infrawrench/sdk v0.34.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.34.0).
 *
 * DO NOT EDIT. Regenerate with:
 *   pnpm --filter @infrawrench/web generate:sdk
 *
 * Internal routes are absent by construction: the generator consumes the same
 * published spec that /openapi.json serves, which drops every operation
 * marked x-internal.
 */

declare(strict_types=1);

namespace Infrawrench\Sdk\Internal;

/**
 * One HTTP call, exactly as a generated method describes it.
 *
 * Every generated method builds one of these and hands it to {@see Transport}.
 * Nothing about a particular route lives in the transport, and nothing about
 * HTTP lives in the generated methods.
 */
final class RequestSpec
{
    /**
     * @param string               $path       URL template with `{name}` placeholders.
     * @param array<string, mixed> $pathParams Values for those placeholders. A
     *                                         `null` falls through to the client's
     *                                         own configuration.
     * @param array<string, mixed> $query      Query parameters; `null` values are dropped.
     * @param mixed                $body       JSON body. Only read when `$hasBody`.
     * @param array<string, mixed>|null $form  `multipart/form-data` fields. Mutually
     *                                         exclusive with `$body`.
     * @param 'json'|'binary'|'empty' $accept  What the endpoint returns.
     * @param bool                 $hasBody    Distinguishes "no body" from a body
     *                                         that is literally `null`, which
     *                                         `$body` alone cannot.
     */
    public function __construct(
        public readonly string $method,
        public readonly string $path,
        public readonly array $pathParams = [],
        public readonly array $query = [],
        public readonly mixed $body = null,
        public readonly ?array $form = null,
        public readonly string $accept = 'json',
        public readonly bool $hasBody = false,
    ) {
    }
}
