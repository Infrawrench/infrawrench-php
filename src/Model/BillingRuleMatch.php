<?php

/*
 * infrawrench/sdk v1.15.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.15.0).
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

/**
 * All set fields must match (AND); a rule with no fields matches all spend. The same vocabulary
 * allocation rules use, plus chargeType.
 */
final class BillingRuleMatch implements \JsonSerializable
{
    /**
     * @param string|null $tagValue Only meaningful with tagKey; alone, tagKey matches rows carrying the key.
     * @param string|null $chargeType Narrow to one kind of charge. A markup that recovers overhead usually should not apply to credits, refunds or commitment purchases, and this is how that is expressed.
     */
    public function __construct(
        public readonly ?string $tagKey = null,
        public readonly ?string $tagValue = null,
        public readonly ?string $accountId = null,
        public readonly ?string $pluginId = null,
        public readonly ?string $service = null,
        public readonly ?string $chargeType = null,
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
            tagKey: Coerce::toStringOrNull($data['tagKey'] ?? null),
            tagValue: Coerce::toStringOrNull($data['tagValue'] ?? null),
            accountId: Coerce::toStringOrNull($data['accountId'] ?? null),
            pluginId: Coerce::toStringOrNull($data['pluginId'] ?? null),
            service: Coerce::toStringOrNull($data['service'] ?? null),
            chargeType: Coerce::toStringOrNull($data['chargeType'] ?? null),
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
        if ($this->tagKey !== null) {
            $payload['tagKey'] = $this->tagKey;
        }
        if ($this->tagValue !== null) {
            $payload['tagValue'] = $this->tagValue;
        }
        if ($this->accountId !== null) {
            $payload['accountId'] = $this->accountId;
        }
        if ($this->pluginId !== null) {
            $payload['pluginId'] = $this->pluginId;
        }
        if ($this->service !== null) {
            $payload['service'] = $this->service;
        }
        if ($this->chargeType !== null) {
            $payload['chargeType'] = $this->chargeType;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
