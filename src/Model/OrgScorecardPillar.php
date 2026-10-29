<?php

/*
 * infrawrench/sdk v1.85.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.85.0).
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

final class OrgScorecardPillar implements \JsonSerializable
{
    /**
     * @param OrgScorecardPillarId::* $id
     * @param int|null $score Null when the pillar could not be assessed, **never zero**. An unassessed pillar is excluded from the overall rather than counted as failure.
     * @param int $weight Relative weight in the overall, fixed: posture 25, recoverability 20, services 15, deadlines 15, access 10, headroom 10, ownership 5. Weights renormalize over the assessed pillars, so gaining one cannot read as a regression.
     * @param string $headline What the score measures over, in one line.
     * @param string|null $unassessedReason Why there is no score, phrased so a reader can act on it. Null when scored.
     * @param string|null $nextStep The single most valuable thing to fix. Null when clean or unassessed.
     * @param list<OrgScorecardFact> $facts
     */
    public function __construct(
        public readonly string $id,
        public readonly ?int $score,
        public readonly int $weight,
        public readonly string $headline,
        public readonly ?string $unassessedReason,
        public readonly ?string $nextStep,
        public readonly array $facts,
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
            score: Coerce::toIntOrNull($data['score'] ?? null),
            weight: Coerce::toInt($data['weight'] ?? null),
            headline: Coerce::toString($data['headline'] ?? null),
            unassessedReason: Coerce::toStringOrNull($data['unassessedReason'] ?? null),
            nextStep: Coerce::toStringOrNull($data['nextStep'] ?? null),
            facts: Coerce::mapList($data['facts'] ?? null, static fn (mixed $item): OrgScorecardFact => OrgScorecardFact::fromArray(Coerce::toArray($item))),
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
            'score' => $this->score,
            'weight' => $this->weight,
            'headline' => $this->headline,
            'unassessedReason' => $this->unassessedReason,
            'nextStep' => $this->nextStep,
            'facts' => array_map(static fn (OrgScorecardFact $item): array => $item->toArray(), $this->facts),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
