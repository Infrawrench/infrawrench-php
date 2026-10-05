<?php

/*
 * infrawrench/sdk v1.56.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.56.0).
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
use Infrawrench\Sdk\Model\CarbonEstimate;
use Infrawrench\Sdk\RequestOptions;

/** `$client->carbon` */
final class CarbonNamespace extends ApiNamespace
{
    /**
     * Estimated operational carbon, with its assumptions
     *
     * An **estimate**, in the same sense the cost estimates here are, and built to be honest about
     * that in three ways.
     *
     * **A resource that cannot be placed is never guessed.** No published figure for the provider,
     * no entry for the region, no vCPU count: each produces an `unestimated` row with a stated
     * reason and contributes nothing to the total. A carbon figure computed against a guessed grid
     * is worse than no figure, because it is a number somebody will put in a report.
     *
     * **The assumptions travel with the answer**: utilisation, PUE, the coefficient source and its
     * vintage are all on the response.
     *
     * **It covers processors and says so.** Virtual machines, Kubernetes nodes and sized managed
     * services; storage, memory, network egress and embodied (manufacturing) emissions are
     * excluded. Types with nothing to read (a bucket, a DNS record) are out of scope, not
     * unestimated.
     *
     * What to read comes from each plugin's `carbon` declaration (or its `rightsizing` one): the
     * region field, and vCPUs either directly or through the create form's size catalogue. Managed
     * clusters whose nodes are listed in their own right are left out of the total, and a
     * Kubernetes node that is also an instance is counted once (`duplicateCount`).
     *
     * Grid figures are Cloud Carbon Footprint's (Apache-2.0) for AWS, GCP and Azure, and Ember's
     * 2024 country figures for every other provider; each row says which (`gridBasis`). They are
     * not measured by us. One resource's monthly figure rides `POST /resources/cost-estimate` as
     * `carbon`, beside its price.
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/carbon
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param int|null $windowDays Defaults to 30.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?int $windowDays = null, ?RequestOptions $options = null): CarbonEstimate
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/carbon',
                pathParams: ['orgId' => $orgId],
                query: ['windowDays' => $windowDays],
            ),
            $options,
        );

        return CarbonEstimate::fromArray(Coerce::toArray($data));
    }
}
