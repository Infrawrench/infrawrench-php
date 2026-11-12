<?php

/*
 * infrawrench/sdk v1.103.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.103.0).
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

final class ChatSpendStatus implements \JsonSerializable
{
    /**
     * @param float $monthToDateMicros AI spend this calendar month (chat and workflow `infra.ai`), in millionths of a US dollar.
     * @param float|null $monthlyCapMicros The cap that spend is held to; null when the organization set none and pays.
     * @param bool $exceeded True when there is a cap and spend has reached it.
     * @param bool $freeTier True when the cap is the free tier's (no paid plan) rather than one the organization set.
     * @param bool $complimentary True when the organization has complimentary access: never billed, uncapped by default.
     */
    public function __construct(
        public readonly float $monthToDateMicros,
        public readonly ?float $monthlyCapMicros,
        public readonly bool $exceeded,
        public readonly bool $freeTier,
        public readonly bool $complimentary,
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
            monthToDateMicros: Coerce::toFloat($data['monthToDateMicros'] ?? null),
            monthlyCapMicros: Coerce::toFloatOrNull($data['monthlyCapMicros'] ?? null),
            exceeded: Coerce::toBool($data['exceeded'] ?? null),
            freeTier: Coerce::toBool($data['freeTier'] ?? null),
            complimentary: Coerce::toBool($data['complimentary'] ?? null),
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
            'monthToDateMicros' => $this->monthToDateMicros,
            'monthlyCapMicros' => $this->monthlyCapMicros,
            'exceeded' => $this->exceeded,
            'freeTier' => $this->freeTier,
            'complimentary' => $this->complimentary,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
