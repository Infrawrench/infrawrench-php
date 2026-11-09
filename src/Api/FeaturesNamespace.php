<?php

/*
 * infrawrench/sdk v1.100.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.100.0).
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
use Infrawrench\Sdk\Model\OrgFeatureList;
use Infrawrench\Sdk\RequestOptions;

/** `$client->features` */
final class FeaturesNamespace extends ApiNamespace
{
    /**
     * List the organization's rolled-out features
     *
     * Features still being rolled out are turned on per organization by a platform admin. A
     * feature not listed here is refused by its own routes.
     *
     * GET /api/org/{orgId}/features
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): OrgFeatureList
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/features',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return OrgFeatureList::fromArray(Coerce::toArray($data));
    }
}
