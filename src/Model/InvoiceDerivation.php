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

/**
 * Everything needed to re-derive the invoice by hand. Not decoration: an invoice a customer cannot
 * reconcile is an invoice a customer does not pay.
 */
final class InvoiceDerivation implements \JsonSerializable
{
    /**
     * @param 'cash'|'amortized'|'blended' $costBasis
     * @param string $rateDate The day the exchange rates were read — always the period's last day. One rate for the period rather than a per-day blend: “January, at the 31 January rate” is a sentence a finance team can reproduce.
     * @param list<array{currency: string, rate: float, effectiveFrom: string}> $rates
     * @param list<string> $unconverted Currencies the organisation had stated no usable rate for. A non-empty list blocks approval: an invoice that cannot be expressed as one number in the customer's currency must not be frozen.
     * @param list<array{id: string, name: string, kind: 'percentage'|'fixed'|'reallocation'|'tiered'|'expression', summary: string}> $rules
     * @param array{costCentres: list<array{id: string, name: string}>, accounts: list<array{id: string, label: string}>} $scope
     * @param list<string> $missingScope Scope entries that no longer exist. Recorded rather than silently skipped — an invoice that is quietly short is worse than one that says why.
     * @param list<PricingEffect>|null $effects Every rule or setting that moved money, in pipeline order, with its total per currency: the per-invoice answer to which rule changed what.
     * @param list<string>|null $warnings
     * @param list<PricingExpressionFailure>|null $expressionFailures
     */
    public function __construct(
        public readonly string $costBasis,
        public readonly bool $applyBillingRules,
        public readonly string $rateDate,
        public readonly array $rates,
        public readonly array $unconverted,
        public readonly array $rules,
        public readonly array $scope,
        public readonly array $missingScope,
        public readonly ?ManagedAccountPricing $pricing = null,
        public readonly ?array $effects = null,
        public readonly ?RerateCoverage $rerateCoverage = null,
        public readonly ?array $warnings = null,
        public readonly ?array $expressionFailures = null,
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
            costBasis: Coerce::toString($data['costBasis'] ?? null),
            applyBillingRules: Coerce::toBool($data['applyBillingRules'] ?? null),
            rateDate: Coerce::toString($data['rateDate'] ?? null),
            rates: Coerce::mapList($data['rates'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            unconverted: Coerce::mapList($data['unconverted'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            rules: Coerce::mapList($data['rules'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            scope: Coerce::toArray($data['scope'] ?? null),
            missingScope: Coerce::mapList($data['missingScope'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            pricing: Coerce::nullable($data['pricing'] ?? null, static fn (mixed $value): ManagedAccountPricing => ManagedAccountPricing::fromArray(Coerce::toArray($value))),
            effects: Coerce::nullable($data['effects'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): PricingEffect => PricingEffect::fromArray(Coerce::toArray($item)))),
            rerateCoverage: Coerce::nullable($data['rerateCoverage'] ?? null, static fn (mixed $value): RerateCoverage => RerateCoverage::fromArray(Coerce::toArray($value))),
            warnings: Coerce::nullable($data['warnings'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            expressionFailures: Coerce::nullable($data['expressionFailures'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): PricingExpressionFailure => PricingExpressionFailure::fromArray(Coerce::toArray($item)))),
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
            'costBasis' => $this->costBasis,
            'applyBillingRules' => $this->applyBillingRules,
            'rateDate' => $this->rateDate,
            'rates' => $this->rates,
            'unconverted' => $this->unconverted,
            'rules' => $this->rules,
            'scope' => $this->scope,
            'missingScope' => $this->missingScope,
        ];
        if ($this->pricing !== null) {
            $payload['pricing'] = $this->pricing?->toArray();
        }
        if ($this->effects !== null) {
            $payload['effects'] = array_map(static fn (PricingEffect $item): array => $item->toArray(), $this->effects);
        }
        if ($this->rerateCoverage !== null) {
            $payload['rerateCoverage'] = $this->rerateCoverage?->toArray();
        }
        if ($this->warnings !== null) {
            $payload['warnings'] = $this->warnings;
        }
        if ($this->expressionFailures !== null) {
            $payload['expressionFailures'] = array_map(static fn (PricingExpressionFailure $item): array => $item->toArray(), $this->expressionFailures);
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
