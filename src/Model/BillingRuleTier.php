<?php

/*
 * infrawrench/sdk v1.68.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.68.0).
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

final class BillingRuleTier implements \JsonSerializable
{
    /**
     * @param float|null $upTo Exclusive upper bound of monthly spend this tier covers, in the rule's `currency`. Null on the last tier, which is open-ended.
     * @param float $percent Signed: +8 marks up by 8%, -2 discounts by 2%.
     */
    public function __construct(
        public readonly ?float $upTo,
        public readonly float $percent,
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
            upTo: Coerce::toFloatOrNull($data['upTo'] ?? null),
            percent: Coerce::toFloat($data['percent'] ?? null),
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
            'upTo' => $this->upTo,
            'percent' => $this->percent,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
