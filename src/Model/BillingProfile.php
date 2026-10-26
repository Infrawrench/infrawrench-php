<?php

/*
 * infrawrench/sdk v1.84.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.84.0).
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
 * Reusable invoice settings: addressee, recipients, tax, payment terms, remittance details and
 * numbering, shared by every customer assigned to it. The profile wins where it sets a field and
 * the customer fills the gaps; recipients are the union of both.
 *
 * Drafts follow a profile edit. **Approved invoices do not**: approval writes a resolved copy onto
 * the invoice (`Invoice.billing`), so a new bank account or tax rate reaches the next invoice and
 * no issued one.
 */
final class BillingProfile implements \JsonSerializable
{
    /**
     * @param list<string> $toEmails
     * @param list<string> $ccEmails
     * @param list<BillingProfileTaxRate> $taxRates
     * @param list<string> $managedAccountIds Live customers assigned to this profile.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly ?string $legalName,
        public readonly ?string $address,
        public readonly ?string $taxId,
        public readonly ?string $poNumber,
        public readonly array $toEmails,
        public readonly array $ccEmails,
        public readonly ?string $currency,
        public readonly ?int $paymentTermsDays,
        public readonly string $numberPrefix,
        public readonly bool $numberIncludesYear,
        public readonly int $numberStart,
        public readonly array $taxRates,
        public readonly ?BillingProfileBank $bank,
        public readonly ?string $footer,
        public readonly ?string $logo,
        public readonly array $managedAccountIds,
        public readonly ?string $createdByUserId,
        public readonly string $createdAt,
        public readonly string $updatedAt,
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
            name: Coerce::toString($data['name'] ?? null),
            legalName: Coerce::toStringOrNull($data['legalName'] ?? null),
            address: Coerce::toStringOrNull($data['address'] ?? null),
            taxId: Coerce::toStringOrNull($data['taxId'] ?? null),
            poNumber: Coerce::toStringOrNull($data['poNumber'] ?? null),
            toEmails: Coerce::mapList($data['toEmails'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            ccEmails: Coerce::mapList($data['ccEmails'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            currency: Coerce::toStringOrNull($data['currency'] ?? null),
            paymentTermsDays: Coerce::toIntOrNull($data['paymentTermsDays'] ?? null),
            numberPrefix: Coerce::toString($data['numberPrefix'] ?? null),
            numberIncludesYear: Coerce::toBool($data['numberIncludesYear'] ?? null),
            numberStart: Coerce::toInt($data['numberStart'] ?? null),
            taxRates: Coerce::mapList($data['taxRates'] ?? null, static fn (mixed $item): BillingProfileTaxRate => BillingProfileTaxRate::fromArray(Coerce::toArray($item))),
            bank: Coerce::nullable($data['bank'] ?? null, static fn (mixed $value): BillingProfileBank => BillingProfileBank::fromArray(Coerce::toArray($value))),
            footer: Coerce::toStringOrNull($data['footer'] ?? null),
            logo: Coerce::toStringOrNull($data['logo'] ?? null),
            managedAccountIds: Coerce::mapList($data['managedAccountIds'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            createdByUserId: Coerce::toStringOrNull($data['createdByUserId'] ?? null),
            createdAt: Coerce::toString($data['createdAt'] ?? null),
            updatedAt: Coerce::toString($data['updatedAt'] ?? null),
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
            'name' => $this->name,
            'legalName' => $this->legalName,
            'address' => $this->address,
            'taxId' => $this->taxId,
            'poNumber' => $this->poNumber,
            'toEmails' => $this->toEmails,
            'ccEmails' => $this->ccEmails,
            'currency' => $this->currency,
            'paymentTermsDays' => $this->paymentTermsDays,
            'numberPrefix' => $this->numberPrefix,
            'numberIncludesYear' => $this->numberIncludesYear,
            'numberStart' => $this->numberStart,
            'taxRates' => array_map(static fn (BillingProfileTaxRate $item): array => $item->toArray(), $this->taxRates),
            'bank' => $this->bank?->toArray(),
            'footer' => $this->footer,
            'logo' => $this->logo,
            'managedAccountIds' => $this->managedAccountIds,
            'createdByUserId' => $this->createdByUserId,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
