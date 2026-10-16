<?php

/*
 * infrawrench/sdk v1.82.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.82.0).
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

final class SavingsFindingStatusChange implements \JsonSerializable
{
    /**
     * @param SavingsFindingStatus::* $status
     * @param 'manual'|'resolved'|null $resolution
     */
    public function __construct(
        public readonly string $key,
        public readonly string $status,
        public readonly string $statusChangedAt,
        public readonly ?SavingsFindingActor $statusChangedBy,
        public readonly ?string $statusNote,
        public readonly ?string $resolution,
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
            key: Coerce::toString($data['key'] ?? null),
            status: Coerce::toString($data['status'] ?? null),
            statusChangedAt: Coerce::toString($data['statusChangedAt'] ?? null),
            statusChangedBy: Coerce::nullable($data['statusChangedBy'] ?? null, static fn (mixed $value): SavingsFindingActor => SavingsFindingActor::fromArray(Coerce::toArray($value))),
            statusNote: Coerce::toStringOrNull($data['statusNote'] ?? null),
            resolution: Coerce::toStringOrNull($data['resolution'] ?? null),
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
            'key' => $this->key,
            'status' => $this->status,
            'statusChangedAt' => $this->statusChangedAt,
            'statusChangedBy' => $this->statusChangedBy?->toArray(),
            'statusNote' => $this->statusNote,
            'resolution' => $this->resolution,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
