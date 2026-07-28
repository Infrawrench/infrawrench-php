<?php

/*
 * infrawrench/sdk v0.11.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.11.0).
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
use Infrawrench\Sdk\Model\SlackStatus;
use Infrawrench\Sdk\RequestOptions;

/** `$client->slack` */
final class SlackNamespace extends ApiNamespace
{
    /** `$client->slack->channels` */
    public readonly SlackChannelsNamespace $channels;

    /** `$client->slack->installations` */
    public readonly SlackInstallationsNamespace $installations;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->channels = new SlackChannelsNamespace($this->transport);
        $this->installations = new SlackInstallationsNamespace($this->transport);
    }

    /**
     * Get the Add to Slack URL
     *
     * Returns a slack.com/oauth/v2/authorize URL carrying a signed `state` that binds the
     * resulting install to this organization. Send the user's browser there; Slack redirects back
     * to /api/slack/oauth/callback.
     *
     * GET /api/org/{orgId}/slack/install-url
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return array{url: string}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function installUrl(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/slack/install-url',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::toArray($data);
    }

    /**
     * Get the organization's Slack connection
     *
     * Reports whether the server has a Slack app registered, which workspaces this organization
     * has connected, and which channels alerts are routed to.
     *
     * GET /api/org/{orgId}/slack/status
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function status(?string $orgId = null, ?RequestOptions $options = null): SlackStatus
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/slack/status',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return SlackStatus::fromArray(Coerce::toArray($data));
    }

    /**
     * Post a test message to every configured channel
     *
     * Ignores trigger opt-ins — every channel gets the test. Fails with the Slack error when
     * nothing could be delivered (`not_in_channel` means the bot needs inviting to a private
     * channel).
     *
     * POST /api/org/{orgId}/slack/test
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return array{ok: bool, channelCount: int, attempted: int, succeeded: int}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function test(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/slack/test',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::toArray($data);
    }
}
