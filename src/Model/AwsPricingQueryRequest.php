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

final class AwsPricingQueryRequest implements \JsonSerializable
{
    /**
     * @param string $sql One read-only statement: SELECT or WITH (also DESCRIBE, SHOW, EXPLAIN). No FORMAT or SETTINGS clause, no trailing second statement.
     * @param int|null $maxRows Rows to return at most. Default 1,000; at most 10,000.
     */
    public function __construct(
        public readonly string $sql,
        public readonly ?int $maxRows = null,
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
            sql: Coerce::toString($data['sql'] ?? null),
            maxRows: Coerce::toIntOrNull($data['maxRows'] ?? null),
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
            'sql' => $this->sql,
        ];
        if ($this->maxRows !== null) {
            $payload['maxRows'] = $this->maxRows;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
