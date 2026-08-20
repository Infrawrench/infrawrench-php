<?php

/*
 * infrawrench/sdk v1.33.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.33.0).
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

final class ManagedAccountInput implements \JsonSerializable
{
    /**
     * @param string $billingCurrency ISO 4217 code the customer is invoiced in. Spend collected in another currency is converted through the organisation's own stated exchange rates, and the rate used is frozen onto every invoice — so restating a rate later cannot restate history.
     * @param 'cash'|'amortized'|null $costBasis Defaults to `amortized`. Charging a customer the whole cash value of a three-year commitment in the month it was signed is not a bill anyone can budget against.
     * @param bool|null $applyBillingRules Defaults to true. False is a pass-through contract: the customer is billed exactly what the providers charged, with no markup, discount or fixed fee applied.
     * @param list<string>|null $costCentreIds Cost centres whose spend belongs to this customer. **Subtrees are included** — naming a parent bills every descendant, and naming both a parent and its child bills the child once, not twice.

This is deliberately a list of existing cost centres rather than a rule of its own. Which spend lands in which centre is already decided by the organisation's allocation rules, and a second vocabulary over the same data would eventually disagree with the first — at which point an invoice would stop matching the showback report the customer was shown.
     * @param list<string>|null $accountIds Cloud accounts whose spend belongs to this customer. Evaluated **after** every allocation rule, so an account in scope claims only the spend no cost centre already claimed. Every cost row therefore resolves exactly once: nothing is billed twice and nothing goes missing.
     */
    public function __construct(
        public readonly string $name,
        public readonly string $billingCurrency,
        public readonly ?string $contactName = null,
        public readonly ?string $contactEmail = null,
        public readonly ?string $billingAddress = null,
        public readonly ?string $costBasis = null,
        public readonly ?bool $applyBillingRules = null,
        public readonly ?string $notes = null,
        public readonly ?array $costCentreIds = null,
        public readonly ?array $accountIds = null,
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
            name: Coerce::toString($data['name'] ?? null),
            billingCurrency: Coerce::toString($data['billingCurrency'] ?? null),
            contactName: Coerce::toStringOrNull($data['contactName'] ?? null),
            contactEmail: Coerce::toStringOrNull($data['contactEmail'] ?? null),
            billingAddress: Coerce::toStringOrNull($data['billingAddress'] ?? null),
            costBasis: Coerce::toStringOrNull($data['costBasis'] ?? null),
            applyBillingRules: Coerce::toBoolOrNull($data['applyBillingRules'] ?? null),
            notes: Coerce::toStringOrNull($data['notes'] ?? null),
            costCentreIds: Coerce::nullable($data['costCentreIds'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            accountIds: Coerce::nullable($data['accountIds'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
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
            'name' => $this->name,
            'billingCurrency' => $this->billingCurrency,
        ];
        if ($this->contactName !== null) {
            $payload['contactName'] = $this->contactName;
        }
        if ($this->contactEmail !== null) {
            $payload['contactEmail'] = $this->contactEmail;
        }
        if ($this->billingAddress !== null) {
            $payload['billingAddress'] = $this->billingAddress;
        }
        if ($this->costBasis !== null) {
            $payload['costBasis'] = $this->costBasis;
        }
        if ($this->applyBillingRules !== null) {
            $payload['applyBillingRules'] = $this->applyBillingRules;
        }
        if ($this->notes !== null) {
            $payload['notes'] = $this->notes;
        }
        if ($this->costCentreIds !== null) {
            $payload['costCentreIds'] = $this->costCentreIds;
        }
        if ($this->accountIds !== null) {
            $payload['accountIds'] = $this->accountIds;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
