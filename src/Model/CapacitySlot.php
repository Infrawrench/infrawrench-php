<?php

/*
 * infrawrench/sdk v0.39.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.39.0).
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

final class CapacitySlot implements \JsonSerializable
{
    /**
     * @param int $quantity Seats this purchase grants for the whole of its term.
     * @param 'active'|'refunded' $status A slot is only granting capacity when it is `active` AND `expiresAt` is still in the future.
     */
    public function __construct(
        public readonly string $id,
        public readonly int $quantity,
        public readonly string $status,
        public readonly string $startsAt,
        public readonly string $expiresAt,
        public readonly int $termMonths,
        public readonly ?int $amountPaidCents,
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
            quantity: Coerce::toInt($data['quantity'] ?? null),
            status: Coerce::toString($data['status'] ?? null),
            startsAt: Coerce::toString($data['startsAt'] ?? null),
            expiresAt: Coerce::toString($data['expiresAt'] ?? null),
            termMonths: Coerce::toInt($data['termMonths'] ?? null),
            amountPaidCents: Coerce::toIntOrNull($data['amountPaidCents'] ?? null),
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
            'quantity' => $this->quantity,
            'status' => $this->status,
            'startsAt' => $this->startsAt,
            'expiresAt' => $this->expiresAt,
            'termMonths' => $this->termMonths,
            'amountPaidCents' => $this->amountPaidCents,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
