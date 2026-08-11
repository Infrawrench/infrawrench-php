<?php

/*
 * infrawrench/sdk v1.12.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.12.0).
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

final class CustomGraphRenderRequest implements \JsonSerializable
{
    /**
     * @param array<string, string|float|bool>|null $controls
     * @param 'manual'|'refresh'|'interaction'|null $trigger
     */
    public function __construct(
        public readonly ?array $controls = null,
        public readonly ?string $button = null,
        public readonly ?string $trigger = null,
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
            controls: Coerce::toArrayOrNull($data['controls'] ?? null),
            button: Coerce::toStringOrNull($data['button'] ?? null),
            trigger: Coerce::toStringOrNull($data['trigger'] ?? null),
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
        if ($this->controls !== null) {
            $payload['controls'] = $this->controls;
        }
        if ($this->button !== null) {
            $payload['button'] = $this->button;
        }
        if ($this->trigger !== null) {
            $payload['trigger'] = $this->trigger;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
