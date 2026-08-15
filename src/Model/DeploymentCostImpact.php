<?php

/*
 * infrawrench/sdk v1.26.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.26.0).
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

final class DeploymentCostImpact implements \JsonSerializable
{
    /**
     * @param ChangeCostBasis::* $costBasis
     * @param string $eventDay The run's start day, UTC — what both windows hang off.
     * @param list<DeploymentCostImpactResource> $resources One row per resource the run provisioned through `infra.accounts.*.create(...)`. That is the only set attributable to a run with certainty: a deploy that merely re-shipped an image links to nothing and honestly reports an empty breakdown.
     * @param list<array{currency: string, deltaPerDay: float}> $total Summed `deltaPerDay` per currency across the **measured** rows only, so the breakdown always adds up to it. An unmeasurable resource contributes nothing rather than zero.
     * @param int $unknownResources Rows excluded from `total` because their impact could not be measured.
     * @param ChangeCostImpactConfidence::* $confidence
     */
    public function __construct(
        public readonly string $runId,
        public readonly string $costBasis,
        public readonly int $windowDays,
        public readonly string $eventDay,
        public readonly array $resources,
        public readonly array $total,
        public readonly int $unknownResources,
        public readonly string $confidence,
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
            runId: Coerce::toString($data['runId'] ?? null),
            costBasis: Coerce::toString($data['costBasis'] ?? null),
            windowDays: Coerce::toInt($data['windowDays'] ?? null),
            eventDay: Coerce::toString($data['eventDay'] ?? null),
            resources: Coerce::mapList($data['resources'] ?? null, static fn (mixed $item): DeploymentCostImpactResource => DeploymentCostImpactResource::fromArray(Coerce::toArray($item))),
            total: Coerce::mapList($data['total'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            unknownResources: Coerce::toInt($data['unknownResources'] ?? null),
            confidence: Coerce::toString($data['confidence'] ?? null),
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
            'runId' => $this->runId,
            'costBasis' => $this->costBasis,
            'windowDays' => $this->windowDays,
            'eventDay' => $this->eventDay,
            'resources' => array_map(static fn (DeploymentCostImpactResource $item): array => $item->toArray(), $this->resources),
            'total' => $this->total,
            'unknownResources' => $this->unknownResources,
            'confidence' => $this->confidence,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
