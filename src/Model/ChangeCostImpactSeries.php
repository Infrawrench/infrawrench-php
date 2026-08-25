<?php

/*
 * infrawrench/sdk v1.38.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.38.0).
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

final class ChangeCostImpactSeries implements \JsonSerializable
{
    /**
     * @param string $currency ISO 4217 code. Currencies are never summed.
     * @param float $deltaPerDay `afterPerDay - beforePerDay`. Positive means the change costs more.
     * @param float|null $deltaPercent Null when the before window spent nothing — there is no percentage.
     */
    public function __construct(
        public readonly string $currency,
        public readonly float $beforePerDay,
        public readonly float $afterPerDay,
        public readonly float $deltaPerDay,
        public readonly ?float $deltaPercent,
        public readonly float $beforeTotal,
        public readonly float $afterTotal,
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
            currency: Coerce::toString($data['currency'] ?? null),
            beforePerDay: Coerce::toFloat($data['beforePerDay'] ?? null),
            afterPerDay: Coerce::toFloat($data['afterPerDay'] ?? null),
            deltaPerDay: Coerce::toFloat($data['deltaPerDay'] ?? null),
            deltaPercent: Coerce::toFloatOrNull($data['deltaPercent'] ?? null),
            beforeTotal: Coerce::toFloat($data['beforeTotal'] ?? null),
            afterTotal: Coerce::toFloat($data['afterTotal'] ?? null),
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
            'currency' => $this->currency,
            'beforePerDay' => $this->beforePerDay,
            'afterPerDay' => $this->afterPerDay,
            'deltaPerDay' => $this->deltaPerDay,
            'deltaPercent' => $this->deltaPercent,
            'beforeTotal' => $this->beforeTotal,
            'afterTotal' => $this->afterTotal,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
