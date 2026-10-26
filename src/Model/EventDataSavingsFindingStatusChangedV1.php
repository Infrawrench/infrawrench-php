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

namespace Infrawrench\Sdk\Model;

use Infrawrench\Sdk\Internal\Coerce;

/**
 * `data` of a `savings.finding.status_changed` event, version 1. A savings finding (orphaned
 * resource, oversized resource, extended support surcharge or unused seat) moved between Ready for
 * review, In progress, Completed and Archived, by a person or because a scan stopped reporting it.
 *
 * Spec schema: `EventData_savings_finding_status_changed_v1`.
 */
final class EventDataSavingsFindingStatusChangedV1 implements \JsonSerializable
{
    /**
     * @param string $key The finding key, `<kind>:<sourceId>`.
     * @param 'orphan'|'oversized'|'extended_support'|'seat' $kind Which finder reported it.
     * @param string $title One line describing the finding.
     * @param string $resourceName Resource or seat holder display name.
     * @param string|null $resourceId Infrawrench resource id; null for seats.
     * @param string|null $pluginId Provider plugin id.
     * @param 'ready'|'in_progress'|'completed'|'archived' $previousStatus Status before the change.
     * @param 'ready'|'in_progress'|'completed'|'archived' $status Status after the change.
     * @param 'manual'|'resolved'|null $resolution For Completed: a person said so, or a scan stopped reporting it.
     * @param string|null $changedByUserId Who changed it; null for automatic changes.
     * @param string|null $note The note recorded with the change.
     * @param float|null $monthlySavings Monthly savings at stake, in `currency`.
     * @param string|null $currency ISO 4217 currency code.
     * @param string $detectedAt When this occurrence of the finding was first observed.
     */
    public function __construct(
        public readonly string $key,
        public readonly string $kind,
        public readonly string $title,
        public readonly string $resourceName,
        public readonly ?string $resourceId,
        public readonly ?string $pluginId,
        public readonly string $previousStatus,
        public readonly string $status,
        public readonly ?string $resolution,
        public readonly ?string $changedByUserId,
        public readonly ?string $note,
        public readonly ?float $monthlySavings,
        public readonly ?string $currency,
        public readonly string $detectedAt,
    ) {
    }

    /**
     * Build one from a decoded JSON object.
     *
     * @param array<string, mixed> $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            key: Coerce::toString($data['key'] ?? null),
            kind: Coerce::toString($data['kind'] ?? null),
            title: Coerce::toString($data['title'] ?? null),
            resourceName: Coerce::toString($data['resourceName'] ?? null),
            resourceId: Coerce::toStringOrNull($data['resourceId'] ?? null),
            pluginId: Coerce::toStringOrNull($data['pluginId'] ?? null),
            previousStatus: Coerce::toString($data['previousStatus'] ?? null),
            status: Coerce::toString($data['status'] ?? null),
            resolution: Coerce::toStringOrNull($data['resolution'] ?? null),
            changedByUserId: Coerce::toStringOrNull($data['changedByUserId'] ?? null),
            note: Coerce::toStringOrNull($data['note'] ?? null),
            monthlySavings: Coerce::toFloatOrNull($data['monthlySavings'] ?? null),
            currency: Coerce::toStringOrNull($data['currency'] ?? null),
            detectedAt: Coerce::toString($data['detectedAt'] ?? null),
        );
    }

    /**
     * The wire representation, ready for `json_encode`.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'key' => $this->key,
            'kind' => $this->kind,
            'title' => $this->title,
            'resourceName' => $this->resourceName,
            'resourceId' => $this->resourceId,
            'pluginId' => $this->pluginId,
            'previousStatus' => $this->previousStatus,
            'status' => $this->status,
            'resolution' => $this->resolution,
            'changedByUserId' => $this->changedByUserId,
            'note' => $this->note,
            'monthlySavings' => $this->monthlySavings,
            'currency' => $this->currency,
            'detectedAt' => $this->detectedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
