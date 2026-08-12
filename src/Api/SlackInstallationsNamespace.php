<?php

/*
 * infrawrench/sdk v1.16.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.16.0).
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
use Infrawrench\Sdk\RequestOptions;

/** `$client->slack->installations` */
final class SlackInstallationsNamespace extends ApiNamespace
{
    /**
     * List channels the connected workspace can see
     *
     * Live call to Slack's conversations.list, for populating a channel picker. Returns
     * non-archived public and private channels visible to the bot.
     *
     * GET /api/org/{orgId}/slack/installations/{installationId}/available-channels
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return array{channels: list<array<string, mixed>>}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function availableChannels(string $installationId, ?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/slack/installations/{installationId}/available-channels',
                pathParams: ['orgId' => $orgId, 'installationId' => $installationId],
            ),
            $options,
        );

        return Coerce::toArray($data);
    }

    /**
     * Disconnect a Slack workspace
     *
     * Stops all delivery to this workspace. The channel routing is retained, so re-installing
     * restores it.
     *
     * DELETE /api/org/{orgId}/slack/installations/{installationId}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $installationId, ?string $orgId = null, ?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/slack/installations/{installationId}',
                pathParams: ['orgId' => $orgId, 'installationId' => $installationId],
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }
}
