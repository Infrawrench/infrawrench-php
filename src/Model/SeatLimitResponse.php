<?php

/*
 * infrawrench/sdk v1.17.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.17.0).
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

final class SeatLimitResponse implements \JsonSerializable
{
    /**
     * @param 'seat_limit_reached' $code
     * @param int $seatCount Total capacity: monthly subscription seats plus prepaid capacity-slot seats
     * @param int $seatsUsed Members plus pending unexpired invitations
     * @param bool $canAddSeat Whether retrying with `addSeat: true` can succeed. False when the org's capacity is entirely prepaid capacity slots: there is no monthly seat to buy, so the only remedy is another capacity slot.
     */
    public function __construct(
        public readonly string $error,
        public readonly string $code,
        public readonly int $seatCount,
        public readonly int $seatsUsed,
        public readonly bool $canAddSeat,
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
            error: Coerce::toString($data['error'] ?? null),
            code: Coerce::toString($data['code'] ?? null),
            seatCount: Coerce::toInt($data['seatCount'] ?? null),
            seatsUsed: Coerce::toInt($data['seatsUsed'] ?? null),
            canAddSeat: Coerce::toBool($data['canAddSeat'] ?? null),
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
            'error' => $this->error,
            'code' => $this->code,
            'seatCount' => $this->seatCount,
            'seatsUsed' => $this->seatsUsed,
            'canAddSeat' => $this->canAddSeat,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
