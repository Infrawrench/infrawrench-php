<?php

/*
 * infrawrench/sdk v1.55.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.55.0).
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

final class BillingRuleAdjustment implements \JsonSerializable
{
    /**
     * @param 'percentage'|'fixed'|'reallocation'|'tiered'|'expression' $kind `percentage` multiplies matched spend (every matching percentage rule applies, so two 10% markups compound to 21%). `fixed` adds a flat amount per period, pro-rated across the queried range, and is never multiplied by anything. `reallocation` moves matched spend onto another cost centre or account; the first matching reallocation rule wins, so a row moves exactly once and the organisation's total is unchanged.

`tiered` and `expression` apply **only when a managed account's invoice is priced**: `tiered` marks a customer's matched monthly spend up or down by rate tiers on its volume, and `expression` computes each matched line's new cost with a sandboxed pricing expression. Neither ever changes the organisation's own graphs, budgets or showback.
     * @param float|null $percent `percentage` only. Signed: +15 marks up by 15%, -10 discounts by 10%. Bounded below at -100 because a discount larger than the cost would turn spend into income.
     * @param float|null $amount `fixed` only, in the major unit of `currency`, per `period`.
     * @param 'daily'|'monthly'|null $period `fixed` only. A monthly amount is pro-rated across partial months: a range covering ten days of a 31-day month contributes 10/31 of it.
     * @param 'cost_centre'|'account'|null $targetKind Required on `reallocation`, optional on `fixed` (where the flat charge is booked), never set on `percentage`.
     * @param list<BillingRuleTier>|null $tiers `tiered` only. Ascending, with strictly increasing `upTo`; only the last tier is open-ended. Thresholds are in `currency`, which a tiered rule requires.
     * @param 'marginal'|'volume'|null $tierMode `tiered` only. `marginal` charges each slice of the month's spend at its own tier's rate; `volume` charges the whole month at the rate of the tier the total falls in.
     * @param 'overall'|'per_service'|null $tierScope `tiered` only. Whether volume is the customer's matched spend overall or per service.
     * @param string|null $expression `expression` only. A pricing expression giving the line's new cost, e.g. `if service == "AmazonEC2" and tag.env == "prod" then cost * 1.1`. Parsed and type-checked on save; a syntax or type error is a 400 naming the character it was found at. It is evaluated by a small interpreter over a closed set of fields and functions, never handed to a database or a script engine.
     */
    public function __construct(
        public readonly string $kind,
        public readonly ?float $percent = null,
        public readonly ?float $amount = null,
        public readonly ?string $currency = null,
        public readonly ?string $period = null,
        public readonly ?string $targetKind = null,
        public readonly ?string $targetId = null,
        public readonly ?array $tiers = null,
        public readonly ?string $tierMode = null,
        public readonly ?string $tierScope = null,
        public readonly ?string $expression = null,
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
            kind: Coerce::toString($data['kind'] ?? null),
            percent: Coerce::toFloatOrNull($data['percent'] ?? null),
            amount: Coerce::toFloatOrNull($data['amount'] ?? null),
            currency: Coerce::toStringOrNull($data['currency'] ?? null),
            period: Coerce::toStringOrNull($data['period'] ?? null),
            targetKind: Coerce::toStringOrNull($data['targetKind'] ?? null),
            targetId: Coerce::toStringOrNull($data['targetId'] ?? null),
            tiers: Coerce::nullable($data['tiers'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): BillingRuleTier => BillingRuleTier::fromArray(Coerce::toArray($item)))),
            tierMode: Coerce::toStringOrNull($data['tierMode'] ?? null),
            tierScope: Coerce::toStringOrNull($data['tierScope'] ?? null),
            expression: Coerce::toStringOrNull($data['expression'] ?? null),
        );
    }

    /**
     * The wire representation, ready for `json_encode`.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $payload = [
            'kind' => $this->kind,
        ];
        if ($this->percent !== null) {
            $payload['percent'] = $this->percent;
        }
        if ($this->amount !== null) {
            $payload['amount'] = $this->amount;
        }
        if ($this->currency !== null) {
            $payload['currency'] = $this->currency;
        }
        if ($this->period !== null) {
            $payload['period'] = $this->period;
        }
        if ($this->targetKind !== null) {
            $payload['targetKind'] = $this->targetKind;
        }
        if ($this->targetId !== null) {
            $payload['targetId'] = $this->targetId;
        }
        if ($this->tiers !== null) {
            $payload['tiers'] = $this->tiers === null ? null : array_map(static fn (BillingRuleTier $item): array => $item->toArray(), $this->tiers);
        }
        if ($this->tierMode !== null) {
            $payload['tierMode'] = $this->tierMode;
        }
        if ($this->tierScope !== null) {
            $payload['tierScope'] = $this->tierScope;
        }
        if ($this->expression !== null) {
            $payload['expression'] = $this->expression;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
