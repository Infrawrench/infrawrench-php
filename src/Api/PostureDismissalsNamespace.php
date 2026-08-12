<?php

/*
 * infrawrench/sdk v1.19.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.19.0).
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
use Infrawrench\Sdk\Model\PostureDismissal;
use Infrawrench\Sdk\Model\PostureDismissalCreate;
use Infrawrench\Sdk\RequestOptions;

/** `$client->posture->dismissals` */
final class PostureDismissalsNamespace extends ApiNamespace
{
    /**
     * Dismiss a posture finding
     *
     * Accept a finding — the bucket really is meant to be public, the key really is rotated out of
     * band. The finding leaves `findings` and stops feeding the daily posture alerts, but the rule
     * keeps being evaluated and the finding is reported back under `dismissed` for as long as it
     * still matches. Idempotent: dismissing an already-dismissed finding rewrites the note and the
     * author.
     *
     * _Requires permission: `resources:write`._
     *
     * POST /api/org/{orgId}/posture/dismissals
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(?string $orgId = null, ?PostureDismissalCreate $body = null, ?RequestOptions $options = null): PostureDismissal
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/posture/dismissals',
                pathParams: ['orgId' => $orgId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return PostureDismissal::fromArray(Coerce::toArray($data));
    }

    /**
     * Restore a dismissed posture finding
     *
     * Undo a dismissal, putting the finding back on the list and back into the alert feed. The
     * finding is identified by query parameters rather than path segments because resource ids are
     * provider-native and routinely contain slashes.
     *
     * _Requires permission: `resources:write`._
     *
     * DELETE /api/org/{orgId}/posture/dismissals
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string $resourceId Infrawrench resource id the finding is on.
     * @param string $ruleId The matched rule's id.
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $resourceId, string $ruleId, ?string $orgId = null, ?RequestOptions $options = null): void
    {
        $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/posture/dismissals',
                pathParams: ['orgId' => $orgId],
                query: ['resourceId' => $resourceId, 'ruleId' => $ruleId],
                accept: 'empty',
            ),
            $options,
        );
    }
}
