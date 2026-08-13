<?php

/*
 * infrawrench/sdk v1.24.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.24.0).
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

final class CustomGraphCheckResult implements \JsonSerializable
{
    /**
     * @param list<array{line: int, column: int, code: int, category: string, message: string}> $diagnostics
     */
    public function __construct(
        public readonly array $diagnostics,
        public readonly bool $hasErrors,
        public readonly bool $degraded,
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
            diagnostics: Coerce::mapList($data['diagnostics'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            hasErrors: Coerce::toBool($data['hasErrors'] ?? null),
            degraded: Coerce::toBool($data['degraded'] ?? null),
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
            'diagnostics' => $this->diagnostics,
            'hasErrors' => $this->hasErrors,
            'degraded' => $this->degraded,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
