<?php

/*
 * infrawrench/sdk v1.28.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.28.0).
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

final class EnvironmentInstantiateRequest implements \JsonSerializable
{
    /**
     * @param float $ttlHours Required. Capped by the org's `maxTtlHours` setting and by a 720-hour ceiling.
     * @param array<string, string>|null $parameters
     * @param array<string, string>|null $accountOverrides
     */
    public function __construct(
        public readonly string $name,
        public readonly float $ttlHours,
        public readonly ?array $parameters = null,
        public readonly ?array $accountOverrides = null,
        public readonly ?string $note = null,
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
            ttlHours: Coerce::toFloat($data['ttlHours'] ?? null),
            parameters: Coerce::nullable($data['parameters'] ?? null, static fn (mixed $value): array => Coerce::mapValues($value, static fn (mixed $item): string => Coerce::toString($item))),
            accountOverrides: Coerce::nullable($data['accountOverrides'] ?? null, static fn (mixed $value): array => Coerce::mapValues($value, static fn (mixed $item): string => Coerce::toString($item))),
            note: Coerce::toStringOrNull($data['note'] ?? null),
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
            'ttlHours' => $this->ttlHours,
        ];
        if ($this->parameters !== null) {
            $payload['parameters'] = $this->parameters;
        }
        if ($this->accountOverrides !== null) {
            $payload['accountOverrides'] = $this->accountOverrides;
        }
        if ($this->note !== null) {
            $payload['note'] = $this->note;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
