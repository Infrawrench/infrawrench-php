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

final class Scorecard implements \JsonSerializable
{
    /**
     * @param string $name Unique in the organization; at most 120 characters.
     * @param string|null $description At most 1000 characters.
     * @param list<ScorecardCheck> $checks 1 to 30 checks.
     * @param list<ScorecardLevel> $levels 1 to 6 levels; stored lowest first.
     * @param list<float> $applicableTiers Tiers it applies to; empty means every service.
     * @param bool $alertOnLevelDrop Route a `scorecardAlerts` alert when a service drops a level.
     * @param bool $isDefault The scorecard seeded for the organization.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly ?string $description,
        public readonly array $checks,
        public readonly array $levels,
        public readonly array $applicableTiers,
        public readonly bool $alertOnLevelDrop,
        public readonly bool $enabled,
        public readonly bool $isDefault,
        public readonly ?string $lastEvaluatedAt,
        public readonly string $createdAt,
        public readonly string $updatedAt,
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
            name: Coerce::toString($data['name'] ?? null),
            description: Coerce::toStringOrNull($data['description'] ?? null),
            checks: Coerce::mapList($data['checks'] ?? null, static fn (mixed $item): ScorecardCheck => ScorecardCheck::fromArray(Coerce::toArray($item))),
            levels: Coerce::mapList($data['levels'] ?? null, static fn (mixed $item): ScorecardLevel => ScorecardLevel::fromArray(Coerce::toArray($item))),
            applicableTiers: Coerce::mapList($data['applicableTiers'] ?? null, static fn (mixed $item): float => Coerce::toFloat($item)),
            alertOnLevelDrop: Coerce::toBool($data['alertOnLevelDrop'] ?? null),
            enabled: Coerce::toBool($data['enabled'] ?? null),
            isDefault: Coerce::toBool($data['isDefault'] ?? null),
            lastEvaluatedAt: Coerce::toStringOrNull($data['lastEvaluatedAt'] ?? null),
            createdAt: Coerce::toString($data['createdAt'] ?? null),
            updatedAt: Coerce::toString($data['updatedAt'] ?? null),
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
            'name' => $this->name,
            'description' => $this->description,
            'checks' => array_map(static fn (ScorecardCheck $item): array => $item->toArray(), $this->checks),
            'levels' => array_map(static fn (ScorecardLevel $item): array => $item->toArray(), $this->levels),
            'applicableTiers' => $this->applicableTiers,
            'alertOnLevelDrop' => $this->alertOnLevelDrop,
            'enabled' => $this->enabled,
            'isDefault' => $this->isDefault,
            'lastEvaluatedAt' => $this->lastEvaluatedAt,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
