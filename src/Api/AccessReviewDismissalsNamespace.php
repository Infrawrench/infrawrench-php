<?php

/*
 * infrawrench/sdk v1.23.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.23.0).
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
use Infrawrench\Sdk\Model\AccessReviewDismissal;
use Infrawrench\Sdk\Model\AccessReviewDismissalCreate;
use Infrawrench\Sdk\RequestOptions;

/** `$client->accessReview->dismissals` */
final class AccessReviewDismissalsNamespace extends ApiNamespace
{
    /**
     * Dismiss an access review finding
     *
     * Accept a finding — that break-glass role really is meant to be admin, that shared key really
     * is rotated out of band. The finding leaves `findings` and stops feeding the security alerts,
     * but the rule keeps being evaluated and the finding is reported back under `dismissed` for as
     * long as it still matches. The principal itself stays in `principals` either way. Idempotent:
     * dismissing an already-dismissed finding rewrites the note and the author.
     *
     * _Requires permission: `resources:write`._
     *
     * POST /api/org/{orgId}/access-review/dismissals
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(?string $orgId = null, ?AccessReviewDismissalCreate $body = null, ?RequestOptions $options = null): AccessReviewDismissal
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/access-review/dismissals',
                pathParams: ['orgId' => $orgId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return AccessReviewDismissal::fromArray(Coerce::toArray($data));
    }

    /**
     * Restore a dismissed access review finding
     *
     * Undo a dismissal, putting the finding back on the list and back into the security alerts.
     * The finding is identified by query parameters rather than path segments because resource ids
     * are provider-native and routinely contain slashes.
     *
     * _Requires permission: `resources:write`._
     *
     * DELETE /api/org/{orgId}/access-review/dismissals
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string $resourceId Infrawrench resource id the finding is on.
     * @param 'access-review:stale-principal'|'access-review:admin-principal'|'access-review:key-past-rotation'|'access-review:no-recorded-owner'|'access-review:no-mfa' $ruleId Which rule was raised. Half of a dismissal's key, alongside the resource id. The `access-review:` prefix is reserved so these can share the posture dismissal store without colliding with plugin-declared posture rule ids.
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $resourceId, string $ruleId, ?string $orgId = null, ?RequestOptions $options = null): void
    {
        $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/access-review/dismissals',
                pathParams: ['orgId' => $orgId],
                query: ['resourceId' => $resourceId, 'ruleId' => $ruleId],
                accept: 'empty',
            ),
            $options,
        );
    }
}
