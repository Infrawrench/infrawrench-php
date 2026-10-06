<?php

/*
 * infrawrench/sdk v1.75.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.75.0).
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
use Infrawrench\Sdk\Model\ExtendedSupportListResponse;
use Infrawrench\Sdk\RequestOptions;

/** `$client->extendedSupport` */
final class ExtendedSupportNamespace extends ApiNamespace
{
    /** `$client->extendedSupport->settings` */
    public readonly ExtendedSupportSettingsNamespace $settings;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->settings = new ExtendedSupportSettingsNamespace($this->transport);
    }

    /**
     * List resources billed at extended-support or end-of-life rates
     *
     * Matches every synced resource's version against its provider's support calendar (declared by
     * the plugin): resources paying an extended-support surcharge, past the end of support, or
     * whose standard support ends within the lead time. Each finding carries the monthly surcharge
     * an upgrade removes: the provider's billed amount where it can be attributed (AWS Cost
     * Explorer extended-support usage types), otherwise list price. Results are cached for a few
     * minutes; pass `refresh=true` to recompute.
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/extended-support
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param 'true'|'false'|null $refresh Bypass the short server-side cache and recompute now.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?string $refresh = null, ?RequestOptions $options = null): ExtendedSupportListResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/extended-support',
                pathParams: ['orgId' => $orgId],
                query: ['refresh' => $refresh],
            ),
            $options,
        );

        return ExtendedSupportListResponse::fromArray(Coerce::toArray($data));
    }
}
