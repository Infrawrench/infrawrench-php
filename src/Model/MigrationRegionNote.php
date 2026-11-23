<?php

/*
 * infrawrench/sdk v1.125.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.125.0).
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

final class MigrationRegionNote implements \JsonSerializable
{
    /**
     * @param MigrationArea::*|null $area
     * @param list<MigrationArea::*> $sourceAreas
     * @param 'user'|'nearest'|'default'|'none' $choice
     * @param bool|null $crossesArea Some sources are in another area than the target region; null if unknown.
     */
    public function __construct(
        public readonly ?string $region,
        public readonly ?string $regionLabel,
        public readonly ?string $area,
        public readonly array $sourceAreas,
        public readonly string $choice,
        public readonly ?bool $crossesArea,
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
            region: Coerce::toStringOrNull($data['region'] ?? null),
            regionLabel: Coerce::toStringOrNull($data['regionLabel'] ?? null),
            area: Coerce::toStringOrNull($data['area'] ?? null),
            sourceAreas: Coerce::mapList($data['sourceAreas'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            choice: Coerce::toString($data['choice'] ?? null),
            crossesArea: Coerce::toBoolOrNull($data['crossesArea'] ?? null),
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
            'region' => $this->region,
            'regionLabel' => $this->regionLabel,
            'area' => $this->area,
            'sourceAreas' => $this->sourceAreas,
            'choice' => $this->choice,
            'crossesArea' => $this->crossesArea,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
