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

final class OrgScorecardTrendPoint implements \JsonSerializable
{
    /**
     * @param string $day UTC calendar day.
     * @param array<string, int> $pillars Per-pillar scores that day. A pillar unassessed then is absent, not zero.
     */
    public function __construct(
        public readonly string $day,
        public readonly int $score,
        public readonly mixed $grade,
        public readonly array $pillars,
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
            day: Coerce::toString($data['day'] ?? null),
            score: Coerce::toInt($data['score'] ?? null),
            grade: $data['grade'] ?? null,
            pillars: Coerce::mapValues($data['pillars'] ?? null, static fn (mixed $item): int => Coerce::toInt($item)),
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
            'day' => $this->day,
            'score' => $this->score,
            'grade' => $this->grade,
            'pillars' => $this->pillars,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
