<?php

/*
 * infrawrench/sdk v1.135.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.135.0).
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

final class HeartbeatPing implements \JsonSerializable
{
    /**
     * @param 'success'|'start'|'fail' $kind
     * @param string|null $body The first 1000 characters of the request body, when the job sent one.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $kind,
        public readonly string $receivedAt,
        public readonly ?int $durationMs,
        public readonly string $method,
        public readonly ?string $userAgent,
        public readonly ?string $body,
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
            id: Coerce::toString($data['id'] ?? null),
            kind: Coerce::toString($data['kind'] ?? null),
            receivedAt: Coerce::toString($data['receivedAt'] ?? null),
            durationMs: Coerce::toIntOrNull($data['durationMs'] ?? null),
            method: Coerce::toString($data['method'] ?? null),
            userAgent: Coerce::toStringOrNull($data['userAgent'] ?? null),
            body: Coerce::toStringOrNull($data['body'] ?? null),
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
            'id' => $this->id,
            'kind' => $this->kind,
            'receivedAt' => $this->receivedAt,
            'durationMs' => $this->durationMs,
            'method' => $this->method,
            'userAgent' => $this->userAgent,
            'body' => $this->body,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
