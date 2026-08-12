<?php

/*
 * infrawrench/sdk v1.21.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.21.0).
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
use Infrawrench\Sdk\Model\RevertApplyResponse;
use Infrawrench\Sdk\Model\RevertPreviewResponse;
use Infrawrench\Sdk\RequestOptions;

/** `$client->changes->revert` */
final class ChangesRevertNamespace extends ApiNamespace
{
    /**
     * Revert one change event
     *
     * Applies the inverse patch through the plugin's ordinary `updateResource` path — the same
     * call the Edit form makes — and only for the fields the dry run marked `revertible`.
     *
     * The plan is rebuilt against a fresh live read immediately before the write, so a field that
     * moved between the preview and the apply becomes a conflict and drops out of the patch.
     *
     * **This is a last-moment re-read, not an atomic compare-and-swap.** The gap between reading a
     * field and writing it is one provider round-trip wide, and a third party writing inside that
     * gap will be overwritten without warning. It cannot be closed generically: the plugin update
     * contract carries no expected value, ETag or version token, so no conditional write can be
     * expressed for a provider that supports one. Treat the conflict detection as a strong guard
     * against stale plans, not as a mutual-exclusion guarantee against other writers.
     *
     * Reverts of the *same event* are mutually exclusive: the event is claimed with a conditional
     * update under a five-minute lease, so two concurrent reverts cannot both reach the provider
     * and the loser gets `409`. A provider failure releases the claim immediately; a process that
     * dies mid-write leaves a claim that expires, so an interrupted revert is retryable rather
     * than permanently stuck. `revertedAt` is only set once the provider accepted the write.
     *
     * The claim carries an owner token, and every write that ends a revert is fenced on it. An
     * attempt whose provider call outlives the lease can therefore neither release nor complete
     * the claim that replaced it — it gets `409` with `appliedFields` naming what it did write, so
     * the caller can reconcile rather than assume. Two attempts can overlap in that case, but they
     * cannot disagree: both invert the same recorded event to the same values, so the second one's
     * patch is a subset of the first's.
     *
     * If a write reaches the provider but recording it fails, the response is `500` with
     * `appliedFields` — the resource moved and the timeline has not caught up. The claim is
     * deliberately held in that case, and the next attempt after the lease expires finds every
     * field already back and records the revert without touching the provider again, answering
     * `200` with `reconciled: true` and an empty `appliedFields`. A resource put back by hand is
     * not mistaken for this: reconciliation only happens on an event whose claim was still
     * outstanding, which is the only state in which an unrecorded write is possible.
     *
     * Blocked with `423` while an org change freeze is in effect. Every attempt whose write
     * reached the provider is audit-logged as `resource.change_revert`, including one that lost
     * its claim or could not record — the entry's `outcome` is `recorded`, `superseded`,
     * `unrecorded` or `reconciled`, so a contested outcome reads as one mutation rather than as
     * several reverts. An attempt that neither wrote nor recorded anything logs nothing.
     * Attribution is best-effort: no transaction spans a third-party cloud API and Infrawrench's
     * database, so if the audit insert itself fails the response carries `auditRecorded: false`
     * and the details go to the server log rather than being silently dropped.
     *
     * The stored resource snapshot is deliberately left untouched, so the next poll observes the
     * reverted state and records it as an ordinary change event.
     *
     * POST /api/org/{orgId}/changes/{changeId}/revert
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * Raises on 409: Already reverted, another revert holds the event, nothing in the plan is
     * writable, or this attempt was superseded mid-write (its lease lapsed). The body carries
     * `code: change_revert_conflict` for all but the writability case, and `appliedFields` when
     * the provider write had already landed.
     *
     * Raises on 423: Blocked by an active change freeze. Retry with the `x-change-freeze-override:
     * true` header if you hold `freezes:override`; both blocks and overrides are audit-logged.
     *
     * Raises on 500: The provider accepted the write but it could not be recorded against the
     * event. The resource *has* been put back; `appliedFields` names what changed. A later retry
     * reconciles the timeline.
     *
     * Raises on 502: The provider couldn't be read. Nothing was written.
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(string $changeId, ?string $orgId = null, ?RequestOptions $options = null): RevertApplyResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/changes/{changeId}/revert',
                pathParams: ['orgId' => $orgId, 'changeId' => $changeId],
            ),
            $options,
        );

        return RevertApplyResponse::fromArray(Coerce::toArray($data));
    }

    /**
     * Dry-run a revert of one change event
     *
     * Inverts the recorded diff and reconciles it against the resource's *current* live fields,
     * which is the whole point: the poller may have recorded this hours ago and the world may have
     * moved on. Read-only — it reads from the provider and writes nothing.
     *
     * Only `updated` events with a field diff can be reverted. `outputs.*` entries are
     * provider-derived and are never written back, and whether a field is writable at all is the
     * plugin's own edit-form rule (`editable`, minus `secret` and `association` kinds), so a
     * revert can never issue a provider call an edit could not.
     *
     * Gated on `resources:write` rather than `resources:read`: the plan names the write it is
     * offering to make.
     *
     * GET /api/org/{orgId}/changes/{changeId}/revert
     *
     * Raises on 404: Not found
     *
     * Raises on 502: The provider couldn't be read, so no plan can be made safely. Nothing was
     * written.
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(string $changeId, ?string $orgId = null, ?RequestOptions $options = null): RevertPreviewResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/changes/{changeId}/revert',
                pathParams: ['orgId' => $orgId, 'changeId' => $changeId],
            ),
            $options,
        );

        return RevertPreviewResponse::fromArray(Coerce::toArray($data));
    }
}
