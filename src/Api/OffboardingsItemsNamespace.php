<?php

/*
 * infrawrench/sdk v1.133.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.133.0).
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
use Infrawrench\Sdk\Model\OffboardingActionInput;
use Infrawrench\Sdk\Model\OffboardingActionResult;
use Infrawrench\Sdk\Model\OffboardingItem;
use Infrawrench\Sdk\Model\OffboardingItemPatchInput;
use Infrawrench\Sdk\RequestOptions;

/** `$client->offboardings->items` */
final class OffboardingsItemsNamespace extends ApiNamespace
{
    /**
     * Act on a checklist row
     *
     * Run one of the row's `actions`. Each needs the permission its own surface asks for on top of
     * `team:remove` (403 otherwise), and the ones that reach a provider (`revoke`, `remove`,
     * `remove-seat`, `revoke-jit`) are blocked by an active change freeze (423). Refused (409) for
     * an unconfirmed or rejected match, a closed offboarding, or an action the row does not offer.
     * Every attempt is recorded in the audit log.
     *
     * _Requires permission: `team:remove`._
     *
     * POST /api/org/{orgId}/offboardings/{id}/items/{itemId}/action
     *
     * Raises on 400: Bad request
     *
     * Raises on 403: Forbidden
     *
     * Raises on 404: Not found
     *
     * Raises on 409: Conflict
     *
     * Raises on 423: Blocked by an active change freeze. Retry with the `x-change-freeze-override:
     * true` header if you hold `freezes:override`; both blocks and overrides are audit-logged.
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function action(string $id, string $itemId, OffboardingActionInput $body, ?string $orgId = null, ?RequestOptions $options = null): OffboardingActionResult
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/offboardings/{id}/items/{itemId}/action',
                pathParams: ['orgId' => $orgId, 'id' => $id, 'itemId' => $itemId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return OffboardingActionResult::fromArray(Coerce::toArray($data));
    }

    /**
     * Confirm a match or mark a row by hand
     *
     * Confirm or reject a possible match, mark a row done (handled in the provider) or skipped
     * (not needed), reopen it, or leave a note.
     *
     * _Requires permission: `team:remove`._
     *
     * PATCH /api/org/{orgId}/offboardings/{id}/items/{itemId}
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
    public function update(string $id, string $itemId, OffboardingItemPatchInput $body, ?string $orgId = null, ?RequestOptions $options = null): OffboardingItem
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PATCH',
                path: '/api/org/{orgId}/offboardings/{id}/items/{itemId}',
                pathParams: ['orgId' => $orgId, 'id' => $id, 'itemId' => $itemId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return OffboardingItem::fromArray(Coerce::toArray($data));
    }
}
