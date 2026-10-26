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

final class IdleRuleOverride implements \JsonSerializable
{
    /**
     * @param bool|null $enabled False switches the rule off for the organization.
     * @param array<string, float>|null $thresholds Threshold overrides by key; each must sit within the rule's declared range.
     */
    public function __construct(
        public readonly ?bool $enabled = null,
        public readonly ?array $thresholds = null,
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
            thresholds: Coerce::nullable($data['thresholds'] ?? null, static fn (mixed $value): array => Coerce::mapValues($value, static fn (mixed $item): float => Coerce::toFloat($item))),
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
        if ($this->thresholds !== null) {
            $payload['thresholds'] = $this->thresholds;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
