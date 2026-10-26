<?php

/*
 * infrawrench/sdk v1.84.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.84.0).
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
use Infrawrench\Sdk\Model\LeakedSecretDismiss;
use Infrawrench\Sdk\Model\LeakedSecretList;
use Infrawrench\Sdk\Model\LeakedSecretMarkRotated;
use Infrawrench\Sdk\Model\LeakedSecretResponse;
use Infrawrench\Sdk\Model\LeakedSecretRotate;
use Infrawrench\Sdk\Model\LeakedSecretScanResult;
use Infrawrench\Sdk\RequestOptions;

/** `$client->leakedSecrets` */
final class LeakedSecretsNamespace extends ApiNamespace
{
    /**
     * Dismiss a leaked credential
     *
     * Accept the finding as not a risk. Closes it upstream with the matching reason unless
     * `resolveUpstream` is false.
     *
     * _Requires permission: `secrets:write`._
     *
     * POST /api/org/{orgId}/leaked-secrets/{id}/dismiss
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
    public function dismiss(string $id, ?string $orgId = null, ?LeakedSecretDismiss $body = null, ?RequestOptions $options = null): LeakedSecretResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/leaked-secrets/{id}/dismiss',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return LeakedSecretResponse::fromArray(Coerce::toArray($data));
    }

    /**
     * List leaked credentials
     *
     * Secrets a scanner account (GitHub secret scanning, GitLab secret detection) found committed
     * to code, attributed to the account or stored secret they belong to. Read from the last scan;
     * no provider call is made.
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/leaked-secrets
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param 'open'|'rotated'|'dismissed'|'resolved'|null $status `open` needs rotating; `rotated` was rotated through Infrawrench or detected because the stored value changed; `dismissed` was accepted as not a risk; `resolved` was closed on the scanner by someone else before it was rotated here.
     * @param string|null $accountId Only leaks matched to, or possibly belonging to, this account.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?string $status = null, ?string $accountId = null, ?RequestOptions $options = null): LeakedSecretList
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/leaked-secrets',
                pathParams: ['orgId' => $orgId],
                query: ['status' => $status, 'accountId' => $accountId],
            ),
            $options,
        );

        return LeakedSecretList::fromArray(Coerce::toArray($data));
    }

    /**
     * Record a rotation done at the provider
     *
     * For an account credential, the account must have been updated first: the request is refused
     * with 409 while the stored credential still equals the leaked one.
     *
     * _Requires permission: `secrets:write`._
     *
     * POST /api/org/{orgId}/leaked-secrets/{id}/mark-rotated
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
    public function markRotated(string $id, ?string $orgId = null, ?LeakedSecretMarkRotated $body = null, ?RequestOptions $options = null): LeakedSecretResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/leaked-secrets/{id}/mark-rotated',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return LeakedSecretResponse::fromArray(Coerce::toArray($data));
    }

    /**
     * Reopen a leaked credential
     *
     * Undo a dismissal or a rotation recorded by mistake. Does not reopen the finding on the
     * scanner.
     *
     * _Requires permission: `secrets:write`._
     *
     * POST /api/org/{orgId}/leaked-secrets/{id}/reopen
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
    public function reopen(string $id, ?string $orgId = null, ?RequestOptions $options = null): LeakedSecretResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/leaked-secrets/{id}/reopen',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return LeakedSecretResponse::fromArray(Coerce::toArray($data));
    }

    /**
     * Rotate a leaked credential
     *
     * For `reissue` leaks the provider mints a new value and every output reference consuming it
     * is updated at once; for `replace` leaks send the new `value`, which the provider receives
     * first when it can. Refused with 409 when the stored value still equals the leaked one
     * afterwards. Records the rotation, raises `secret.rotated` and closes the finding upstream as
     * revoked unless `resolveUpstream` is false.
     *
     * _Requires permission: `secrets:write`._
     *
     * POST /api/org/{orgId}/leaked-secrets/{id}/rotate
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
    public function rotate(string $id, ?string $orgId = null, ?LeakedSecretRotate $body = null, ?RequestOptions $options = null): LeakedSecretResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/leaked-secrets/{id}/rotate',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return LeakedSecretResponse::fromArray(Coerce::toArray($data));
    }

    /**
     * Scan every scanner account now
     *
     * Reads every scanner account's findings now instead of waiting for the next 30-minute scan.
     *
     * _Requires permission: `secrets:write`._
     *
     * POST /api/org/{orgId}/leaked-secrets/scan
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function scan(?string $orgId = null, ?RequestOptions $options = null): LeakedSecretScanResult
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/leaked-secrets/scan',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return LeakedSecretScanResult::fromArray(Coerce::toArray($data));
    }
}
