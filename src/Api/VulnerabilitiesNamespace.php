<?php

/*
 * infrawrench/sdk v1.82.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.82.0).
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
use Infrawrench\Sdk\Model\VulnerabilityListResponse;
use Infrawrench\Sdk\RequestOptions;

/** `$client->vulnerabilities` */
final class VulnerabilitiesNamespace extends ApiNamespace
{
    /** `$client->vulnerabilities->dismissals` */
    public readonly VulnerabilitiesDismissalsNamespace $dismissals;

    /** `$client->vulnerabilities->settings` */
    public readonly VulnerabilitiesSettingsNamespace $settings;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->dismissals = new VulnerabilitiesDismissalsNamespace($this->transport);
        $this->settings = new VulnerabilitiesSettingsNamespace($this->transport);
    }

    /**
     * List vulnerability findings joined to running resources
     *
     * Open findings from each connected provider's own scanner (Amazon Inspector, Artifact
     * Analysis, Defender for Cloud, Dependabot, GitLab, JFrog Xray), joined to the synced
     * resources that run the affected image or are the affected resource, and marked when the
     * advisory is in the CISA Known Exploited Vulnerabilities catalog. Read from what the poller
     * last collected; no provider calls are made. Dismissed findings are reported under
     * `dismissed` and excluded from `findings`, the counts and the alerts. Each finding names the
     * services its running resources belong to. `serviceId` and `resourceId` narrow the findings
     * (and `dismissed`) to those running there and recompute the counts; `sources` always
     * describes every scanner.
     *
     * GET /api/org/{orgId}/vulnerabilities
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param string|null $serviceId Only findings running on a resource of this service.
     * @param list<string>|null $resourceId Only findings running on any of these Infrawrench resource ids. Repeat the parameter for several (at most 100).
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?string $serviceId = null, ?array $resourceId = null, ?RequestOptions $options = null): VulnerabilityListResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/vulnerabilities',
                pathParams: ['orgId' => $orgId],
                query: ['serviceId' => $serviceId, 'resourceId' => $resourceId],
            ),
            $options,
        );

        return VulnerabilityListResponse::fromArray(Coerce::toArray($data));
    }
}
