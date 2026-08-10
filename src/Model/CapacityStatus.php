<?php

/*
 * infrawrench/sdk v1.6.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.6.0).
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

final class CapacityStatus implements \JsonSerializable
{
    /**
     * @param bool $purchasable False when this deployment has no one-time capacity price configured; the purchase route returns 503 and clients should hide the offer.
     * @param int $priceUsd List price of one slot in whole dollars, for display copy.
     * @param int $seats Seats from slots still inside their term, excluding lapsed and refunded. ADDITIONAL to `subscription.seatCount` — an org's capacity is the two summed, and an org can hold slots with no subscription at all.
     * @param list<CapacitySlot> $slots Every purchase ever made, newest first, including lapsed and refunded.
     */
    public function __construct(
        public readonly bool $purchasable,
        public readonly int $termMonths,
        public readonly int $priceUsd,
        public readonly int $seats,
        public readonly array $slots,
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
            purchasable: Coerce::toBool($data['purchasable'] ?? null),
            termMonths: Coerce::toInt($data['termMonths'] ?? null),
            priceUsd: Coerce::toInt($data['priceUsd'] ?? null),
            seats: Coerce::toInt($data['seats'] ?? null),
            slots: Coerce::mapList($data['slots'] ?? null, static fn (mixed $item): CapacitySlot => CapacitySlot::fromArray(Coerce::toArray($item))),
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
            'purchasable' => $this->purchasable,
            'termMonths' => $this->termMonths,
            'priceUsd' => $this->priceUsd,
            'seats' => $this->seats,
            'slots' => array_map(static fn (CapacitySlot $item): array => $item->toArray(), $this->slots),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
