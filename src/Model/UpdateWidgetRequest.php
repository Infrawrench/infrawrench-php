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

final class UpdateWidgetRequest implements \JsonSerializable
{
    /** @param array<string, mixed>|null $config */
    public function __construct(
        public readonly ?string $title = null,
        public readonly ?array $config = null,
        public readonly ?int $gridX = null,
        public readonly ?int $gridY = null,
        public readonly ?int $gridW = null,
        public readonly ?int $gridH = null,
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
            title: Coerce::toStringOrNull($data['title'] ?? null),
            config: Coerce::toArrayOrNull($data['config'] ?? null),
            gridX: Coerce::toIntOrNull($data['gridX'] ?? null),
            gridY: Coerce::toIntOrNull($data['gridY'] ?? null),
            gridW: Coerce::toIntOrNull($data['gridW'] ?? null),
            gridH: Coerce::toIntOrNull($data['gridH'] ?? null),
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
        if ($this->title !== null) {
            $payload['title'] = $this->title;
        }
        if ($this->config !== null) {
            $payload['config'] = $this->config;
        }
        if ($this->gridX !== null) {
            $payload['gridX'] = $this->gridX;
        }
        if ($this->gridY !== null) {
            $payload['gridY'] = $this->gridY;
        }
        if ($this->gridW !== null) {
            $payload['gridW'] = $this->gridW;
        }
        if ($this->gridH !== null) {
            $payload['gridH'] = $this->gridH;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
