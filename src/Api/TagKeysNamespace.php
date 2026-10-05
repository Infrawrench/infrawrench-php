<?php

/*
 * infrawrench/sdk v1.71.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.71.0).
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
use Infrawrench\Sdk\Model\DiscoveredTagKeys;
use Infrawrench\Sdk\RequestOptions;

/** `$client->tagKeys` */
final class TagKeysNamespace extends ApiNamespace
{
    /** `$client->tagKeys->settings` */
    public readonly TagKeysSettingsNamespace $settings;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->settings = new TagKeysSettingsNamespace($this->transport);
    }

    /**
     * Discovered tag keys with usage
     *
     * Every tag key the org's cost data (trailing 90 days) and resource inventory carry, with the
     * providers using it, row and resource counts, and whether the tag key settings hide or pin
     * it. Preferred keys first, then by usage. Cost counts are included only when the caller also
     * holds `costs:read`.
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/tag-keys
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): DiscoveredTagKeys
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/tag-keys',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return DiscoveredTagKeys::fromArray(Coerce::toArray($data));
    }
}
