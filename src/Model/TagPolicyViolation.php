<?php

/*
 * infrawrench/sdk v0.38.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.38.0).
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

final class TagPolicyViolation implements \JsonSerializable
{
    /**
     * @param 'missing'|'value_not_allowed' $reason
     * @param list<string>|null $allowedValues
     */
    public function __construct(
        public readonly string $key,
        public readonly string $reason,
        public readonly ?string $value = null,
        public readonly ?array $allowedValues = null,
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
            reason: Coerce::toString($data['reason'] ?? null),
            value: Coerce::toStringOrNull($data['value'] ?? null),
            allowedValues: Coerce::nullable($data['allowedValues'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
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
            'reason' => $this->reason,
        ];
        if ($this->value !== null) {
            $payload['value'] = $this->value;
        }
        if ($this->allowedValues !== null) {
            $payload['allowedValues'] = $this->allowedValues;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
