<?php

/*
 * infrawrench/sdk v1.1.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.1.0).
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

final class EnvironmentDiffFieldChange implements \JsonSerializable
{
    /**
     * @param string $field Field key; resolved-output keys are prefixed `outputs.`.
     * @param mixed $a Value on side A; null when the key is absent there.
     * @param mixed $b Value on side B.
     */
    public function __construct(
        public readonly string $field,
        public readonly mixed $a = null,
        public readonly mixed $b = null,
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
            field: Coerce::toString($data['field'] ?? null),
            a: $data['a'] ?? null,
            b: $data['b'] ?? null,
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
            'field' => $this->field,
        ];
        if ($this->a !== null) {
            $payload['a'] = $this->a;
        }
        if ($this->b !== null) {
            $payload['b'] = $this->b;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
