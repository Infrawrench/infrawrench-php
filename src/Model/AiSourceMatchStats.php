<?php

/*
 * infrawrench/sdk v1.74.1 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.74.1).
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

final class AiSourceMatchStats implements \JsonSerializable
{
    public function __construct(
        public readonly string $sourceId,
        public readonly string $name,
        public readonly int $days,
        public readonly float $requests,
        public readonly float $matchedRequests,
        public readonly float $ambiguousRequests,
        public readonly float $unmatchedRequests,
        public readonly float $skippedRecords,
        public readonly ?string $currency,
        public readonly float $attributedAmount,
        public readonly float $billedAmount,
        public readonly ?float $coveragePercent,
        public readonly int $degradedDays,
        public readonly int $truncatedDays,
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
            sourceId: Coerce::toString($data['sourceId'] ?? null),
            name: Coerce::toString($data['name'] ?? null),
            days: Coerce::toInt($data['days'] ?? null),
            requests: Coerce::toFloat($data['requests'] ?? null),
            matchedRequests: Coerce::toFloat($data['matchedRequests'] ?? null),
            ambiguousRequests: Coerce::toFloat($data['ambiguousRequests'] ?? null),
            unmatchedRequests: Coerce::toFloat($data['unmatchedRequests'] ?? null),
            skippedRecords: Coerce::toFloat($data['skippedRecords'] ?? null),
            currency: Coerce::toStringOrNull($data['currency'] ?? null),
            attributedAmount: Coerce::toFloat($data['attributedAmount'] ?? null),
            billedAmount: Coerce::toFloat($data['billedAmount'] ?? null),
            coveragePercent: Coerce::toFloatOrNull($data['coveragePercent'] ?? null),
            degradedDays: Coerce::toInt($data['degradedDays'] ?? null),
            truncatedDays: Coerce::toInt($data['truncatedDays'] ?? null),
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
            'sourceId' => $this->sourceId,
            'name' => $this->name,
            'days' => $this->days,
            'requests' => $this->requests,
            'matchedRequests' => $this->matchedRequests,
            'ambiguousRequests' => $this->ambiguousRequests,
            'unmatchedRequests' => $this->unmatchedRequests,
            'skippedRecords' => $this->skippedRecords,
            'currency' => $this->currency,
            'attributedAmount' => $this->attributedAmount,
            'billedAmount' => $this->billedAmount,
            'coveragePercent' => $this->coveragePercent,
            'degradedDays' => $this->degradedDays,
            'truncatedDays' => $this->truncatedDays,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
