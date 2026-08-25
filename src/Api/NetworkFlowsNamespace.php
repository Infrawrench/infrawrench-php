<?php

/*
 * infrawrench/sdk v1.38.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.38.0).
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
use Infrawrench\Sdk\Model\NetworkFlowFeed;
use Infrawrench\Sdk\RequestOptions;

/** `$client->networkFlows` */
final class NetworkFlowsNamespace extends ApiNamespace
{
    /** `$client->networkFlows->settings` */
    public readonly NetworkFlowsSettingsNamespace $settings;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->settings = new NetworkFlowsSettingsNamespace($this->transport);
    }

    /**
     * Priced source→destination network flow attribution
     *
     * Which two things are talking, across which billing boundary, and what that costs. Answers
     * the question the cost dimensions structurally cannot: every cost dimension is about one side
     * of a transfer, and a network charge is about a pair.
     *
     * All figures are **estimates** and the `estimated` field says so unconditionally. Bytes come
     * from the provider's flow logs (which sample, or drop records under capacity pressure) and
     * are priced at published list rates with no free tier, no volume tier and no negotiated
     * discount applied. Use the ranking; do not reconcile the total against an invoice line.
     *
     * Accounts whose provider has no readable flow source appear in `accounts` with
     * `supportsFlows: false` and contribute nothing to the totals — never zero bytes.
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/network-flows
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param string|null $from Inclusive start day. Defaults to 13 days ago.
     * @param string|null $to Inclusive end day. Defaults to today.
     * @param string|null $scope Narrow to one billing boundary.
     * @param string|null $accountId Narrow to one connected account.
     * @param int|null $limit Pairs to return in `topFlows`, largest cost first. Defaults to 50.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?string $from = null, ?string $to = null, ?string $scope = null, ?string $accountId = null, ?int $limit = null, ?RequestOptions $options = null): NetworkFlowFeed
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/network-flows',
                pathParams: ['orgId' => $orgId],
                query: ['from' => $from, 'to' => $to, 'scope' => $scope, 'accountId' => $accountId, 'limit' => $limit],
            ),
            $options,
        );

        return NetworkFlowFeed::fromArray(Coerce::toArray($data));
    }
}
