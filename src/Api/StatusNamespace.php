<?php

/*
 * infrawrench/sdk v1.26.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.26.0).
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
use Infrawrench\Sdk\Model\PublicStatusPage;
use Infrawrench\Sdk\RequestOptions;

/** `$client->status` */
final class StatusNamespace extends ApiNamespace
{
    /**
     * Read a public status page
     *
     * **Unauthenticated.** The only endpoint in this API that takes no credentials — a status page
     * exists for people with no account. The payload carries labels, states and uptime history
     * only: probe URLs, resource and account ids, the organization id and error detail are never
     * included. An unpublished page and an unknown slug both answer 404, so the endpoint cannot be
     * used to confirm that a slug is real.
     *
     * GET /api/status/{slug}
     *
     * Raises on 404: Not found
     *
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(string $slug, ?RequestOptions $options = null): PublicStatusPage
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/status/{slug}',
                pathParams: ['slug' => $slug],
            ),
            $options,
        );

        return PublicStatusPage::fromArray(Coerce::toArray($data));
    }
}
