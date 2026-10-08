<?php

/*
 * infrawrench/sdk v1.79.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.79.0).
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
use Infrawrench\Sdk\Model\JitPolicy;
use Infrawrench\Sdk\Model\JitPolicyInput;
use Infrawrench\Sdk\Model\JitPrincipalOption;
use Infrawrench\Sdk\Model\JitPrincipalResolution;
use Infrawrench\Sdk\Model\Ok;
use Infrawrench\Sdk\RequestOptions;

/** `$client->jitAccess->policies` */
final class JitAccessPoliciesNamespace extends ApiNamespace
{
    /**
     * Create a policy
     *
     * Audit-logged. At least one approver (member, role or on-call rotation) is required.
     *
     * _Requires permission: `org:settings:write`._
     *
     * POST /api/org/{orgId}/jit-access/policies
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(?string $orgId = null, ?JitPolicyInput $body = null, ?RequestOptions $options = null): JitPolicy
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/jit-access/policies',
                pathParams: ['orgId' => $orgId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return JitPolicy::fromArray(Coerce::toArray($data));
    }

    /**
     * Delete a policy
     *
     * Grants the policy produced still end on time; its pending requests have no approvers and
     * time out.
     *
     * _Requires permission: `org:settings:write`._
     *
     * DELETE /api/org/{orgId}/jit-access/policies/{policyId}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $policyId, ?string $orgId = null, ?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/jit-access/policies/{policyId}',
                pathParams: ['orgId' => $orgId, 'policyId' => $policyId],
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * Get a policy
     *
     * _Requires permission: `access:read`._
     *
     * GET /api/org/{orgId}/jit-access/policies/{policyId}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(string $policyId, ?string $orgId = null, ?RequestOptions $options = null): JitPolicy
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/jit-access/policies/{policyId}',
                pathParams: ['orgId' => $orgId, 'policyId' => $policyId],
            ),
            $options,
        );

        return JitPolicy::fromArray(Coerce::toArray($data));
    }

    /**
     * List just-in-time access policies
     *
     * _Requires permission: `access:read`._
     *
     * GET /api/org/{orgId}/jit-access/policies
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<JitPolicy>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function list(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/jit-access/policies',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): JitPolicy => JitPolicy::fromArray(Coerce::toArray($item)));
    }

    /**
     * Resolve the caller's provider principal
     *
     * Who the grant would go to, matched by the caller's email in the provider.
     *
     * _Requires permission: `access:request`._
     *
     * GET /api/org/{orgId}/jit-access/policies/{policyId}/principal
     *
     * Raises on 403: Not a requester
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function principal(string $policyId, ?string $orgId = null, ?RequestOptions $options = null): JitPrincipalResolution
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/jit-access/policies/{policyId}/principal',
                pathParams: ['orgId' => $orgId, 'policyId' => $policyId],
            ),
            $options,
        );

        return JitPrincipalResolution::fromArray(Coerce::toArray($data));
    }

    /**
     * Principals the caller may pick
     *
     * _Requires permission: `access:request`._
     *
     * GET /api/org/{orgId}/jit-access/policies/{policyId}/principals
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<JitPrincipalOption|null>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function principals(string $policyId, ?string $orgId = null, ?string $q = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/jit-access/policies/{policyId}/principals',
                pathParams: ['orgId' => $orgId, 'policyId' => $policyId],
                query: ['q' => $q],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): ?JitPrincipalOption => Coerce::nullable($item, static fn (mixed $value): JitPrincipalOption => JitPrincipalOption::fromArray(Coerce::toArray($value))));
    }

    /**
     * Replace a policy
     *
     * Live grants keep their window; pending requests are decided against the new approver set.
     *
     * _Requires permission: `org:settings:write`._
     *
     * PUT /api/org/{orgId}/jit-access/policies/{policyId}
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $policyId, ?string $orgId = null, ?JitPolicyInput $body = null, ?RequestOptions $options = null): JitPolicy
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/jit-access/policies/{policyId}',
                pathParams: ['orgId' => $orgId, 'policyId' => $policyId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return JitPolicy::fromArray(Coerce::toArray($data));
    }
}
