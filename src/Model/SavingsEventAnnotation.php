<?php

/*
 * infrawrench/sdk v1.75.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.75.0).
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

final class SavingsEventAnnotation implements \JsonSerializable
{
    public function __construct(
        public readonly ?string $note = null,
        public readonly ?string $costCentreId = null,
        public readonly ?int $horizonMonths = null,
        public readonly ?string $endedOn = null,
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
            note: Coerce::toStringOrNull($data['note'] ?? null),
            costCentreId: Coerce::toStringOrNull($data['costCentreId'] ?? null),
            horizonMonths: Coerce::toIntOrNull($data['horizonMonths'] ?? null),
            endedOn: Coerce::toStringOrNull($data['endedOn'] ?? null),
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
        if ($this->note !== null) {
            $payload['note'] = $this->note;
        }
        if ($this->costCentreId !== null) {
            $payload['costCentreId'] = $this->costCentreId;
        }
        if ($this->horizonMonths !== null) {
            $payload['horizonMonths'] = $this->horizonMonths;
        }
        if ($this->endedOn !== null) {
            $payload['endedOn'] = $this->endedOn;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
