<?php

/*
 * infrawrench/sdk v1.77.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.77.0).
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
use Infrawrench\Sdk\Model\JitAccessRequest;
use Infrawrench\Sdk\Model\JitCreateRequest;
use Infrawrench\Sdk\Model\JitRequestStatus;
use Infrawrench\Sdk\RequestOptions;

/** `$client->jitAccess->requests` */
final class JitAccessRequestsNamespace extends ApiNamespace
{
    /**
     * Approve a request
     *
     * The caller must be in the policy's approver set at this moment. On approval the provider
     * grant is made; the response may still read `granting` when it completes in the background.
     * Audit-logged. Not available to API keys.
     *
     * _Requires permission: `access:read`._
     *
     * POST /api/org/{orgId}/jit-access/requests/{requestId}/approve
     *
     * Raises on 403: Not allowed
     *
     * Raises on 404: Not found
     *
     * Raises on 409: Already decided, timed out, or not in a state for this
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param array{note?: string}|null $body
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function approve(string $requestId, ?string $orgId = null, ?array $body = null, ?RequestOptions $options = null): JitAccessRequest
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/jit-access/requests/{requestId}/approve',
                pathParams: ['orgId' => $orgId, 'requestId' => $requestId],
                body: $body,
                hasBody: $body !== null,
            ),
            $options,
        );

        return JitAccessRequest::fromArray(Coerce::toArray($data));
    }

    /**
     * Cancel your pending request
     *
     * Requester only. Audit-logged. Not available to API keys.
     *
     * _Requires permission: `access:request`._
     *
     * POST /api/org/{orgId}/jit-access/requests/{requestId}/cancel
     *
     * Raises on 403: Not allowed
     *
     * Raises on 404: Not found
     *
     * Raises on 409: Already decided, timed out, or not in a state for this
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param array{note?: string}|null $body
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function cancel(string $requestId, ?string $orgId = null, ?array $body = null, ?RequestOptions $options = null): JitAccessRequest
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/jit-access/requests/{requestId}/cancel',
                pathParams: ['orgId' => $orgId, 'requestId' => $requestId],
                body: $body,
                hasBody: $body !== null,
            ),
            $options,
        );

        return JitAccessRequest::fromArray(Coerce::toArray($data));
    }

    /**
     * Request just-in-time access
     *
     * Ask for one of a policy's scope and role pairs for a bounded window. Approvers are notified
     * over push, Slack (with Approve/Deny buttons) and Microsoft Teams. Not available to API keys.
     *
     * _Requires permission: `access:request`._
     *
     * POST /api/org/{orgId}/jit-access/requests
     *
     * Raises on 400: Invalid
     *
     * Raises on 403: Not a requester under this policy
     *
     * Raises on 409: A pending or active request already covers this
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(?string $orgId = null, ?JitCreateRequest $body = null, ?RequestOptions $options = null): JitAccessRequest
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/jit-access/requests',
                pathParams: ['orgId' => $orgId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return JitAccessRequest::fromArray(Coerce::toArray($data));
    }

    /**
     * Deny a request
     *
     * The caller must be in the policy's approver set. Audit-logged. Not available to API keys.
     *
     * _Requires permission: `access:read`._
     *
     * POST /api/org/{orgId}/jit-access/requests/{requestId}/deny
     *
     * Raises on 403: Not allowed
     *
     * Raises on 404: Not found
     *
     * Raises on 409: Already decided, timed out, or not in a state for this
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param array{note?: string}|null $body
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function deny(string $requestId, ?string $orgId = null, ?array $body = null, ?RequestOptions $options = null): JitAccessRequest
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/jit-access/requests/{requestId}/deny',
                pathParams: ['orgId' => $orgId, 'requestId' => $requestId],
                body: $body,
                hasBody: $body !== null,
            ),
            $options,
        );

        return JitAccessRequest::fromArray(Coerce::toArray($data));
    }

    /**
     * Extend an active grant
     *
     * Approvers only, within the policy maximum for the whole window. A provider-enforced expiry
     * is moved upstream first. Audit-logged. Not available to API keys.
     *
     * _Requires permission: `access:read`._
     *
     * POST /api/org/{orgId}/jit-access/requests/{requestId}/extend
     *
     * Raises on 400: Beyond the policy maximum
     *
     * Raises on 403: Not an approver
     *
     * Raises on 409: Not active
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param array{minutes: int}|null $body
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function extend(string $requestId, ?string $orgId = null, ?array $body = null, ?RequestOptions $options = null): JitAccessRequest
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/jit-access/requests/{requestId}/extend',
                pathParams: ['orgId' => $orgId, 'requestId' => $requestId],
                body: $body,
                hasBody: $body !== null,
            ),
            $options,
        );

        return JitAccessRequest::fromArray(Coerce::toArray($data));
    }

    /**
     * Get a request
     *
     * _Requires permission: `access:read`._
     *
     * GET /api/org/{orgId}/jit-access/requests/{requestId}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(string $requestId, ?string $orgId = null, ?RequestOptions $options = null): JitAccessRequest
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/jit-access/requests/{requestId}',
                pathParams: ['orgId' => $orgId, 'requestId' => $requestId],
            ),
            $options,
        );

        return JitAccessRequest::fromArray(Coerce::toArray($data));
    }

    /**
     * List just-in-time access requests
     *
     * Newest first, with caller-relative action flags.
     *
     * _Requires permission: `access:read`._
     *
     * GET /api/org/{orgId}/jit-access/requests
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param JitRequestStatus::*|null $status
     * @param '1'|null $mine
     * @param '1'|null $holding Only rows that may be holding access upstream.
     * @return list<JitAccessRequest>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function list(?string $orgId = null, ?string $status = null, ?string $mine = null, ?string $holding = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/jit-access/requests',
                pathParams: ['orgId' => $orgId],
                query: ['status' => $status, 'mine' => $mine, 'holding' => $holding],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): JitAccessRequest => JitAccessRequest::fromArray(Coerce::toArray($item)));
    }

    /**
     * End a grant early
     *
     * Allowed for the holder, an approver, or a member with org:settings:write. Audit-logged. Not
     * available to API keys.
     *
     * POST /api/org/{orgId}/jit-access/requests/{requestId}/revoke
     *
     * Raises on 403: Not allowed
     *
     * Raises on 404: Not found
     *
     * Raises on 409: Already decided, timed out, or not in a state for this
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param array{note?: string}|null $body
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function revoke(string $requestId, ?string $orgId = null, ?array $body = null, ?RequestOptions $options = null): JitAccessRequest
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/jit-access/requests/{requestId}/revoke',
                pathParams: ['orgId' => $orgId, 'requestId' => $requestId],
                body: $body,
                hasBody: $body !== null,
            ),
            $options,
        );

        return JitAccessRequest::fromArray(Coerce::toArray($data));
    }
}
