<?php

/*
 * infrawrench/sdk v0.4.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.4.0).
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
use Infrawrench\Sdk\Model\InvitationDetail;
use Infrawrench\Sdk\RequestOptions;

/** `$client->invitations->byToken` */
final class InvitationsByTokenNamespace extends ApiNamespace
{
    /**
     * Get invitation details by token
     *
     * GET /api/invitations/by-token/{token}
     *
     * Raises on 404: Not found
     *
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(string $token, ?RequestOptions $options = null): InvitationDetail
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/invitations/by-token/{token}',
                pathParams: ['token' => $token],
            ),
            $options,
        );

        return InvitationDetail::fromArray(Coerce::toArray($data));
    }
}
