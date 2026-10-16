<?php

/*
 * infrawrench/sdk v1.82.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.82.0).
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

final class SavingsFinding implements \JsonSerializable
{
    /**
     * @param string $key `<kind>:<sourceId>`, stable across scans; the handle for status changes.
     * @param SavingsFindingKind::* $kind
     * @param string|null $resourceId Infrawrench resource id; null for seats.
     * @param array<string, string> $tags
     * @param SavingsFindingStatus::* $status
     * @param 'manual'|'resolved'|null $resolution For Completed: `manual` when a person completed it, `resolved` when a scan stopped reporting it (the resource was removed, resized or is in use again).
     * @param string $detectedAt First observation of this occurrence.
     * @param bool $present False once a scan stopped reporting it.
     * @param array{eventId: string, title: string}|null $realizedSavings The realized savings entry recorded for the fix, when one matches.
     */
    public function __construct(
        public readonly string $key,
        public readonly string $kind,
        public readonly string $sourceId,
        public readonly string $title,
        public readonly ?string $detail,
        public readonly ?string $pluginId,
        public readonly ?string $pluginName,
        public readonly ?string $accountId,
        public readonly ?string $accountName,
        public readonly ?string $region,
        public readonly ?string $resourceId,
        public readonly string $resourceName,
        public readonly ?string $resourceTypeId,
        public readonly ?string $resourceTypeName,
        public readonly array $tags,
        public readonly ?SavingsFindingMoney $monthlySavings,
        public readonly string $status,
        public readonly ?string $statusChangedAt,
        public readonly ?SavingsFindingActor $statusChangedBy,
        public readonly ?string $statusNote,
        public readonly ?string $resolution,
        public readonly string $detectedAt,
        public readonly string $lastSeenAt,
        public readonly bool $present,
        public readonly ?array $realizedSavings,
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
            sourceId: Coerce::toString($data['sourceId'] ?? null),
            title: Coerce::toString($data['title'] ?? null),
            detail: Coerce::toStringOrNull($data['detail'] ?? null),
            pluginId: Coerce::toStringOrNull($data['pluginId'] ?? null),
            pluginName: Coerce::toStringOrNull($data['pluginName'] ?? null),
            accountId: Coerce::toStringOrNull($data['accountId'] ?? null),
            accountName: Coerce::toStringOrNull($data['accountName'] ?? null),
            region: Coerce::toStringOrNull($data['region'] ?? null),
            resourceId: Coerce::toStringOrNull($data['resourceId'] ?? null),
            resourceName: Coerce::toString($data['resourceName'] ?? null),
            resourceTypeId: Coerce::toStringOrNull($data['resourceTypeId'] ?? null),
            resourceTypeName: Coerce::toStringOrNull($data['resourceTypeName'] ?? null),
            tags: Coerce::mapValues($data['tags'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            monthlySavings: Coerce::nullable($data['monthlySavings'] ?? null, static fn (mixed $value): SavingsFindingMoney => SavingsFindingMoney::fromArray(Coerce::toArray($value))),
            status: Coerce::toString($data['status'] ?? null),
            statusChangedAt: Coerce::toStringOrNull($data['statusChangedAt'] ?? null),
            statusChangedBy: Coerce::nullable($data['statusChangedBy'] ?? null, static fn (mixed $value): SavingsFindingActor => SavingsFindingActor::fromArray(Coerce::toArray($value))),
            statusNote: Coerce::toStringOrNull($data['statusNote'] ?? null),
            resolution: Coerce::toStringOrNull($data['resolution'] ?? null),
            detectedAt: Coerce::toString($data['detectedAt'] ?? null),
            lastSeenAt: Coerce::toString($data['lastSeenAt'] ?? null),
            present: Coerce::toBool($data['present'] ?? null),
            realizedSavings: Coerce::toArrayOrNull($data['realizedSavings'] ?? null),
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
            'sourceId' => $this->sourceId,
            'title' => $this->title,
            'detail' => $this->detail,
            'pluginId' => $this->pluginId,
            'pluginName' => $this->pluginName,
            'accountId' => $this->accountId,
            'accountName' => $this->accountName,
            'region' => $this->region,
            'resourceId' => $this->resourceId,
            'resourceName' => $this->resourceName,
            'resourceTypeId' => $this->resourceTypeId,
            'resourceTypeName' => $this->resourceTypeName,
            'tags' => $this->tags,
            'monthlySavings' => $this->monthlySavings?->toArray(),
            'status' => $this->status,
            'statusChangedAt' => $this->statusChangedAt,
            'statusChangedBy' => $this->statusChangedBy?->toArray(),
            'statusNote' => $this->statusNote,
            'resolution' => $this->resolution,
            'detectedAt' => $this->detectedAt,
            'lastSeenAt' => $this->lastSeenAt,
            'present' => $this->present,
            'realizedSavings' => $this->realizedSavings,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
