<?php

/*
 * infrawrench/sdk v1.17.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.17.0).
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

final class NetworkFlowScopeSummary implements \JsonSerializable
{
    /**
     * @param string $scope Which billing boundary the traffic crossed. `unknown` means the provider's record did not determine one — it is priced at zero and labelled rather than folded into a neighbouring boundary.
     * @param 'egress'|'ingress' $direction
     * @param float $unattributedBytes Bytes inside `bytes` whose endpoints could not be tied to a workload. A subset, not an addition — nothing here has been apportioned across the attributed rows.
     * @param float $truncatedBytes Bytes inside `bytes` that fell below the stored top-N pair cap, computed by subtraction against the provider's exact totals rather than estimated.
     */
    public function __construct(
        public readonly string $scope,
        public readonly string $direction,
        public readonly float $bytes,
        public readonly float $estimatedCost,
        public readonly string $currency,
        public readonly bool $crossedZone,
        public readonly bool $crossedRegion,
        public readonly bool $leftCloud,
        public readonly float $unattributedBytes,
        public readonly float $truncatedBytes,
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
            scope: Coerce::toString($data['scope'] ?? null),
            direction: Coerce::toString($data['direction'] ?? null),
            bytes: Coerce::toFloat($data['bytes'] ?? null),
            estimatedCost: Coerce::toFloat($data['estimatedCost'] ?? null),
            currency: Coerce::toString($data['currency'] ?? null),
            crossedZone: Coerce::toBool($data['crossedZone'] ?? null),
            crossedRegion: Coerce::toBool($data['crossedRegion'] ?? null),
            leftCloud: Coerce::toBool($data['leftCloud'] ?? null),
            unattributedBytes: Coerce::toFloat($data['unattributedBytes'] ?? null),
            truncatedBytes: Coerce::toFloat($data['truncatedBytes'] ?? null),
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
            'scope' => $this->scope,
            'direction' => $this->direction,
            'bytes' => $this->bytes,
            'estimatedCost' => $this->estimatedCost,
            'currency' => $this->currency,
            'crossedZone' => $this->crossedZone,
            'crossedRegion' => $this->crossedRegion,
            'leftCloud' => $this->leftCloud,
            'unattributedBytes' => $this->unattributedBytes,
            'truncatedBytes' => $this->truncatedBytes,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
