<?php

/*
 * infrawrench/sdk v1.18.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.18.0).
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

final class LogWorkspaceQueryCreate implements \JsonSerializable
{
    /**
     * @param list<LogStreamSelector> $resources
     * @param string $search The search expression. Empty matches every line; `/pattern/` (optionally `/pattern/i`) is a regular expression; otherwise whitespace-separated terms that must ALL appear in a line (case-insensitive), with `"quoted phrases"` and `-term` negation.
     */
    public function __construct(
        public readonly string $name,
        public readonly array $resources,
        public readonly string $search,
        public readonly ?bool $alertEnabled = null,
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
            resources: Coerce::mapList($data['resources'] ?? null, static fn (mixed $item): LogStreamSelector => LogStreamSelector::fromArray(Coerce::toArray($item))),
            search: Coerce::toString($data['search'] ?? null),
            alertEnabled: Coerce::toBoolOrNull($data['alertEnabled'] ?? null),
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
            'resources' => array_map(static fn (LogStreamSelector $item): array => $item->toArray(), $this->resources),
            'search' => $this->search,
        ];
        if ($this->alertEnabled !== null) {
            $payload['alertEnabled'] = $this->alertEnabled;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
