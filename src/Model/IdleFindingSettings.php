<?php

/*
 * infrawrench/sdk v1.82.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.82.0).
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

final class IdleFindingSettings implements \JsonSerializable
{
    /**
     * @param bool $enabled Master switch: off stops collection and hides every idle row.
     * @param int $lookbackDays Days of metrics each rule judges over, 7 to 42. Ships as 14.
     * @param array<string, IdleRuleOverride> $rules Overrides keyed by `pluginId:ruleId`. A rule absent here runs enabled with its declared defaults.
     */
    public function __construct(
        public readonly bool $enabled,
        public readonly int $lookbackDays,
        public readonly array $rules,
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
            enabled: Coerce::toBool($data['enabled'] ?? null),
            lookbackDays: Coerce::toInt($data['lookbackDays'] ?? null),
            rules: Coerce::mapValues($data['rules'] ?? null, static fn (mixed $item): IdleRuleOverride => IdleRuleOverride::fromArray(Coerce::toArray($item))),
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
            'enabled' => $this->enabled,
            'lookbackDays' => $this->lookbackDays,
            'rules' => array_map(static fn (IdleRuleOverride $item): array => $item->toArray(), $this->rules),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
