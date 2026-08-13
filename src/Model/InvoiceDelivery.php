<?php

/*
 * infrawrench/sdk v1.23.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.23.0).
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
 * The last delivery attempt, or null when none has been made — including on an invoice marked sent
 * by a deployment with no mail provider. “A person released this” and “we delivered it” are
 * different claims, and this field is only ever the second.
 *
 * The API may send `null` in place of this object.
 */
final class InvoiceDelivery implements \JsonSerializable
{
    /**
     * @param 'pending'|'succeeded'|'partial'|'failed'|'no_targets' $status `pending` means an attempt was claimed and its outcome never recorded — the process died mid-send, so whether the customer received it is unknown. It is not a failure and is never retried automatically.
     * @param list<string> $recipients The addresses this attempt was made to, as the customer record had them then.
     * @param int $delivered How many the mail provider accepted.
     * @param string|null $deliveredAt The last attempt that reached at least one address, or null when none ever has. Never cleared by a later failure — it is a fact about the past, and it is what decides whether sending again is a retry or a second copy.
     */
    public function __construct(
        public readonly string $status,
        public readonly array $recipients,
        public readonly int $delivered,
        public readonly string $attemptedAt,
        public readonly ?string $deliveredAt,
        public readonly int $attempts,
        public readonly ?string $error,
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
            status: Coerce::toString($data['status'] ?? null),
            recipients: Coerce::mapList($data['recipients'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            delivered: Coerce::toInt($data['delivered'] ?? null),
            attemptedAt: Coerce::toString($data['attemptedAt'] ?? null),
            deliveredAt: Coerce::toStringOrNull($data['deliveredAt'] ?? null),
            attempts: Coerce::toInt($data['attempts'] ?? null),
            error: Coerce::toStringOrNull($data['error'] ?? null),
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
            'status' => $this->status,
            'recipients' => $this->recipients,
            'delivered' => $this->delivered,
            'attemptedAt' => $this->attemptedAt,
            'deliveredAt' => $this->deliveredAt,
            'attempts' => $this->attempts,
            'error' => $this->error,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
