<?php

/*
 * infrawrench/sdk v1.4.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.4.0).
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

final class LogWorkspaceQueryUpdate implements \JsonSerializable
{
    /**
     * @param list<LogStreamSelector>|null $resources
     * @param string|null $search The search expression. Empty matches every line; `/pattern/` (optionally `/pattern/i`) is a regular expression; otherwise whitespace-separated terms that must ALL appear in a line (case-insensitive), with `"quoted phrases"` and `-term` negation.
     */
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?array $resources = null,
        public readonly ?string $search = null,
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
            name: Coerce::toStringOrNull($data['name'] ?? null),
            resources: Coerce::nullable($data['resources'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): LogStreamSelector => LogStreamSelector::fromArray(Coerce::toArray($item)))),
            search: Coerce::toStringOrNull($data['search'] ?? null),
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
        ];
        if ($this->name !== null) {
            $payload['name'] = $this->name;
        }
        if ($this->resources !== null) {
            $payload['resources'] = array_map(static fn (LogStreamSelector $item): array => $item->toArray(), $this->resources);
        }
        if ($this->search !== null) {
            $payload['search'] = $this->search;
        }
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
