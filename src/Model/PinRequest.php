<?php

/*
 * infrawrench/sdk v0.14.1 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.14.1).
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

final class PinRequest implements \JsonSerializable
{
    public function __construct(
        public readonly string $dashboardId,
        public readonly string $resourceId,
        public readonly ?int $gridX = null,
        public readonly ?int $gridY = null,
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
            dashboardId: Coerce::toString($data['dashboardId'] ?? null),
            resourceId: Coerce::toString($data['resourceId'] ?? null),
            gridX: Coerce::toIntOrNull($data['gridX'] ?? null),
            gridY: Coerce::toIntOrNull($data['gridY'] ?? null),
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
            'dashboardId' => $this->dashboardId,
            'resourceId' => $this->resourceId,
        ];
        if ($this->gridX !== null) {
            $payload['gridX'] = $this->gridX;
        }
        if ($this->gridY !== null) {
            $payload['gridY'] = $this->gridY;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
