<?php

/*
 * infrawrench/sdk v1.77.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.77.0).
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

final class JitPrincipalResolution implements \JsonSerializable
{
    public function __construct(
        public readonly ?JitPrincipalOption $principal,
        public readonly bool $canPick,
        public readonly JitProviderLabels $labels,
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
            principal: Coerce::nullable($data['principal'] ?? null, static fn (mixed $value): JitPrincipalOption => JitPrincipalOption::fromArray(Coerce::toArray($value))),
            canPick: Coerce::toBool($data['canPick'] ?? null),
            labels: JitProviderLabels::fromArray(Coerce::toArray($data['labels'] ?? null)),
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
            'principal' => $this->principal?->toArray(),
            'canPick' => $this->canPick,
            'labels' => $this->labels->toArray(),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
