<?php

/*
 * infrawrench/sdk v1.81.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.81.0).
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

/**
 * `data` of a `scorecard.level_changed` event, version 1. A service moved up or down a level on a
 * scorecard between two evaluations. A service's first evaluation is never sent.
 *
 * Spec schema: `EventData_scorecard_level_changed_v1`.
 */
final class EventDataScorecardLevelChangedV1 implements \JsonSerializable
{
    /**
     * @param string $scorecardId Scorecard id.
     * @param string $scorecardName Scorecard name.
     * @param string $serviceId Service id.
     * @param string $serviceSlug The service's slug.
     * @param string $serviceName Service name.
     * @param 'up'|'down' $direction Whether the service went up or down the ladder.
     * @param string|null $previousLevel Level key before; null for no level.
     * @param string|null $previousLevelName Level name before; null for no level.
     * @param string|null $level Level key now; null for no level.
     * @param string|null $levelName Level name now; null for no level.
     * @param float|null $score Weighted score now, 0-100; null when no check applied.
     * @param list<string> $failingChecks Names of the checks failing (or erroring) now.
     */
    public function __construct(
        public readonly string $scorecardId,
        public readonly string $scorecardName,
        public readonly string $serviceId,
        public readonly string $serviceSlug,
        public readonly string $serviceName,
        public readonly string $direction,
        public readonly ?string $previousLevel,
        public readonly ?string $previousLevelName,
        public readonly ?string $level,
        public readonly ?string $levelName,
        public readonly ?float $score,
        public readonly array $failingChecks,
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
            serviceSlug: Coerce::toString($data['serviceSlug'] ?? null),
            serviceName: Coerce::toString($data['serviceName'] ?? null),
            direction: Coerce::toString($data['direction'] ?? null),
            previousLevel: Coerce::toStringOrNull($data['previousLevel'] ?? null),
            previousLevelName: Coerce::toStringOrNull($data['previousLevelName'] ?? null),
            level: Coerce::toStringOrNull($data['level'] ?? null),
            levelName: Coerce::toStringOrNull($data['levelName'] ?? null),
            score: Coerce::toFloatOrNull($data['score'] ?? null),
            failingChecks: Coerce::mapList($data['failingChecks'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
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
            'serviceSlug' => $this->serviceSlug,
            'serviceName' => $this->serviceName,
            'direction' => $this->direction,
            'previousLevel' => $this->previousLevel,
            'previousLevelName' => $this->previousLevelName,
            'level' => $this->level,
            'levelName' => $this->levelName,
            'score' => $this->score,
            'failingChecks' => $this->failingChecks,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
