<?php

/*
 * infrawrench/sdk v1.29.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.29.0).
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
 * A new invoice is always a draft. There is no status field and no scope field: generating and
 * issuing are two acts, and the scope comes from the customer.
 */
final class InvoiceInput implements \JsonSerializable
{
    /**
     * @param string|null $supersedesInvoiceId The void invoice this one corrects. The original must already be void — a correction that leaves the original standing means the customer holds two live invoices for one period.
     */
    public function __construct(
        public readonly string $managedAccountId,
        public readonly string $periodFrom,
        public readonly string $periodTo,
        public readonly ?string $notes = null,
        public readonly ?string $supersedesInvoiceId = null,
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
            managedAccountId: Coerce::toString($data['managedAccountId'] ?? null),
            periodFrom: Coerce::toString($data['periodFrom'] ?? null),
            periodTo: Coerce::toString($data['periodTo'] ?? null),
            notes: Coerce::toStringOrNull($data['notes'] ?? null),
            supersedesInvoiceId: Coerce::toStringOrNull($data['supersedesInvoiceId'] ?? null),
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
            'managedAccountId' => $this->managedAccountId,
            'periodFrom' => $this->periodFrom,
            'periodTo' => $this->periodTo,
        ];
        if ($this->notes !== null) {
            $payload['notes'] = $this->notes;
        }
        if ($this->supersedesInvoiceId !== null) {
            $payload['supersedesInvoiceId'] = $this->supersedesInvoiceId;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
