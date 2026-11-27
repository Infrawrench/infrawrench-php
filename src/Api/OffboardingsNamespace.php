<?php

/*
 * infrawrench/sdk v1.135.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.135.0).
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
use Infrawrench\Sdk\Model\Offboarding;
use Infrawrench\Sdk\Model\OffboardingMembers;
use Infrawrench\Sdk\Model\OffboardingPatchInput;
use Infrawrench\Sdk\Model\OffboardingPreview;
use Infrawrench\Sdk\Model\OffboardingPreviewInput;
use Infrawrench\Sdk\Model\OffboardingStartInput;
use Infrawrench\Sdk\Model\OffboardingStartResponse;
use Infrawrench\Sdk\RequestOptions;

/** `$client->offboardings` */
final class OffboardingsNamespace extends ApiNamespace
{
    /** `$client->offboardings->get` */
    public readonly OffboardingsGetNamespace $get;

    /** `$client->offboardings->items` */
    public readonly OffboardingsItemsNamespace $items;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->get = new OffboardingsGetNamespace($this->transport);
        $this->items = new OffboardingsItemsNamespace($this->transport);
    }

    /**
     * Start an offboarding
     *
     * Start the checklist for someone leaving, by email plus any aliases, and sweep for everything
     * tied to them: their Infrawrench membership, API keys and SSH keys; cloud principals and
     * other synced resources that carry their email or an alias in any field or that the ownership
     * records name them owner of; paid seats; on-call rotations and covers; leases they set;
     * just-in-time grants they hold. The sweep reads synced state only and makes no provider
     * calls.
     *
     * Starting again for somebody who already has an open offboarding returns that one, with any
     * new aliases merged in.
     *
     * _Requires permission: `team:remove`._
     *
     * POST /api/org/{orgId}/offboardings
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(OffboardingStartInput $body, ?string $orgId = null, ?RequestOptions $options = null): OffboardingStartResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/offboardings',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return OffboardingStartResponse::fromArray(Coerce::toArray($data));
    }

    /**
     * Export an offboarding as evidence
     *
     * The checklist as a download, one row per item, rejected matches included and labelled. CSV
     * cells are all quoted and spreadsheet formulas neutralised. Exports are recorded in the audit
     * log.
     *
     * _Requires permission: `team:remove`._
     *
     * GET /api/org/{orgId}/offboardings/{id}/export
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param 'csv'|'json'|null $format Defaults to "csv".
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function export(string $id, ?string $orgId = null, ?string $format = null, ?RequestOptions $options = null): Offboarding
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/offboardings/{id}/export',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                query: ['format' => $format],
            ),
            $options,
        );

        return Offboarding::fromArray(Coerce::toArray($data));
    }

    /**
     * Members who can take something over
     *
     * The organization's members, for picking who takes over a resource or an on-call slot.
     *
     * _Requires permission: `team:remove`._
     *
     * GET /api/org/{orgId}/offboardings/members
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function members(?string $orgId = null, ?RequestOptions $options = null): OffboardingMembers
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/offboardings/members',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return OffboardingMembers::fromArray(Coerce::toArray($data));
    }

    /**
     * Preview an offboarding sweep
     *
     * What starting an offboarding would find for a person, without saving anything.
     *
     * _Requires permission: `team:remove`._
     *
     * POST /api/org/{orgId}/offboardings/preview
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function preview(OffboardingPreviewInput $body, ?string $orgId = null, ?RequestOptions $options = null): OffboardingPreview
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/offboardings/preview',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return OffboardingPreview::fromArray(Coerce::toArray($data));
    }

    /**
     * Rescan an offboarding
     *
     * Sweep again. Rows already dealt with keep their outcome; a row no longer found is marked
     * `gone`. A closed offboarding is returned unchanged.
     *
     * _Requires permission: `team:remove`._
     *
     * POST /api/org/{orgId}/offboardings/{id}/rescan
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function rescan(string $id, ?string $orgId = null, ?RequestOptions $options = null): Offboarding
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/offboardings/{id}/rescan',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return Offboarding::fromArray(Coerce::toArray($data));
    }

    /**
     * Edit an offboarding
     *
     * Change the aliases (which rescans), the note, or the status: `completed` or `canceled`
     * closes the checklist, `open` reopens it.
     *
     * _Requires permission: `team:remove`._
     *
     * PATCH /api/org/{orgId}/offboardings/{id}
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * Raises on 409: Conflict
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $id, OffboardingPatchInput $body, ?string $orgId = null, ?RequestOptions $options = null): Offboarding
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PATCH',
                path: '/api/org/{orgId}/offboardings/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return Offboarding::fromArray(Coerce::toArray($data));
    }
}
