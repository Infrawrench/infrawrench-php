<?php

/*
 * infrawrench/sdk v1.108.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.108.0).
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

final class CiPreflightRecord implements \JsonSerializable
{
    /**
     * @param list<array{permission: string, label: string}> $missing
     * @param list<string> $problems
     */
    public function __construct(
        public readonly bool $ok,
        public readonly array $missing,
        public readonly array $problems,
        public readonly string $checkedAt,
        public readonly ?string $region = null,
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
            ok: Coerce::toBool($data['ok'] ?? null),
            missing: Coerce::mapList($data['missing'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            problems: Coerce::mapList($data['problems'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            checkedAt: Coerce::toString($data['checkedAt'] ?? null),
            region: Coerce::toStringOrNull($data['region'] ?? null),
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
            'ok' => $this->ok,
            'missing' => $this->missing,
            'problems' => $this->problems,
            'checkedAt' => $this->checkedAt,
        ];
        if ($this->region !== null) {
            $payload['region'] = $this->region;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
