<?php

/*
 * infrawrench/sdk v1.79.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.79.0).
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

final class JitProviderLabels implements \JsonSerializable
{
    /**
     * @param bool $providerEnforcedExpiry True when the provider itself ends the access on time (a time-bound IAM Condition).
     */
    public function __construct(
        public readonly string $scopeLabel,
        public readonly string $roleLabel,
        public readonly string $principalLabel,
        public readonly bool $providerEnforcedExpiry,
        public readonly bool $principalPicker,
        public readonly ?string $description = null,
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
            scopeLabel: Coerce::toString($data['scopeLabel'] ?? null),
            roleLabel: Coerce::toString($data['roleLabel'] ?? null),
            principalLabel: Coerce::toString($data['principalLabel'] ?? null),
            providerEnforcedExpiry: Coerce::toBool($data['providerEnforcedExpiry'] ?? null),
            principalPicker: Coerce::toBool($data['principalPicker'] ?? null),
            description: Coerce::toStringOrNull($data['description'] ?? null),
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
            'scopeLabel' => $this->scopeLabel,
            'roleLabel' => $this->roleLabel,
            'principalLabel' => $this->principalLabel,
            'providerEnforcedExpiry' => $this->providerEnforcedExpiry,
            'principalPicker' => $this->principalPicker,
        ];
        if ($this->description !== null) {
            $payload['description'] = $this->description;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
