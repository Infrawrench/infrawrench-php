<?php

/*
 * infrawrench/sdk v1.13.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.13.0).
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

final class CommitmentPlanner implements \JsonSerializable
{
    /**
     * @param bool $available False when the data window is under the 60-day minimum.
     * @param list<CommitmentRecommendation> $recommendations
     * @param list<CommitmentRejectedCell> $rejected
     */
    public function __construct(
        public readonly bool $available,
        public readonly int $windowDayCount,
        public readonly array $recommendations,
        public readonly array $rejected,
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
            available: Coerce::toBool($data['available'] ?? null),
            windowDayCount: Coerce::toInt($data['windowDayCount'] ?? null),
            recommendations: Coerce::mapList($data['recommendations'] ?? null, static fn (mixed $item): CommitmentRecommendation => CommitmentRecommendation::fromArray(Coerce::toArray($item))),
            rejected: Coerce::mapList($data['rejected'] ?? null, static fn (mixed $item): CommitmentRejectedCell => CommitmentRejectedCell::fromArray(Coerce::toArray($item))),
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
            'available' => $this->available,
            'windowDayCount' => $this->windowDayCount,
            'recommendations' => array_map(static fn (CommitmentRecommendation $item): array => $item->toArray(), $this->recommendations),
            'rejected' => array_map(static fn (CommitmentRejectedCell $item): array => $item->toArray(), $this->rejected),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
