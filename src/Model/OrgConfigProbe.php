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

final class OrgConfigProbe implements \JsonSerializable
{
    /**
     * @param string $key Stable slug identifying this entity across organizations. Derived from the name on export; it is what an apply matches on, so renaming an entity while keeping its key is a rename rather than a delete-and-create.
     */
    public function __construct(
        public readonly string $key,
        public readonly string $name,
        public readonly string $url,
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
            key: Coerce::toString($data['key'] ?? null),
            name: Coerce::toString($data['name'] ?? null),
            url: Coerce::toString($data['url'] ?? null),
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
            'key' => $this->key,
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

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
