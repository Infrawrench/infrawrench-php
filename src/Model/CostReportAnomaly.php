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

final class CostReportAnomaly implements \JsonSerializable
{
    /**
     * @param string $day The anomalous day, YYYY-MM-DD (UTC).
     * @param float $actual That day's spend in the report's scope.
     * @param float $baseline The trailing 28-day mean it was judged against.
     * @param float $threshold The bar it cleared: mean + sigmas x stddev.
     * @param string|null $notifiedAt When it was delivered; null while undelivered or inside the 7-day cooldown.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $day,
        public readonly string $currency,
        public readonly float $actual,
        public readonly float $baseline,
        public readonly float $threshold,
        public readonly ?string $notifiedAt,
        public readonly string $createdAt,
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
            day: Coerce::toString($data['day'] ?? null),
            currency: Coerce::toString($data['currency'] ?? null),
            actual: Coerce::toFloat($data['actual'] ?? null),
            baseline: Coerce::toFloat($data['baseline'] ?? null),
            threshold: Coerce::toFloat($data['threshold'] ?? null),
            notifiedAt: Coerce::toStringOrNull($data['notifiedAt'] ?? null),
            createdAt: Coerce::toString($data['createdAt'] ?? null),
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
            'day' => $this->day,
            'currency' => $this->currency,
            'actual' => $this->actual,
            'baseline' => $this->baseline,
            'threshold' => $this->threshold,
            'notifiedAt' => $this->notifiedAt,
            'createdAt' => $this->createdAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
