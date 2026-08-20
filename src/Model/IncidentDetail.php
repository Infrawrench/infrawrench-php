<?php

/*
 * infrawrench/sdk v1.34.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.34.0).
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

final class IncidentDetail implements \JsonSerializable
{
    /** @param list<IncidentNote> $notes */
    public function __construct(
        public readonly Incident $incident,
        public readonly array $notes,
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
            incident: Incident::fromArray(Coerce::toArray($data['incident'] ?? null)),
            notes: Coerce::mapList($data['notes'] ?? null, static fn (mixed $item): IncidentNote => IncidentNote::fromArray(Coerce::toArray($item))),
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
            'incident' => $this->incident->toArray(),
            'notes' => array_map(static fn (IncidentNote $item): array => $item->toArray(), $this->notes),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
