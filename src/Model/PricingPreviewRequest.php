<?php

/*
 * infrawrench/sdk v1.74.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.74.0).
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

final class PricingPreviewRequest implements \JsonSerializable
{
    /**
     * @param string|null $ruleId With `rule`, the saved rule it replaces (an edit being previewed). Alone, previews the saved rule as it stands. Either way `before` is priced without this rule.
     * @param string|null $managedAccountId Price this customer's scope with their settings. Absent prices the organisation's whole spend as one customer. Naming a customer also needs `invoices:read`.
     * @param string|null $month `YYYY-MM`; defaults to last calendar month.
     */
    public function __construct(
        public readonly ?BillingRuleInput $rule = null,
        public readonly ?string $ruleId = null,
        public readonly ?string $managedAccountId = null,
        public readonly ?ManagedAccountPricing $pricing = null,
        public readonly ?string $month = null,
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
            rule: Coerce::nullable($data['rule'] ?? null, static fn (mixed $value): BillingRuleInput => BillingRuleInput::fromArray(Coerce::toArray($value))),
            ruleId: Coerce::toStringOrNull($data['ruleId'] ?? null),
            managedAccountId: Coerce::toStringOrNull($data['managedAccountId'] ?? null),
            pricing: Coerce::nullable($data['pricing'] ?? null, static fn (mixed $value): ManagedAccountPricing => ManagedAccountPricing::fromArray(Coerce::toArray($value))),
            month: Coerce::toStringOrNull($data['month'] ?? null),
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
        ];
        if ($this->rule !== null) {
            $payload['rule'] = $this->rule?->toArray();
        }
        if ($this->ruleId !== null) {
            $payload['ruleId'] = $this->ruleId;
        }
        if ($this->managedAccountId !== null) {
            $payload['managedAccountId'] = $this->managedAccountId;
        }
        if ($this->pricing !== null) {
            $payload['pricing'] = $this->pricing?->toArray();
        }
        if ($this->month !== null) {
            $payload['month'] = $this->month;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
