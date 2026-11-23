<?php

/*
 * infrawrench/sdk v1.125.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.125.0).
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

final class InfraenvProblem implements \JsonSerializable
{
    /** @param int $line 1-based; 0 for the file as a whole. */
    public function __construct(
        public readonly int $line,
        public readonly string $message,
        public readonly ?string $key = null,
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
            line: Coerce::toInt($data['line'] ?? null),
            message: Coerce::toString($data['message'] ?? null),
            key: Coerce::toStringOrNull($data['key'] ?? null),
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
            'line' => $this->line,
            'message' => $this->message,
        ];
        if ($this->key !== null) {
            $payload['key'] = $this->key;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
