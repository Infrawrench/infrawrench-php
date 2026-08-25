<?php

/*
 * infrawrench/sdk v1.38.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.38.0).
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

final class IacResourceStatusResponse implements \JsonSerializable
{
    /** @param 'managed'|'drifted'|'unmanaged'|null $status */
    public function __construct(
        public readonly ?string $status,
        public readonly ?string $stateId,
        public readonly ?string $stateLabel,
        public readonly ?string $terraformAddress,
        public readonly int $driftFieldCount,
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
            status: Coerce::toStringOrNull($data['status'] ?? null),
            stateId: Coerce::toStringOrNull($data['stateId'] ?? null),
            stateLabel: Coerce::toStringOrNull($data['stateLabel'] ?? null),
            terraformAddress: Coerce::toStringOrNull($data['terraformAddress'] ?? null),
            driftFieldCount: Coerce::toInt($data['driftFieldCount'] ?? null),
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
            'status' => $this->status,
            'stateId' => $this->stateId,
            'stateLabel' => $this->stateLabel,
            'terraformAddress' => $this->terraformAddress,
            'driftFieldCount' => $this->driftFieldCount,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
