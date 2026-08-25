<?php

/*
 * infrawrench/sdk v1.38.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.38.0).
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

final class InvoiceVoidRequest implements \JsonSerializable
{
    /**
     * @param string $reason Required. The only record of why a customer was sent an invoice that was then withdrawn.
     * @param bool|null $supersede Raise the corrective draft in the same call, linked both ways to the original. Doing it in one call is what keeps the pair from being left half-made by a failed second request.
     */
    public function __construct(
        public readonly string $reason,
        public readonly ?bool $supersede = null,
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
            reason: Coerce::toString($data['reason'] ?? null),
            supersede: Coerce::toBoolOrNull($data['supersede'] ?? null),
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
            'reason' => $this->reason,
        ];
        if ($this->supersede !== null) {
            $payload['supersede'] = $this->supersede;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
