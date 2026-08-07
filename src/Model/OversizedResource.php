<?php

/*
 * infrawrench/sdk v0.38.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.38.0).
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

final class OversizedResource implements \JsonSerializable
{
    /**
     * @param string $id Infrawrench resource id.
     * @param PluginId::* $pluginId
     * @param string|null $externalId Provider-native id, when known.
     * @param string $sizeFieldKey Field to submit through the resource-update endpoint to apply the recommended size.
     * @param string|null $region Provider region/zone/location the resource lives in.
     * @param float $cpuP95 p95 CPU utilisation over the window, percent of the current size.
     * @param float|null $memoryP95 p95 memory utilisation, percent of the current size; null when unmeasured.
     * @param bool $memoryMeasured False when the provider stores no memory series for this resource.
     * @param float $projectedCpuP95 Projected p95 CPU on the recommended size, for the confirm dialog.
     * @param string $currency ISO 4217 code the size prices are quoted in.
     * @param float|null $monthlySaving Current minus recommended monthly price; null when either side is unpriced.
     * @param string|null $resizeNote Plugin-authored caveat (e.g. the provider requires the machine stopped).
     */
    public function __construct(
        public readonly string $id,
        public readonly string $pluginId,
        public readonly string $resourceTypeId,
        public readonly string $resourceTypeName,
        public readonly string $displayName,
        public readonly ?string $externalId,
        public readonly string $sizeFieldKey,
        public readonly ?string $region,
        public readonly OversizedSizeSummary $currentSize,
        public readonly OversizedSizeSummary $recommendedSize,
        public readonly float $cpuP95,
        public readonly ?float $memoryP95,
        public readonly bool $memoryMeasured,
        public readonly float $projectedCpuP95,
        public readonly string $currency,
        public readonly ?float $monthlySaving,
        public readonly ?string $resizeNote,
        public readonly ?string $lastSyncedAt,
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
            pluginId: Coerce::toString($data['pluginId'] ?? null),
            resourceTypeId: Coerce::toString($data['resourceTypeId'] ?? null),
            resourceTypeName: Coerce::toString($data['resourceTypeName'] ?? null),
            displayName: Coerce::toString($data['displayName'] ?? null),
            externalId: Coerce::toStringOrNull($data['externalId'] ?? null),
            sizeFieldKey: Coerce::toString($data['sizeFieldKey'] ?? null),
            region: Coerce::toStringOrNull($data['region'] ?? null),
            currentSize: OversizedSizeSummary::fromArray(Coerce::toArray($data['currentSize'] ?? null)),
            recommendedSize: OversizedSizeSummary::fromArray(Coerce::toArray($data['recommendedSize'] ?? null)),
            cpuP95: Coerce::toFloat($data['cpuP95'] ?? null),
            memoryP95: Coerce::toFloatOrNull($data['memoryP95'] ?? null),
            memoryMeasured: Coerce::toBool($data['memoryMeasured'] ?? null),
            projectedCpuP95: Coerce::toFloat($data['projectedCpuP95'] ?? null),
            currency: Coerce::toString($data['currency'] ?? null),
            monthlySaving: Coerce::toFloatOrNull($data['monthlySaving'] ?? null),
            resizeNote: Coerce::toStringOrNull($data['resizeNote'] ?? null),
            lastSyncedAt: Coerce::toStringOrNull($data['lastSyncedAt'] ?? null),
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
            'pluginId' => $this->pluginId,
            'resourceTypeId' => $this->resourceTypeId,
            'resourceTypeName' => $this->resourceTypeName,
            'displayName' => $this->displayName,
            'externalId' => $this->externalId,
            'sizeFieldKey' => $this->sizeFieldKey,
            'region' => $this->region,
            'currentSize' => $this->currentSize->toArray(),
            'recommendedSize' => $this->recommendedSize->toArray(),
            'cpuP95' => $this->cpuP95,
            'memoryP95' => $this->memoryP95,
            'memoryMeasured' => $this->memoryMeasured,
            'projectedCpuP95' => $this->projectedCpuP95,
            'currency' => $this->currency,
            'monthlySaving' => $this->monthlySaving,
            'resizeNote' => $this->resizeNote,
            'lastSyncedAt' => $this->lastSyncedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
