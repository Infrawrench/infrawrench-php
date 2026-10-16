<?php

/*
 * infrawrench/sdk v1.82.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.82.0).
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
 * Addressee, recipients, terms and remittance details. Null on invoices approved before billing
 * profiles existed.
 *
 * The API may send `null` in place of this object.
 */
final class InvoiceBilling implements \JsonSerializable
{
    /**
     * @param list<string> $to
     * @param list<string> $cc
     * @param list<BillingProfileTaxRate> $taxRates
     * @param string|null $logoId SHA-256 of the logo printed on the PDF, frozen with the invoice.
     */
    public function __construct(
        public readonly ?string $profileId,
        public readonly ?string $profileName,
        public readonly string $legalName,
        public readonly ?string $attention,
        public readonly ?string $address,
        public readonly ?string $taxId,
        public readonly ?string $poNumber,
        public readonly array $to,
        public readonly array $cc,
        public readonly ?int $paymentTermsDays,
        public readonly string $issueDate,
        public readonly ?string $dueDate,
        public readonly array $taxRates,
        public readonly ?BillingProfileBank $bank,
        public readonly ?string $footer,
        public readonly ?string $logoId,
        public readonly string $numberPrefix,
        public readonly bool $numberIncludesYear,
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
            profileId: Coerce::toStringOrNull($data['profileId'] ?? null),
            profileName: Coerce::toStringOrNull($data['profileName'] ?? null),
            legalName: Coerce::toString($data['legalName'] ?? null),
            attention: Coerce::toStringOrNull($data['attention'] ?? null),
            address: Coerce::toStringOrNull($data['address'] ?? null),
            taxId: Coerce::toStringOrNull($data['taxId'] ?? null),
            poNumber: Coerce::toStringOrNull($data['poNumber'] ?? null),
            to: Coerce::mapList($data['to'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            cc: Coerce::mapList($data['cc'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            paymentTermsDays: Coerce::toIntOrNull($data['paymentTermsDays'] ?? null),
            issueDate: Coerce::toString($data['issueDate'] ?? null),
            dueDate: Coerce::toStringOrNull($data['dueDate'] ?? null),
            taxRates: Coerce::mapList($data['taxRates'] ?? null, static fn (mixed $item): BillingProfileTaxRate => BillingProfileTaxRate::fromArray(Coerce::toArray($item))),
            bank: Coerce::nullable($data['bank'] ?? null, static fn (mixed $value): BillingProfileBank => BillingProfileBank::fromArray(Coerce::toArray($value))),
            footer: Coerce::toStringOrNull($data['footer'] ?? null),
            logoId: Coerce::toStringOrNull($data['logoId'] ?? null),
            numberPrefix: Coerce::toString($data['numberPrefix'] ?? null),
            numberIncludesYear: Coerce::toBool($data['numberIncludesYear'] ?? null),
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
            'profileId' => $this->profileId,
            'profileName' => $this->profileName,
            'legalName' => $this->legalName,
            'attention' => $this->attention,
            'address' => $this->address,
            'taxId' => $this->taxId,
            'poNumber' => $this->poNumber,
            'to' => $this->to,
            'cc' => $this->cc,
            'paymentTermsDays' => $this->paymentTermsDays,
            'issueDate' => $this->issueDate,
            'dueDate' => $this->dueDate,
            'taxRates' => array_map(static fn (BillingProfileTaxRate $item): array => $item->toArray(), $this->taxRates),
            'bank' => $this->bank?->toArray(),
            'footer' => $this->footer,
            'logoId' => $this->logoId,
            'numberPrefix' => $this->numberPrefix,
            'numberIncludesYear' => $this->numberIncludesYear,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
