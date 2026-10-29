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

final class ScorecardCreate implements \JsonSerializable
{
    /**
     * @param string $name Unique in the organization; at most 120 characters.
     * @param string|null $description At most 1000 characters.
     * @param list<ScorecardCheck>|null $checks 1 to 30 checks.
     * @param list<ScorecardLevel>|null $levels 1 to 6 levels; stored lowest first.
     * @param list<float>|null $applicableTiers Tiers it applies to; empty means every service.
     * @param bool|null $alertOnLevelDrop Route a `scorecardAlerts` alert when a service drops a level.
     */
    public function __construct(
        public readonly string $name,
        public readonly ?string $description = null,
        public readonly ?array $checks = null,
        public readonly ?array $levels = null,
        public readonly ?array $applicableTiers = null,
        public readonly ?bool $alertOnLevelDrop = null,
        public readonly ?bool $enabled = null,
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
            name: Coerce::toString($data['name'] ?? null),
            description: Coerce::toStringOrNull($data['description'] ?? null),
            checks: Coerce::nullable($data['checks'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): ScorecardCheck => ScorecardCheck::fromArray(Coerce::toArray($item)))),
            levels: Coerce::nullable($data['levels'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): ScorecardLevel => ScorecardLevel::fromArray(Coerce::toArray($item)))),
            applicableTiers: Coerce::nullable($data['applicableTiers'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): float => Coerce::toFloat($item))),
            alertOnLevelDrop: Coerce::toBoolOrNull($data['alertOnLevelDrop'] ?? null),
            enabled: Coerce::toBoolOrNull($data['enabled'] ?? null),
        );
    }

    /**
     * The wire representation, ready for `json_encode`.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $payload = [
            'name' => $this->name,
        ];
        if ($this->description !== null) {
            $payload['description'] = $this->description;
        }
        if ($this->checks !== null) {
            $payload['checks'] = array_map(static fn (ScorecardCheck $item): array => $item->toArray(), $this->checks);
        }
        if ($this->levels !== null) {
            $payload['levels'] = array_map(static fn (ScorecardLevel $item): array => $item->toArray(), $this->levels);
        }
        if ($this->applicableTiers !== null) {
            $payload['applicableTiers'] = $this->applicableTiers;
        }
        if ($this->alertOnLevelDrop !== null) {
            $payload['alertOnLevelDrop'] = $this->alertOnLevelDrop;
        }
        if ($this->enabled !== null) {
            $payload['enabled'] = $this->enabled;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
