<?php

/*
 * infrawrench/sdk v1.24.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.24.0).
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
use Infrawrench\Sdk\Model\AccessDecision;
use Infrawrench\Sdk\Model\AccessRequest;
use Infrawrench\Sdk\Model\AccessRequestCatalog;
use Infrawrench\Sdk\Model\AccessRequestCreate;
use Infrawrench\Sdk\Model\Ok;
use Infrawrench\Sdk\RequestOptions;

/** `$client->accessRequests` */
final class AccessRequestsNamespace extends ApiNamespace
{
    /**
     * Approve an access request
     *
     * Opens the elevation window: the requester holds the requested permissions from now until
     * `grantExpiresAt`, on every surface at once (HTTP, the WebSocket gateway, chat, MCP tools).
     * Two rules are enforced here and cannot be bypassed: you cannot decide your own request (403
     * `self_approval`), and you cannot grant a permission you do not hold yourself (403
     * `exceeds_approver`) — denying something aimed higher than you is allowed. Deciding a request
     * that has already been decided or has timed out is a 409. Audit-logged.
     *
     * _Requires permission: `access:approve`._
     *
     * POST /api/org/{orgId}/access-requests/{requestId}/approve
     *
     * Raises on 400: Bad request
     *
     * Raises on 403: Self-approval, or granting beyond the approver's own permissions
     *
     * Raises on 404: Not found
     *
     * Raises on 409: Already decided, or the request timed out
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function approve(string $requestId, ?string $orgId = null, ?AccessDecision $body = null, ?RequestOptions $options = null): AccessRequest
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/access-requests/{requestId}/approve',
                pathParams: ['orgId' => $orgId, 'requestId' => $requestId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return AccessRequest::fromArray(Coerce::toArray($data));
    }

    /**
     * Permissions a request may ask for
     *
     * The server's permission catalog plus the subset the caller already holds and the bounds on
     * grant length. Served rather than hard-coded in clients so a picker cannot drift from what
     * the server will accept.
     *
     * _Requires permission: `access:read`._
     *
     * GET /api/org/{orgId}/access-requests/catalog
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function catalog(?string $orgId = null, ?RequestOptions $options = null): AccessRequestCatalog
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/access-requests/catalog',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return AccessRequestCatalog::fromArray(Coerce::toArray($data));
    }

    /**
     * Request elevated access
     *
     * Ask for specific permissions, for a specific number of minutes, with a reason. Rejected with
     * 400 when the caller's role already grants every permission asked for — that is almost always
     * a wrong permission string rather than a real request. Fans out to push, Slack (with
     * Approve/Deny buttons) and Microsoft Teams under the Pages opt-in. Audit-logged.
     *
     * _Requires permission: `access:request`._
     *
     * POST /api/org/{orgId}/access-requests
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(?string $orgId = null, ?AccessRequestCreate $body = null, ?RequestOptions $options = null): AccessRequest
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/access-requests',
                pathParams: ['orgId' => $orgId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return AccessRequest::fromArray(Coerce::toArray($data));
    }

    /**
     * Deny an access request
     *
     * Records the refusal. Two rules are enforced here and cannot be bypassed: you cannot decide
     * your own request (403 `self_approval`), and you cannot grant a permission you do not hold
     * yourself (403 `exceeds_approver`) — denying something aimed higher than you is allowed.
     * Deciding a request that has already been decided or has timed out is a 409. Audit-logged.
     *
     * _Requires permission: `access:approve`._
     *
     * POST /api/org/{orgId}/access-requests/{requestId}/deny
     *
     * Raises on 400: Bad request
     *
     * Raises on 403: Self-approval, or granting beyond the approver's own permissions
     *
     * Raises on 404: Not found
     *
     * Raises on 409: Already decided, or the request timed out
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function deny(string $requestId, ?string $orgId = null, ?AccessDecision $body = null, ?RequestOptions $options = null): AccessRequest
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/access-requests/{requestId}/deny',
                pathParams: ['orgId' => $orgId, 'requestId' => $requestId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return AccessRequest::fromArray(Coerce::toArray($data));
    }

    /**
     * List access requests
     *
     * The organization's break-glass requests, newest first. A `pending` listing hides rows whose
     * timeout has already passed, so the queue never offers a decision that would immediately be
     * refused.
     *
     * _Requires permission: `access:read`._
     *
     * GET /api/org/{orgId}/access-requests
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param 'pending'|'approved'|'denied'|'expired'|null $status `pending` (awaiting a decision), `approved`, `denied`, or `expired` (nobody decided in time, or the requester withdrew it). An approved row is only *granting* permissions while `active` is true.
     * @param '1'|null $mine Only the caller's own requests.
     * @param '1'|null $active Only rows granting permissions right now.
     * @return list<AccessRequest>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function list(?string $orgId = null, ?string $status = null, ?string $mine = null, ?string $active = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/access-requests',
                pathParams: ['orgId' => $orgId],
                query: ['status' => $status, 'mine' => $mine, 'active' => $active],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): AccessRequest => AccessRequest::fromArray(Coerce::toArray($item)));
    }

    /**
     * End a live elevation early
     *
     * Allowed for anyone with `access:approve` and for the holder — giving back an elevation you
     * no longer need must never require finding an approver. Applies from the next permission
     * resolution; nothing is cached. Audit-logged.
     *
     * POST /api/org/{orgId}/access-requests/{requestId}/revoke
     *
     * Raises on 404: Not found
     *
     * Raises on 409: The grant is not active
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function revoke(string $requestId, ?string $orgId = null, ?RequestOptions $options = null): AccessRequest
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/access-requests/{requestId}/revoke',
                pathParams: ['orgId' => $orgId, 'requestId' => $requestId],
            ),
            $options,
        );

        return AccessRequest::fromArray(Coerce::toArray($data));
    }

    /**
     * Withdraw your own pending request
     *
     * Its own operation rather than a self-denial, so the audit trail distinguishes 'nobody would
     * approve this' from 'they decided they didn't need it'. Audit-logged.
     *
     * _Requires permission: `access:request`._
     *
     * POST /api/org/{orgId}/access-requests/{requestId}/withdraw
     *
     * Raises on 404: Not found
     *
     * Raises on 409: Already decided or expired
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function withdraw(string $requestId, ?string $orgId = null, ?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/access-requests/{requestId}/withdraw',
                pathParams: ['orgId' => $orgId, 'requestId' => $requestId],
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }
}
