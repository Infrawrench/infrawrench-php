<?php

/*
 * infrawrench/sdk v1.66.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.66.0).
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

final class DiscoveredTagKeys implements \JsonSerializable
{
    /** @param list<DiscoveredTagKey> $keys */
    public function __construct(
        public readonly array $keys,
        public readonly TagKeySettings $settings,
        public readonly int $lookbackDays,
        public readonly bool $truncated,
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
            keys: Coerce::mapList($data['keys'] ?? null, static fn (mixed $item): DiscoveredTagKey => DiscoveredTagKey::fromArray(Coerce::toArray($item))),
            settings: TagKeySettings::fromArray(Coerce::toArray($data['settings'] ?? null)),
            lookbackDays: Coerce::toInt($data['lookbackDays'] ?? null),
            truncated: Coerce::toBool($data['truncated'] ?? null),
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
            'keys' => array_map(static fn (DiscoveredTagKey $item): array => $item->toArray(), $this->keys),
            'settings' => $this->settings->toArray(),
            'lookbackDays' => $this->lookbackDays,
            'truncated' => $this->truncated,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
