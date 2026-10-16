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

final class BillingProfileInput implements \JsonSerializable
{
    /**
     * @param string $name What the profile is called in pickers. Not printed on the invoice.
     * @param string|null $legalName The legal entity invoices are addressed to. Null leaves each customer's name.
     * @param string|null $address Printed under the legal name. Null leaves each customer's billing address.
     * @param string|null $taxId Tax ID or VAT number.
     * @param string|null $poNumber Purchase-order reference.
     * @param list<string>|null $toEmails Addresses invoices are emailed to, **in addition to** each customer's own contact email.
     * @param list<string>|null $ccEmails Addresses that receive a copy. Each address gets its own message.
     * @param string|null $currency ISO 4217. When set, invoices for every assigned customer are issued in this currency instead of the customer's billing currency.
     * @param int|null $paymentTermsDays Net N days from the issue date. Null prints no due date; 0 is due on receipt.
     * @param string|null $numberPrefix Starts with a letter; letters, digits and hyphens. Defaults to `INV`. Profiles sharing a prefix share a sequence.
     * @param bool|null $numberIncludesYear Defaults to true: `INV-2026-0001`, with the sequence restarting each year of the period end. False gives `INV-0001` and one sequence for ever.
     * @param int|null $numberStart The lowest sequence number issued, for continuing a sequence from another system.
     * @param list<BillingProfileTaxRate>|null $taxRates
     * @param string|null $footer Printed at the bottom of every page of the PDF.
     * @param string|null $logo A PNG or JPEG `data:` URL of at most 100 KB, printed at the top of the PDF. Interlaced and 16-bit PNGs and CMYK JPEGs are refused. Absent on update leaves the saved logo; null removes it.
     */
    public function __construct(
        public readonly string $name,
        public readonly ?string $legalName = null,
        public readonly ?string $address = null,
        public readonly ?string $taxId = null,
        public readonly ?string $poNumber = null,
        public readonly ?array $toEmails = null,
        public readonly ?array $ccEmails = null,
        public readonly ?string $currency = null,
        public readonly ?int $paymentTermsDays = null,
        public readonly ?string $numberPrefix = null,
        public readonly ?bool $numberIncludesYear = null,
        public readonly ?int $numberStart = null,
        public readonly ?array $taxRates = null,
        public readonly ?BillingProfileBankInput $bank = null,
        public readonly ?string $footer = null,
        public readonly ?string $logo = null,
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
            legalName: Coerce::toStringOrNull($data['legalName'] ?? null),
            address: Coerce::toStringOrNull($data['address'] ?? null),
            taxId: Coerce::toStringOrNull($data['taxId'] ?? null),
            poNumber: Coerce::toStringOrNull($data['poNumber'] ?? null),
            toEmails: Coerce::nullable($data['toEmails'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            ccEmails: Coerce::nullable($data['ccEmails'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            currency: Coerce::toStringOrNull($data['currency'] ?? null),
            paymentTermsDays: Coerce::toIntOrNull($data['paymentTermsDays'] ?? null),
            numberPrefix: Coerce::toStringOrNull($data['numberPrefix'] ?? null),
            numberIncludesYear: Coerce::toBoolOrNull($data['numberIncludesYear'] ?? null),
            numberStart: Coerce::toIntOrNull($data['numberStart'] ?? null),
            taxRates: Coerce::nullable($data['taxRates'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): BillingProfileTaxRate => BillingProfileTaxRate::fromArray(Coerce::toArray($item)))),
            bank: Coerce::nullable($data['bank'] ?? null, static fn (mixed $value): BillingProfileBankInput => BillingProfileBankInput::fromArray(Coerce::toArray($value))),
            footer: Coerce::toStringOrNull($data['footer'] ?? null),
            logo: Coerce::toStringOrNull($data['logo'] ?? null),
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
        ];
        if ($this->legalName !== null) {
            $payload['legalName'] = $this->legalName;
        }
        if ($this->address !== null) {
            $payload['address'] = $this->address;
        }
        if ($this->taxId !== null) {
            $payload['taxId'] = $this->taxId;
        }
        if ($this->poNumber !== null) {
            $payload['poNumber'] = $this->poNumber;
        }
        if ($this->toEmails !== null) {
            $payload['toEmails'] = $this->toEmails;
        }
        if ($this->ccEmails !== null) {
            $payload['ccEmails'] = $this->ccEmails;
        }
        if ($this->currency !== null) {
            $payload['currency'] = $this->currency;
        }
        if ($this->paymentTermsDays !== null) {
            $payload['paymentTermsDays'] = $this->paymentTermsDays;
        }
        if ($this->numberPrefix !== null) {
            $payload['numberPrefix'] = $this->numberPrefix;
        }
        if ($this->numberIncludesYear !== null) {
            $payload['numberIncludesYear'] = $this->numberIncludesYear;
        }
        if ($this->numberStart !== null) {
            $payload['numberStart'] = $this->numberStart;
        }
        if ($this->taxRates !== null) {
            $payload['taxRates'] = array_map(static fn (BillingProfileTaxRate $item): array => $item->toArray(), $this->taxRates);
        }
        if ($this->bank !== null) {
            $payload['bank'] = $this->bank?->toArray();
        }
        if ($this->footer !== null) {
            $payload['footer'] = $this->footer;
        }
        if ($this->logo !== null) {
            $payload['logo'] = $this->logo;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
