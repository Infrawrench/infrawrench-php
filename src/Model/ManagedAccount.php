<?php

/*
 * infrawrench/sdk v1.34.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.34.0).
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
 * A customer a managed service provider bills. A cost centre or cloud account belongs to at most
 * one managed account — billing the same money to two customers is refused at write time with a
 * 409 naming the other customer.
 */
final class ManagedAccount implements \JsonSerializable
{
    /**
     * @param 'cash'|'amortized' $costBasis
     * @param list<string> $costCentreIds
     * @param list<string> $accountIds
     */
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly ?string $contactName,
        public readonly ?string $contactEmail,
        public readonly ?string $billingAddress,
        public readonly string $billingCurrency,
        public readonly string $costBasis,
        public readonly bool $applyBillingRules,
        public readonly ?string $notes,
        public readonly array $costCentreIds,
        public readonly array $accountIds,
        public readonly int $invoiceCount,
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
            contactName: Coerce::toStringOrNull($data['contactName'] ?? null),
            contactEmail: Coerce::toStringOrNull($data['contactEmail'] ?? null),
            billingAddress: Coerce::toStringOrNull($data['billingAddress'] ?? null),
            billingCurrency: Coerce::toString($data['billingCurrency'] ?? null),
            costBasis: Coerce::toString($data['costBasis'] ?? null),
            applyBillingRules: Coerce::toBool($data['applyBillingRules'] ?? null),
            notes: Coerce::toStringOrNull($data['notes'] ?? null),
            costCentreIds: Coerce::mapList($data['costCentreIds'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            accountIds: Coerce::mapList($data['accountIds'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            invoiceCount: Coerce::toInt($data['invoiceCount'] ?? null),
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
            'contactName' => $this->contactName,
            'contactEmail' => $this->contactEmail,
            'billingAddress' => $this->billingAddress,
            'billingCurrency' => $this->billingCurrency,
            'costBasis' => $this->costBasis,
            'applyBillingRules' => $this->applyBillingRules,
            'notes' => $this->notes,
            'costCentreIds' => $this->costCentreIds,
            'accountIds' => $this->accountIds,
            'invoiceCount' => $this->invoiceCount,
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
