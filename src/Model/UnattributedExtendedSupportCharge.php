<?php

/*
 * infrawrench/sdk v1.78.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.78.0).
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

final class UnattributedExtendedSupportCharge implements \JsonSerializable
{
    /**
     * @param string $lineItem Provider line item, e.g. an AWS usage type.
     * @param float $amount Billed over the window.
     */
    public function __construct(
        public readonly string $lineItem,
        public readonly float $amount,
        public readonly string $currency,
        public readonly string $accountId,
        public readonly string $accountName,
        public readonly float $monthlyAmount,
        public readonly ?string $resourceTypeId = null,
        public readonly ?string $releaseId = null,
        public readonly ?string $region = null,
        public readonly ?string $engine = null,
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
            lineItem: Coerce::toString($data['lineItem'] ?? null),
            amount: Coerce::toFloat($data['amount'] ?? null),
            currency: Coerce::toString($data['currency'] ?? null),
            accountId: Coerce::toString($data['accountId'] ?? null),
            accountName: Coerce::toString($data['accountName'] ?? null),
            monthlyAmount: Coerce::toFloat($data['monthlyAmount'] ?? null),
            resourceTypeId: Coerce::toStringOrNull($data['resourceTypeId'] ?? null),
            releaseId: Coerce::toStringOrNull($data['releaseId'] ?? null),
            region: Coerce::toStringOrNull($data['region'] ?? null),
            engine: Coerce::toStringOrNull($data['engine'] ?? null),
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
            'lineItem' => $this->lineItem,
            'amount' => $this->amount,
            'currency' => $this->currency,
            'accountId' => $this->accountId,
            'accountName' => $this->accountName,
            'monthlyAmount' => $this->monthlyAmount,
        ];
        if ($this->resourceTypeId !== null) {
            $payload['resourceTypeId'] = $this->resourceTypeId;
        }
        if ($this->releaseId !== null) {
            $payload['releaseId'] = $this->releaseId;
        }
        if ($this->region !== null) {
            $payload['region'] = $this->region;
        }
        if ($this->engine !== null) {
            $payload['engine'] = $this->engine;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
