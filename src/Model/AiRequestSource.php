<?php

/*
 * infrawrench/sdk v1.58.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.58.0).
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

final class AiRequestSource implements \JsonSerializable
{
    /**
     * @param 'plugin'|'litellm' $kind
     * @param array<string, string> $location
     * @param array<string, float> $observedMetadataKeys
     */
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly string $kind,
        public readonly ?string $pluginId,
        public readonly ?string $accountId,
        public readonly ?string $accountName,
        public readonly string $sourceKindId,
        public readonly array $location,
        public readonly bool $enabled,
        public readonly int $lookbackDays,
        public readonly ?string $baseUrl,
        public readonly bool $hasApiKey,
        public readonly ?string $collectedThrough,
        public readonly ?string $lastRunAt,
        public readonly ?string $nextRunAt,
        public readonly ?string $lastError,
        public readonly ?string $lastErrorHelpUrl,
        public readonly int $failureCount,
        public readonly array $observedMetadataKeys,
        public readonly ?float $lastQueryBytesScanned,
        public readonly string $createdAt,
        public readonly string $updatedAt,
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
            id: Coerce::toString($data['id'] ?? null),
            name: Coerce::toString($data['name'] ?? null),
            kind: Coerce::toString($data['kind'] ?? null),
            pluginId: Coerce::toStringOrNull($data['pluginId'] ?? null),
            accountId: Coerce::toStringOrNull($data['accountId'] ?? null),
            accountName: Coerce::toStringOrNull($data['accountName'] ?? null),
            sourceKindId: Coerce::toString($data['sourceKindId'] ?? null),
            location: Coerce::mapValues($data['location'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            enabled: Coerce::toBool($data['enabled'] ?? null),
            lookbackDays: Coerce::toInt($data['lookbackDays'] ?? null),
            baseUrl: Coerce::toStringOrNull($data['baseUrl'] ?? null),
            hasApiKey: Coerce::toBool($data['hasApiKey'] ?? null),
            collectedThrough: Coerce::toStringOrNull($data['collectedThrough'] ?? null),
            lastRunAt: Coerce::toStringOrNull($data['lastRunAt'] ?? null),
            nextRunAt: Coerce::toStringOrNull($data['nextRunAt'] ?? null),
            lastError: Coerce::toStringOrNull($data['lastError'] ?? null),
            lastErrorHelpUrl: Coerce::toStringOrNull($data['lastErrorHelpUrl'] ?? null),
            failureCount: Coerce::toInt($data['failureCount'] ?? null),
            observedMetadataKeys: Coerce::mapValues($data['observedMetadataKeys'] ?? null, static fn (mixed $item): float => Coerce::toFloat($item)),
            lastQueryBytesScanned: Coerce::toFloatOrNull($data['lastQueryBytesScanned'] ?? null),
            createdAt: Coerce::toString($data['createdAt'] ?? null),
            updatedAt: Coerce::toString($data['updatedAt'] ?? null),
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
            'id' => $this->id,
            'name' => $this->name,
            'kind' => $this->kind,
            'pluginId' => $this->pluginId,
            'accountId' => $this->accountId,
            'accountName' => $this->accountName,
            'sourceKindId' => $this->sourceKindId,
            'location' => $this->location,
            'enabled' => $this->enabled,
            'lookbackDays' => $this->lookbackDays,
            'baseUrl' => $this->baseUrl,
            'hasApiKey' => $this->hasApiKey,
            'collectedThrough' => $this->collectedThrough,
            'lastRunAt' => $this->lastRunAt,
            'nextRunAt' => $this->nextRunAt,
            'lastError' => $this->lastError,
            'lastErrorHelpUrl' => $this->lastErrorHelpUrl,
            'failureCount' => $this->failureCount,
            'observedMetadataKeys' => $this->observedMetadataKeys,
            'lastQueryBytesScanned' => $this->lastQueryBytesScanned,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
