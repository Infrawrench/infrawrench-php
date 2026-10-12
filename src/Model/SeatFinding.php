<?php

/*
 * infrawrench/sdk v1.81.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.81.0).
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

final class SeatFinding implements \JsonSerializable
{
    /**
     * @param 'inactive'|'duplicate'|'downgrade' $kind
     * @param array{keptSeatId: string, keptProduct: string, keptAccountName: string, keptLastActiveAt: string|null}|null $duplicate For a duplicate: the seat kept (the one used most recently).
     */
    public function __construct(
        public readonly string $kind,
        public readonly string $seatId,
        public readonly ?float $monthlySaving,
        public readonly ?string $currency,
        public readonly ?array $duplicate = null,
        public readonly ?string $targetSeatType = null,
        public readonly ?string $reason = null,
        public readonly ?FindingRemediation $remediation = null,
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
            kind: Coerce::toString($data['kind'] ?? null),
            seatId: Coerce::toString($data['seatId'] ?? null),
            monthlySaving: Coerce::toFloatOrNull($data['monthlySaving'] ?? null),
            currency: Coerce::toStringOrNull($data['currency'] ?? null),
            duplicate: Coerce::toArrayOrNull($data['duplicate'] ?? null),
            targetSeatType: Coerce::toStringOrNull($data['targetSeatType'] ?? null),
            reason: Coerce::toStringOrNull($data['reason'] ?? null),
            remediation: Coerce::nullable($data['remediation'] ?? null, static fn (mixed $value): FindingRemediation => FindingRemediation::fromArray(Coerce::toArray($value))),
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
            'kind' => $this->kind,
            'seatId' => $this->seatId,
            'monthlySaving' => $this->monthlySaving,
            'currency' => $this->currency,
        ];
        if ($this->duplicate !== null) {
            $payload['duplicate'] = $this->duplicate;
        }
        if ($this->targetSeatType !== null) {
            $payload['targetSeatType'] = $this->targetSeatType;
        }
        if ($this->reason !== null) {
            $payload['reason'] = $this->reason;
        }
        if ($this->remediation !== null) {
            $payload['remediation'] = $this->remediation?->toArray();
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
