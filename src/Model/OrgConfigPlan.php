<?php

/*
 * infrawrench/sdk v1.7.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.7.0).
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

final class OrgConfigPlan implements \JsonSerializable
{
    /**
     * @param 'merge'|'replace' $mode
     * @param list<OrgConfigChange> $changes
     * @param list<OrgConfigUnresolved> $unresolved
     * @param array{create: int, update: int, delete: int, unchanged: int} $counts
     */
    public function __construct(
        public readonly string $mode,
        public readonly array $changes,
        public readonly array $unresolved,
        public readonly array $counts,
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
            mode: Coerce::toString($data['mode'] ?? null),
            changes: Coerce::mapList($data['changes'] ?? null, static fn (mixed $item): OrgConfigChange => OrgConfigChange::fromArray(Coerce::toArray($item))),
            unresolved: Coerce::mapList($data['unresolved'] ?? null, static fn (mixed $item): OrgConfigUnresolved => OrgConfigUnresolved::fromArray(Coerce::toArray($item))),
            counts: Coerce::toArray($data['counts'] ?? null),
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
            'mode' => $this->mode,
            'changes' => array_map(static fn (OrgConfigChange $item): array => $item->toArray(), $this->changes),
            'unresolved' => array_map(static fn (OrgConfigUnresolved $item): array => $item->toArray(), $this->unresolved),
            'counts' => $this->counts,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
