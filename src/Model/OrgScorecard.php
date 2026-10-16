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

final class OrgScorecard implements \JsonSerializable
{
    /**
     * @param int|null $score Weighted mean over the assessed pillars, or null when none could be assessed: an organization with nothing connected has nothing to grade.
     * @param OrgScorecardGrade::* $grade
     * @param list<OrgScorecardPillar> $pillars
     * @param list<OrgScorecardPillarId::*> $failedPillars Pillars whose computation failed, as opposed to having no data. Excluded from the overall exactly as unassessed ones are, but named apart.
     * @param list<OrgScorecardTrendPoint> $trend Stored daily readings for the last 90 days, oldest first.
     */
    public function __construct(
        public readonly ?int $score,
        public readonly string $grade,
        public readonly array $pillars,
        public readonly array $failedPillars,
        public readonly array $trend,
        public readonly string $generatedAt,
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
            score: Coerce::toIntOrNull($data['score'] ?? null),
            grade: Coerce::toString($data['grade'] ?? null),
            pillars: Coerce::mapList($data['pillars'] ?? null, static fn (mixed $item): OrgScorecardPillar => OrgScorecardPillar::fromArray(Coerce::toArray($item))),
            failedPillars: Coerce::mapList($data['failedPillars'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            trend: Coerce::mapList($data['trend'] ?? null, static fn (mixed $item): OrgScorecardTrendPoint => OrgScorecardTrendPoint::fromArray(Coerce::toArray($item))),
            generatedAt: Coerce::toString($data['generatedAt'] ?? null),
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
            'score' => $this->score,
            'grade' => $this->grade,
            'pillars' => array_map(static fn (OrgScorecardPillar $item): array => $item->toArray(), $this->pillars),
            'failedPillars' => $this->failedPillars,
            'trend' => array_map(static fn (OrgScorecardTrendPoint $item): array => $item->toArray(), $this->trend),
            'generatedAt' => $this->generatedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
