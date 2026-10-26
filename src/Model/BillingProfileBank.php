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

/** The API may send `null` in place of this object. */
final class BillingProfileBank implements \JsonSerializable
{
    /**
     * @param string|null $iban Checked against its mod-97 digits and stored grouped in fours. Masked to its last four characters in audit entries.
     * @param string|null $bic SWIFT / BIC.
     * @param string|null $accountNumber For banking systems without IBANs. Masked in audit entries.
     * @param string|null $routingNumber Sort code, ABA routing number, BSB.
     * @param string|null $instructions Free-text remittance instructions, printed under the bank details.
     */
    public function __construct(
        public readonly ?string $accountName,
        public readonly ?string $bankName,
        public readonly ?string $iban,
        public readonly ?string $bic,
        public readonly ?string $accountNumber,
        public readonly ?string $routingNumber,
        public readonly ?string $instructions,
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
            accountName: Coerce::toStringOrNull($data['accountName'] ?? null),
            bankName: Coerce::toStringOrNull($data['bankName'] ?? null),
            iban: Coerce::toStringOrNull($data['iban'] ?? null),
            bic: Coerce::toStringOrNull($data['bic'] ?? null),
            accountNumber: Coerce::toStringOrNull($data['accountNumber'] ?? null),
            routingNumber: Coerce::toStringOrNull($data['routingNumber'] ?? null),
            instructions: Coerce::toStringOrNull($data['instructions'] ?? null),
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
            'accountName' => $this->accountName,
            'bankName' => $this->bankName,
            'iban' => $this->iban,
            'bic' => $this->bic,
            'accountNumber' => $this->accountNumber,
            'routingNumber' => $this->routingNumber,
            'instructions' => $this->instructions,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
