<?php

/*
 * infrawrench/sdk v1.81.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.81.0).
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

final class ServiceMembershipRule implements \JsonSerializable
{
    /**
     * @param 'tag'|'virtual_tag'|'name' $kind `tag`: the resource carries provider tag `key` (with `value` when set). `virtual_tag`: the org's virtual tag `key` resolves to `value` on the resource's cost rows over the last 30 days. `name`: the display name matches `value` per `nameMatch`, case-insensitively.
     * @param string|null $key `tag` / `virtual_tag`: the key. Null for `name`.
     * @param string|null $value `tag`: exact value, null for any. `virtual_tag`: required. `name`: the pattern.
     * @param 'contains'|'prefix'|'suffix'|'exact'|null $nameMatch `name` only; defaults to `contains`.
     * @param string|null $pluginId Narrow the rule to one provider.
     * @param string|null $accountId Narrow the rule to one account.
     */
    public function __construct(
        public readonly string $kind,
        public readonly ?string $key,
        public readonly ?string $value,
        public readonly ?string $nameMatch,
        public readonly ?string $pluginId,
        public readonly ?string $accountId,
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
            kind: Coerce::toString($data['kind'] ?? null),
            key: Coerce::toStringOrNull($data['key'] ?? null),
            value: Coerce::toStringOrNull($data['value'] ?? null),
            nameMatch: Coerce::toStringOrNull($data['nameMatch'] ?? null),
            pluginId: Coerce::toStringOrNull($data['pluginId'] ?? null),
            accountId: Coerce::toStringOrNull($data['accountId'] ?? null),
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
            'kind' => $this->kind,
            'key' => $this->key,
            'value' => $this->value,
            'nameMatch' => $this->nameMatch,
            'pluginId' => $this->pluginId,
            'accountId' => $this->accountId,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
