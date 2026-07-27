<?php

/*
 * infrawrench/sdk v0.5.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.5.0).
 *
 * DO NOT EDIT. Regenerate with:
 *   pnpm --filter @infrawrench/web generate:sdk
 *
 * Internal routes are absent by construction: the generator consumes the same
 * published spec that /openapi.json serves, which drops every operation
 * marked x-internal.
 */

declare(strict_types=1);

namespace Infrawrench\Sdk\Api;

use Infrawrench\Sdk\Internal\ApiNamespace;
use Infrawrench\Sdk\Internal\Coerce;
use Infrawrench\Sdk\Internal\RequestSpec;
use Infrawrench\Sdk\Model\KvCommandRequest;
use Infrawrench\Sdk\Model\KvCommandResponse;
use Infrawrench\Sdk\RequestOptions;

/** `$client->kv` */
final class KvNamespace extends ApiNamespace
{
    /**
     * Run a Redis-style KV command
     *
     * _Requires permission: `resources:execute`._
     *
     * POST /api/org/{orgId}/kv/command
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function command(KvCommandRequest $body, ?string $orgId = null, ?RequestOptions $options = null): KvCommandResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/kv/command',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return KvCommandResponse::fromArray(Coerce::toArray($data));
    }
}
