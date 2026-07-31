<?php

/*
 * infrawrench/sdk v0.26.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.26.0).
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
use Infrawrench\Sdk\Model\DigestSendResult;
use Infrawrench\Sdk\Model\DigestSettings;
use Infrawrench\Sdk\Model\DigestSettingsUpdate;
use Infrawrench\Sdk\RequestOptions;

/** `$client->digest` */
final class DigestNamespace extends ApiNamespace
{
    /**
     * Get the organization's weekly digest settings
     *
     * The weekly digest is a Monday-morning summary of last week's spend (with week-over-week
     * movers), sync incidents, and resource churn, delivered to the Slack channels and Teams
     * webhooks opted into the weeklyDigest trigger.
     *
     * GET /api/org/{orgId}/digest
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): DigestSettings
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/digest',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return DigestSettings::fromArray(Coerce::toArray($data));
    }

    /**
     * Compose and send last week's digest now
     *
     * Ignores the schedule and the enabled flag — composes the digest for the last complete week
     * and posts it to every opted-in channel. Fails when no Slack channel or Teams webhook has the
     * weeklyDigest trigger on.
     *
     * POST /api/org/{orgId}/digest/send
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function send(?string $orgId = null, ?RequestOptions $options = null): DigestSendResult
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/digest/send',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return DigestSendResult::fromArray(Coerce::toArray($data));
    }

    /**
     * Enable or disable the weekly digest
     *
     * Enabling schedules the first digest for next Monday morning (07:00 UTC) rather than sending
     * immediately — use POST /digest/send for an immediate one.
     *
     * PUT /api/org/{orgId}/digest
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(?string $orgId = null, ?DigestSettingsUpdate $body = null, ?RequestOptions $options = null): DigestSettings
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/digest',
                pathParams: ['orgId' => $orgId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return DigestSettings::fromArray(Coerce::toArray($data));
    }
}
