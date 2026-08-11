<?php

/*
 * infrawrench/sdk v1.9.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.9.0).
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
use Infrawrench\Sdk\Model\Ok;
use Infrawrench\Sdk\Model\SlackChannel;
use Infrawrench\Sdk\Model\SlackChannelCreate;
use Infrawrench\Sdk\Model\SlackChannelUpdate;
use Infrawrench\Sdk\RequestOptions;

/** `$client->slack->channels` */
final class SlackChannelsNamespace extends ApiNamespace
{
    /**
     * Connect a Slack channel as an alert destination
     *
     * Adds a channel as a possible destination, or refreshes the cached name of one already added.
     * Which alerts reach it is decided by /alert-rules; an organization with no rules falls back
     * to the default (everything except drift, everywhere), so a freshly added channel starts
     * receiving alerts without a second step.
     *
     * POST /api/org/{orgId}/slack/channels
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(?string $orgId = null, ?SlackChannelCreate $body = null, ?RequestOptions $options = null): SlackChannel
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/slack/channels',
                pathParams: ['orgId' => $orgId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return SlackChannel::fromArray(Coerce::toArray($data));
    }

    /**
     * Disconnect a channel
     *
     * DELETE /api/org/{orgId}/slack/channels/{id}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $id, ?string $orgId = null, ?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/slack/channels/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * Refresh a channel's cached name
     *
     * PATCH /api/org/{orgId}/slack/channels/{id}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $id, ?string $orgId = null, ?SlackChannelUpdate $body = null, ?RequestOptions $options = null): SlackChannel
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PATCH',
                path: '/api/org/{orgId}/slack/channels/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return SlackChannel::fromArray(Coerce::toArray($data));
    }
}
