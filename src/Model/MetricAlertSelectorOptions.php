<?php

/*
 * infrawrench/sdk v1.2.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.2.0).
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

final class MetricAlertSelectorOptions implements \JsonSerializable
{
    /**
     * @param list<array{pluginId: string, resourceTypeIds: list<string>}> $plugins
     * @param list<string> $tagKeys
     */
    public function __construct(
        public readonly array $plugins,
        public readonly array $tagKeys,
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
            plugins: Coerce::mapList($data['plugins'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            tagKeys: Coerce::mapList($data['tagKeys'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
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
            'plugins' => $this->plugins,
            'tagKeys' => $this->tagKeys,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
