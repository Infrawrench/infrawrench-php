<?php

/*
 * infrawrench/sdk v1.39.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.39.0).
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
use Infrawrench\Sdk\Model\PostureListResponse;
use Infrawrench\Sdk\RequestOptions;

/** `$client->posture` */
final class PostureNamespace extends ApiNamespace
{
    /** `$client->posture->dismissals` */
    public readonly PostureDismissalsNamespace $dismissals;

    /** `$client->posture->settings` */
    public readonly PostureSettingsNamespace $settings;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->dismissals = new PostureDismissalsNamespace($this->transport);
        $this->settings = new PostureSettingsNamespace($this->transport);
    }

    /**
     * List security posture findings on synced resources
     *
     * Plugin-declared security checks evaluated over already-synced resource state: public
     * buckets, 0.0.0.0/0 ingress rules, unencrypted disks, publicly reachable database endpoints,
     * stale credentials, missing deletion/backup protection. No provider API calls are made and
     * results reflect the last sync. Findings are sorted worst severity first, with per-severity
     * counts. Findings the organization has dismissed are reported separately under `dismissed`
     * and are excluded from `findings`, `counts` and the posture alerts.
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/posture
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): PostureListResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/posture',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return PostureListResponse::fromArray(Coerce::toArray($data));
    }
}
