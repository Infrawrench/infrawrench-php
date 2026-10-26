<?php

/*
 * infrawrench/sdk v1.84.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.84.0).
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

final class IdleFindingSettingsUpdate implements \JsonSerializable
{
    /**
     * @param array<string, IdleRuleOverride>|null $rules Replaces the whole overrides map when sent.
     */
    public function __construct(
        public readonly ?bool $enabled = null,
        public readonly ?int $lookbackDays = null,
        public readonly ?array $rules = null,
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
            enabled: Coerce::toBoolOrNull($data['enabled'] ?? null),
            lookbackDays: Coerce::toIntOrNull($data['lookbackDays'] ?? null),
            rules: Coerce::nullable($data['rules'] ?? null, static fn (mixed $value): array => Coerce::mapValues($value, static fn (mixed $item): IdleRuleOverride => IdleRuleOverride::fromArray(Coerce::toArray($item)))),
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
        ];
        if ($this->enabled !== null) {
            $payload['enabled'] = $this->enabled;
        }
        if ($this->lookbackDays !== null) {
            $payload['lookbackDays'] = $this->lookbackDays;
        }
        if ($this->rules !== null) {
            $payload['rules'] = array_map(static fn (IdleRuleOverride $item): array => $item->toArray(), $this->rules);
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
