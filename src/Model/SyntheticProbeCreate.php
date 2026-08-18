<?php

/*
 * infrawrench/sdk v1.29.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.29.0).
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

final class SyntheticProbeCreate implements \JsonSerializable
{
    /**
     * @param string|null $method HTTP method the probe uses — GET, HEAD or OPTIONS. Unknown values become GET.
     * @param int|null $intervalSeconds Seconds between checks. Clamped server-side to 60–86400.
     * @param int|null $timeoutMs Per-check timeout in milliseconds. Clamped server-side to 1000–60000.
     * @param int|null $failureThreshold Consecutive failures before the probe flips to `down` and notifies. Clamped 1–20.
     * @param string|null $resourceId Link the probe to the resource whose output suggested the URL.
     */
    public function __construct(
        public readonly string $name,
        public readonly string $url,
        public readonly ?string $method = null,
        public readonly ?int $intervalSeconds = null,
        public readonly ?int $timeoutMs = null,
        public readonly ?int $failureThreshold = null,
        public readonly ?bool $enabled = null,
        public readonly ?string $resourceId = null,
        public readonly ?string $outputKey = null,
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
            name: Coerce::toString($data['name'] ?? null),
            url: Coerce::toString($data['url'] ?? null),
            method: Coerce::toStringOrNull($data['method'] ?? null),
            intervalSeconds: Coerce::toIntOrNull($data['intervalSeconds'] ?? null),
            timeoutMs: Coerce::toIntOrNull($data['timeoutMs'] ?? null),
            failureThreshold: Coerce::toIntOrNull($data['failureThreshold'] ?? null),
            enabled: Coerce::toBoolOrNull($data['enabled'] ?? null),
            resourceId: Coerce::toStringOrNull($data['resourceId'] ?? null),
            outputKey: Coerce::toStringOrNull($data['outputKey'] ?? null),
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
            'name' => $this->name,
            'url' => $this->url,
        ];
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
        if ($this->resourceId !== null) {
            $payload['resourceId'] = $this->resourceId;
        }
        if ($this->outputKey !== null) {
            $payload['outputKey'] = $this->outputKey;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
