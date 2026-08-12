<?php

/*
 * infrawrench/sdk v1.17.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.17.0).
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

final class DashboardPin implements \JsonSerializable
{
    public function __construct(
        public readonly string $pinId,
        public readonly string $resourceId,
        public readonly int $gridX,
        public readonly int $gridY,
        public readonly int $gridW,
        public readonly int $gridH,
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
            pinId: Coerce::toString($data['pinId'] ?? null),
            resourceId: Coerce::toString($data['resourceId'] ?? null),
            gridX: Coerce::toInt($data['gridX'] ?? null),
            gridY: Coerce::toInt($data['gridY'] ?? null),
            gridW: Coerce::toInt($data['gridW'] ?? null),
            gridH: Coerce::toInt($data['gridH'] ?? null),
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
            'pinId' => $this->pinId,
            'resourceId' => $this->resourceId,
            'gridX' => $this->gridX,
            'gridY' => $this->gridY,
            'gridW' => $this->gridW,
            'gridH' => $this->gridH,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
