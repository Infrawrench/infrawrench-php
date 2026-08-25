<?php

/*
 * infrawrench/sdk v1.36.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.36.0).
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

final class ChangeCostImpactsRequest implements \JsonSerializable
{
    /**
     * @param list<string> $changeIds Change ids from `GET /changes`. At most 50 — one feed page.
     * @param int|null $windowDays Days either side of the change. Default 7; clamped server-side.
     * @param ChangeCostBasis::*|null $costBasis
     */
    public function __construct(
        public readonly array $changeIds,
        public readonly ?int $windowDays = null,
        public readonly ?string $costBasis = null,
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
            changeIds: Coerce::mapList($data['changeIds'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            windowDays: Coerce::toIntOrNull($data['windowDays'] ?? null),
            costBasis: Coerce::toStringOrNull($data['costBasis'] ?? null),
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
            'changeIds' => $this->changeIds,
        ];
        if ($this->windowDays !== null) {
            $payload['windowDays'] = $this->windowDays;
        }
        if ($this->costBasis !== null) {
            $payload['costBasis'] = $this->costBasis;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
