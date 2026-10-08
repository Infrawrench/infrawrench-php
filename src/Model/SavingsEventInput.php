<?php

/*
 * infrawrench/sdk v1.79.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.79.0).
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

final class SavingsEventInput implements \JsonSerializable
{
    /**
     * @param string|null $resourceId Link a resource: the realized figure is then measured from its billing.
     */
    public function __construct(
        public readonly string $title,
        public readonly string $occurredOn,
        public readonly float $projectedMonthlyAmount,
        public readonly string $currency,
        public readonly ?string $note = null,
        public readonly ?string $endedOn = null,
        public readonly ?string $resourceId = null,
        public readonly ?string $accountId = null,
        public readonly ?string $costCentreId = null,
        public readonly ?int $horizonMonths = null,
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
            title: Coerce::toString($data['title'] ?? null),
            occurredOn: Coerce::toString($data['occurredOn'] ?? null),
            projectedMonthlyAmount: Coerce::toFloat($data['projectedMonthlyAmount'] ?? null),
            currency: Coerce::toString($data['currency'] ?? null),
            note: Coerce::toStringOrNull($data['note'] ?? null),
            endedOn: Coerce::toStringOrNull($data['endedOn'] ?? null),
            resourceId: Coerce::toStringOrNull($data['resourceId'] ?? null),
            accountId: Coerce::toStringOrNull($data['accountId'] ?? null),
            costCentreId: Coerce::toStringOrNull($data['costCentreId'] ?? null),
            horizonMonths: Coerce::toIntOrNull($data['horizonMonths'] ?? null),
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
            'title' => $this->title,
            'occurredOn' => $this->occurredOn,
            'projectedMonthlyAmount' => $this->projectedMonthlyAmount,
            'currency' => $this->currency,
        ];
        if ($this->note !== null) {
            $payload['note'] = $this->note;
        }
        if ($this->endedOn !== null) {
            $payload['endedOn'] = $this->endedOn;
        }
        if ($this->resourceId !== null) {
            $payload['resourceId'] = $this->resourceId;
        }
        if ($this->accountId !== null) {
            $payload['accountId'] = $this->accountId;
        }
        if ($this->costCentreId !== null) {
            $payload['costCentreId'] = $this->costCentreId;
        }
        if ($this->horizonMonths !== null) {
            $payload['horizonMonths'] = $this->horizonMonths;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
