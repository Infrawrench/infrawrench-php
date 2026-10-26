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
final class BillingProfileBankInput implements \JsonSerializable
{
    public function __construct(
        public readonly ?string $accountName = null,
        public readonly ?string $bankName = null,
        public readonly ?string $iban = null,
        public readonly ?string $bic = null,
        public readonly ?string $accountNumber = null,
        public readonly ?string $routingNumber = null,
        public readonly ?string $instructions = null,
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
        $payload = [
        ];
        if ($this->accountName !== null) {
            $payload['accountName'] = $this->accountName;
        }
        if ($this->bankName !== null) {
            $payload['bankName'] = $this->bankName;
        }
        if ($this->iban !== null) {
            $payload['iban'] = $this->iban;
        }
        if ($this->bic !== null) {
            $payload['bic'] = $this->bic;
        }
        if ($this->accountNumber !== null) {
            $payload['accountNumber'] = $this->accountNumber;
        }
        if ($this->routingNumber !== null) {
            $payload['routingNumber'] = $this->routingNumber;
        }
        if ($this->instructions !== null) {
            $payload['instructions'] = $this->instructions;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
