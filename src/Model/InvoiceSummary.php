<?php

/*
 * infrawrench/sdk v1.24.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.24.0).
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

final class InvoiceSummary implements \JsonSerializable
{
    /**
     * @param string|null $number `INV-2026-0001`. Null while draft — numbers are assigned at approval so a deleted draft cannot leave a gap in the sequence.
     * @param InvoiceStatus::* $status
     */
    public function __construct(
        public readonly string $id,
        public readonly string $managedAccountId,
        public readonly string $managedAccountName,
        public readonly ?string $number,
        public readonly string $status,
        public readonly string $periodFrom,
        public readonly string $periodTo,
        public readonly string $currency,
        public readonly ?InvoiceTotals $totals,
        public readonly ?string $issuedAt,
        public readonly ?string $sentAt,
        public readonly ?InvoiceDelivery $delivery,
        public readonly ?string $voidedAt,
        public readonly ?string $voidReason,
        public readonly ?string $supersedesInvoiceId,
        public readonly ?string $supersededByInvoiceId,
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
            managedAccountId: Coerce::toString($data['managedAccountId'] ?? null),
            managedAccountName: Coerce::toString($data['managedAccountName'] ?? null),
            number: Coerce::toStringOrNull($data['number'] ?? null),
            status: Coerce::toString($data['status'] ?? null),
            periodFrom: Coerce::toString($data['periodFrom'] ?? null),
            periodTo: Coerce::toString($data['periodTo'] ?? null),
            currency: Coerce::toString($data['currency'] ?? null),
            totals: Coerce::nullable($data['totals'] ?? null, static fn (mixed $value): InvoiceTotals => InvoiceTotals::fromArray(Coerce::toArray($value))),
            issuedAt: Coerce::toStringOrNull($data['issuedAt'] ?? null),
            sentAt: Coerce::toStringOrNull($data['sentAt'] ?? null),
            delivery: Coerce::nullable($data['delivery'] ?? null, static fn (mixed $value): InvoiceDelivery => InvoiceDelivery::fromArray(Coerce::toArray($value))),
            voidedAt: Coerce::toStringOrNull($data['voidedAt'] ?? null),
            voidReason: Coerce::toStringOrNull($data['voidReason'] ?? null),
            supersedesInvoiceId: Coerce::toStringOrNull($data['supersedesInvoiceId'] ?? null),
            supersededByInvoiceId: Coerce::toStringOrNull($data['supersededByInvoiceId'] ?? null),
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
            'managedAccountId' => $this->managedAccountId,
            'managedAccountName' => $this->managedAccountName,
            'number' => $this->number,
            'status' => $this->status,
            'periodFrom' => $this->periodFrom,
            'periodTo' => $this->periodTo,
            'currency' => $this->currency,
            'totals' => $this->totals?->toArray(),
            'issuedAt' => $this->issuedAt,
            'sentAt' => $this->sentAt,
            'delivery' => $this->delivery?->toArray(),
            'voidedAt' => $this->voidedAt,
            'voidReason' => $this->voidReason,
            'supersedesInvoiceId' => $this->supersedesInvoiceId,
            'supersededByInvoiceId' => $this->supersededByInvoiceId,
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
