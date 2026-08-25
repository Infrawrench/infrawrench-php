<?php

/*
 * infrawrench/sdk v1.37.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.37.0).
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

/** The API may send `null` in place of this object. */
final class Subscription implements \JsonSerializable
{
    /** @param 'trialing'|'active'|'past_due'|'canceled'|'unpaid' $status */
    public function __construct(
        public readonly string $status,
        public readonly int $seatCount,
        public readonly ?string $currentPeriodEnd,
        public readonly string $stripeCustomerId,
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
            status: Coerce::toString($data['status'] ?? null),
            seatCount: Coerce::toInt($data['seatCount'] ?? null),
            currentPeriodEnd: Coerce::toStringOrNull($data['currentPeriodEnd'] ?? null),
            stripeCustomerId: Coerce::toString($data['stripeCustomerId'] ?? null),
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
            'seatCount' => $this->seatCount,
            'currentPeriodEnd' => $this->currentPeriodEnd,
            'stripeCustomerId' => $this->stripeCustomerId,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
