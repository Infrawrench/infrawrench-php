<?php

/*
 * infrawrench/sdk v0.3.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.3.0).
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

final class LogsResponse implements \JsonSerializable
{
    /** @param list<string> $lines */
    public function __construct(
        public readonly array $lines,
        public readonly ?string $nextPageToken = null,
        public readonly ?bool $truncated = null,
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
            lines: Coerce::mapList($data['lines'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            nextPageToken: Coerce::toStringOrNull($data['nextPageToken'] ?? null),
            truncated: Coerce::toBoolOrNull($data['truncated'] ?? null),
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
            'lines' => $this->lines,
        ];
        if ($this->nextPageToken !== null) {
            $payload['nextPageToken'] = $this->nextPageToken;
        }
        if ($this->truncated !== null) {
            $payload['truncated'] = $this->truncated;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
