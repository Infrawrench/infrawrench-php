<?php

/*
 * infrawrench/sdk v1.136.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.136.0).
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

final class MigrationEstimateInput implements \JsonSerializable
{
    /**
     * @param array{kind: 'service', serviceId: string}|array{kind: 'resources', resourceIds: list<string>} $source
     * @param string $targetPluginId The provider to price on, as a plugin id (`hetzner`, `gcp`).
     * @param string|null $targetRegion A region of the target provider, or null for the one nearest the source resources.
     * @param array<string, MigrationRowOverride>|null $overrides Per source resource id, the user's target type and size in place of the match.
     */
    public function __construct(
        public readonly string $name,
        public readonly array $source,
        public readonly string $targetPluginId,
        public readonly ?string $targetRegion = null,
        public readonly ?array $overrides = null,
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
            source: $data['source'] ?? null,
            targetPluginId: Coerce::toString($data['targetPluginId'] ?? null),
            targetRegion: Coerce::toStringOrNull($data['targetRegion'] ?? null),
            overrides: Coerce::nullable($data['overrides'] ?? null, static fn (mixed $value): array => Coerce::mapValues($value, static fn (mixed $item): MigrationRowOverride => MigrationRowOverride::fromArray(Coerce::toArray($item)))),
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
            'source' => $this->source,
            'targetPluginId' => $this->targetPluginId,
        ];
        if ($this->targetRegion !== null) {
            $payload['targetRegion'] = $this->targetRegion;
        }
        if ($this->overrides !== null) {
            $payload['overrides'] = array_map(static fn (MigrationRowOverride $item): array => $item->toArray(), $this->overrides);
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
