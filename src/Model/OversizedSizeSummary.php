<?php

/*
 * infrawrench/sdk v1.36.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.36.0).
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

final class OversizedSizeSummary implements \JsonSerializable
{
    /**
     * @param float|null $priceMonthly Monthly catalog price in `currency`; null when unpriced.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $label,
        public readonly int $vcpus,
        public readonly int $memoryMb,
        public readonly ?float $priceMonthly,
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
            label: Coerce::toString($data['label'] ?? null),
            vcpus: Coerce::toInt($data['vcpus'] ?? null),
            memoryMb: Coerce::toInt($data['memoryMb'] ?? null),
            priceMonthly: Coerce::toFloatOrNull($data['priceMonthly'] ?? null),
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
            'label' => $this->label,
            'vcpus' => $this->vcpus,
            'memoryMb' => $this->memoryMb,
            'priceMonthly' => $this->priceMonthly,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
