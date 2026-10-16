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

/** The period whose spend is previewed defaults to the last full calendar month. */
final class ManagedAccountAssignmentPreviewRequest implements \JsonSerializable
{
    /**
     * @param string|null $managedAccountId The customer to assign to, or null to take the items off every customer.
     * @param list<string>|null $costCentreIds
     * @param list<string>|null $accountIds
     */
    public function __construct(
        public readonly ?string $managedAccountId,
        public readonly ?array $costCentreIds = null,
        public readonly ?array $accountIds = null,
        public readonly ?string $periodFrom = null,
        public readonly ?string $periodTo = null,
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
            managedAccountId: Coerce::toStringOrNull($data['managedAccountId'] ?? null),
            costCentreIds: Coerce::nullable($data['costCentreIds'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            accountIds: Coerce::nullable($data['accountIds'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            periodFrom: Coerce::toStringOrNull($data['periodFrom'] ?? null),
            periodTo: Coerce::toStringOrNull($data['periodTo'] ?? null),
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
        ];
        if ($this->costCentreIds !== null) {
            $payload['costCentreIds'] = $this->costCentreIds;
        }
        if ($this->accountIds !== null) {
            $payload['accountIds'] = $this->accountIds;
        }
        if ($this->periodFrom !== null) {
            $payload['periodFrom'] = $this->periodFrom;
        }
        if ($this->periodTo !== null) {
            $payload['periodTo'] = $this->periodTo;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
