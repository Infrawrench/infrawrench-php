<?php

/*
 * infrawrench/sdk v1.39.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.39.0).
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

final class EfficiencyAlertEvent implements \JsonSerializable
{
    /**
     * @param 'commitment_expiry'|'commitment_idle'|'unit_cost_regression' $kind Which detector produced it.
     * @param string $subject The commitment's description, or the business metric's name.
     * @param string|null $accountId The account, for commitment kinds; null otherwise.
     * @param string|null $currency ISO 4217 of `amount`, or null when it carries none.
     * @param float|null $amount The money at stake, in **units of `currency`** rather than cents — commitment amounts are provider-reported in currency units. Per kind: the monthly on-demand exposure for an expiry, the wasted amount for an idle commitment, the current window's spend for a regression.
     * @param array<string, string|float|null> $detail Per-kind display facts. Free-form; nothing branches on it.
     * @param string|null $notifiedAt When the alert reached its routed destinations, or null when nothing was routed (or the routing rule held it for quiet hours and the follow-up pass has not run yet).
     */
    public function __construct(
        public readonly string $id,
        public readonly string $kind,
        public readonly string $subject,
        public readonly ?string $accountId,
        public readonly ?string $accountName,
        public readonly ?string $currency,
        public readonly ?float $amount,
        public readonly array $detail,
        public readonly string $firedAt,
        public readonly ?string $notifiedAt,
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
            kind: Coerce::toString($data['kind'] ?? null),
            subject: Coerce::toString($data['subject'] ?? null),
            accountId: Coerce::toStringOrNull($data['accountId'] ?? null),
            accountName: Coerce::toStringOrNull($data['accountName'] ?? null),
            currency: Coerce::toStringOrNull($data['currency'] ?? null),
            amount: Coerce::toFloatOrNull($data['amount'] ?? null),
            detail: Coerce::toArray($data['detail'] ?? null),
            firedAt: Coerce::toString($data['firedAt'] ?? null),
            notifiedAt: Coerce::toStringOrNull($data['notifiedAt'] ?? null),
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
            'kind' => $this->kind,
            'subject' => $this->subject,
            'accountId' => $this->accountId,
            'accountName' => $this->accountName,
            'currency' => $this->currency,
            'amount' => $this->amount,
            'detail' => $this->detail,
            'firedAt' => $this->firedAt,
            'notifiedAt' => $this->notifiedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
