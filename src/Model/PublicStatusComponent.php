<?php

/*
 * infrawrench/sdk v1.10.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.10.0).
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

final class PublicStatusComponent implements \JsonSerializable
{
    /**
     * @param string $id Stable per page. Deliberately not the probe id.
     * @param 'operational'|'degraded'|'down'|'unknown' $state A component's public state. A paused probe reads `unknown` regardless of its last result — the page is a claim about what is being checked now.
     * @param list<StatusHistoryDay> $history Oldest first; empty when history is hidden.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly ?string $groupName,
        public readonly string $state,
        public readonly ?float $uptime24h,
        public readonly array $history,
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
            groupName: Coerce::toStringOrNull($data['groupName'] ?? null),
            state: Coerce::toString($data['state'] ?? null),
            uptime24h: Coerce::toFloatOrNull($data['uptime24h'] ?? null),
            history: Coerce::mapList($data['history'] ?? null, static fn (mixed $item): StatusHistoryDay => StatusHistoryDay::fromArray(Coerce::toArray($item))),
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
            'groupName' => $this->groupName,
            'state' => $this->state,
            'uptime24h' => $this->uptime24h,
            'history' => array_map(static fn (StatusHistoryDay $item): array => $item->toArray(), $this->history),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
