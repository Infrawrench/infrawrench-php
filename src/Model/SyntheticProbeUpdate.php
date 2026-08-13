<?php

/*
 * infrawrench/sdk v1.23.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.23.0).
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

final class SyntheticProbeUpdate implements \JsonSerializable
{
    /**
     * @param string|null $method HTTP method the probe uses — GET, HEAD or OPTIONS. Unknown values become GET.
     * @param int|null $intervalSeconds Seconds between checks. Clamped server-side to 60–86400.
     * @param int|null $timeoutMs Per-check timeout in milliseconds. Clamped server-side to 1000–60000.
     * @param int|null $failureThreshold Consecutive failures before the probe flips to `down` and notifies. Clamped 1–20.
     */
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $url = null,
        public readonly ?string $method = null,
        public readonly ?int $intervalSeconds = null,
        public readonly ?int $timeoutMs = null,
        public readonly ?int $failureThreshold = null,
        public readonly ?bool $enabled = null,
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
            name: Coerce::toStringOrNull($data['name'] ?? null),
            url: Coerce::toStringOrNull($data['url'] ?? null),
            method: Coerce::toStringOrNull($data['method'] ?? null),
            intervalSeconds: Coerce::toIntOrNull($data['intervalSeconds'] ?? null),
            timeoutMs: Coerce::toIntOrNull($data['timeoutMs'] ?? null),
            failureThreshold: Coerce::toIntOrNull($data['failureThreshold'] ?? null),
            enabled: Coerce::toBoolOrNull($data['enabled'] ?? null),
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
        if ($this->name !== null) {
            $payload['name'] = $this->name;
        }
        if ($this->url !== null) {
            $payload['url'] = $this->url;
        }
        if ($this->method !== null) {
            $payload['method'] = $this->method;
        }
        if ($this->intervalSeconds !== null) {
            $payload['intervalSeconds'] = $this->intervalSeconds;
        }
        if ($this->timeoutMs !== null) {
            $payload['timeoutMs'] = $this->timeoutMs;
        }
        if ($this->failureThreshold !== null) {
            $payload['failureThreshold'] = $this->failureThreshold;
        }
        if ($this->enabled !== null) {
            $payload['enabled'] = $this->enabled;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
