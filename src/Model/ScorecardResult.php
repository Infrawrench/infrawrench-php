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

final class ScorecardResult implements \JsonSerializable
{
    /**
     * @param float|null $score 0-100; null when no check applied.
     * @param list<ScorecardCheckResult> $checks
     */
    public function __construct(
        public readonly string $scorecardId,
        public readonly string $scorecardName,
        public readonly string $serviceId,
        public readonly ?float $score,
        public readonly ?string $level,
        public readonly ?string $levelName,
        public readonly array $checks,
        public readonly string $evaluatedAt,
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
            scorecardId: Coerce::toString($data['scorecardId'] ?? null),
            scorecardName: Coerce::toString($data['scorecardName'] ?? null),
            serviceId: Coerce::toString($data['serviceId'] ?? null),
            score: Coerce::toFloatOrNull($data['score'] ?? null),
            level: Coerce::toStringOrNull($data['level'] ?? null),
            levelName: Coerce::toStringOrNull($data['levelName'] ?? null),
            checks: Coerce::mapList($data['checks'] ?? null, static fn (mixed $item): ScorecardCheckResult => ScorecardCheckResult::fromArray(Coerce::toArray($item))),
            evaluatedAt: Coerce::toString($data['evaluatedAt'] ?? null),
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
            'scorecardId' => $this->scorecardId,
            'scorecardName' => $this->scorecardName,
            'serviceId' => $this->serviceId,
            'score' => $this->score,
            'level' => $this->level,
            'levelName' => $this->levelName,
            'checks' => array_map(static fn (ScorecardCheckResult $item): array => $item->toArray(), $this->checks),
            'evaluatedAt' => $this->evaluatedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
