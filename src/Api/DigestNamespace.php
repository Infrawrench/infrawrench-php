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

namespace Infrawrench\Sdk\Api;

use Infrawrench\Sdk\Internal\ApiNamespace;
use Infrawrench\Sdk\Internal\Coerce;
use Infrawrench\Sdk\Internal\RequestSpec;
use Infrawrench\Sdk\Internal\Transport;
use Infrawrench\Sdk\Model\DigestSendResult;
use Infrawrench\Sdk\Model\DigestSettings;
use Infrawrench\Sdk\Model\DigestSettingsUpdate;
use Infrawrench\Sdk\RequestOptions;

/** `$client->digest` */
final class DigestNamespace extends ApiNamespace
{
    /** `$client->digest->recipients` */
    public readonly DigestRecipientsNamespace $recipients;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->recipients = new DigestRecipientsNamespace($this->transport);
    }

    /**
     * Get the organization's weekly digest settings
     *
     * The weekly digest is a summary of the last complete Monday-to-Sunday week's spend (with
     * week-over-week movers), sync incidents, and resource churn, delivered to the Slack channels
     * and Teams webhooks opted into the weeklyDigest trigger and to the organization's digest
     * email recipients. The response also carries the outcome of the most recent delivery attempt
     * so a silently failing digest is visible.
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
     * and sends it to every opted-in channel and email recipient. This is also the manual recovery
     * for a partial delivery, which is never retried automatically. Fails when nothing is routed
     * to receive the digest, or when every destination rejected it.
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
     * Update the weekly digest settings
     *
     * Every field is optional. Enabling schedules the first digest for the next configured send
     * time rather than sending immediately — use POST /digest/send for an immediate one. The week
     * boundary follows `timezone`, so the reported window is always the organization's own local
     * Monday-to-Sunday week. Changing the schedule clears any parked failure state but never
     * replays a week that already went out.
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
