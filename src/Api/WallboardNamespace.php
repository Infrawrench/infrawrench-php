<?php

/*
 * infrawrench/sdk v1.31.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.31.0).
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
use Infrawrench\Sdk\Model\WallboardResponse;
use Infrawrench\Sdk\RequestOptions;

/** `$client->wallboard` */
final class WallboardNamespace extends ApiNamespace
{
    /**
     * Everything that is wrong right now, for a screen on a wall
     *
     * A different reading of data the product already holds, built on one rule: a wallboard may
     * only show things that are true **right now** and that somebody would cross a room to look
     * at. There is deliberately no history, no trend and no breakdown — those belong on the page
     * you open when you do walk over.
     *
     * Three sources — declared incidents, synthetic probes and account sync health — each guarded
     * independently, because a television that goes blank because one query threw is showing
     * nothing to a room that was relying on it.
     *
     * Session-authenticated on purpose: unlike the calendar feed or a public status page, this
     * carries incident titles, probe names and account names, and a screen in an office is exactly
     * what a visitor photographs. The machine driving the wall signs in once.
     *
     * GET /api/org/{orgId}/wallboard
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): WallboardResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/wallboard',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return WallboardResponse::fromArray(Coerce::toArray($data));
    }
}
