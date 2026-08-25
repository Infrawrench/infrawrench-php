<?php

/*
 * infrawrench/sdk v1.36.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.36.0).
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
use Infrawrench\Sdk\Model\OnCallNowResponse;
use Infrawrench\Sdk\RequestOptions;

/** `$client->onCall` */
final class OnCallNamespace extends ApiNamespace
{
    /** `$client->onCall->overrides` */
    public readonly OnCallOverridesNamespace $overrides;

    /** `$client->onCall->schedules` */
    public readonly OnCallSchedulesNamespace $schedules;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->overrides = new OnCallOverridesNamespace($this->transport);
        $this->schedules = new OnCallSchedulesNamespace($this->transport);
    }

    /**
     * Who is on call right now
     *
     * One entry per rotation: the shift in effect, and the next person in the rotation. Takes
     * `team:read` — knowing who is on call is something every member needs and nobody should have
     * to ask an admin for.
     *
     * GET /api/org/{orgId}/on-call/now
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function now(?string $orgId = null, ?RequestOptions $options = null): OnCallNowResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/on-call/now',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return OnCallNowResponse::fromArray(Coerce::toArray($data));
    }
}
