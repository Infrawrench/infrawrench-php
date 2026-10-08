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

final class AiRequestSourceInput implements \JsonSerializable
{
    /**
     * @param 'plugin'|'litellm' $kind
     * @param array<string, string> $location What the location picker returned, plus `prefix` where the kind accepts one.
     * @param string|null $accountId Required for `plugin` sources.
     * @param string|null $baseUrl LiteLLM only: the proxy's https URL.
     * @param string|null $apiKey LiteLLM only. Write-only; omit on update to keep the stored key.
     */
    public function __construct(
        public readonly string $name,
        public readonly string $kind,
        public readonly string $sourceKindId,
        public readonly array $location,
        public readonly bool $enabled,
        public readonly int $lookbackDays,
        public readonly ?string $accountId = null,
        public readonly ?string $baseUrl = null,
        public readonly ?string $apiKey = null,
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
            kind: Coerce::toString($data['kind'] ?? null),
            sourceKindId: Coerce::toString($data['sourceKindId'] ?? null),
            location: Coerce::mapValues($data['location'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            enabled: Coerce::toBool($data['enabled'] ?? null),
            lookbackDays: Coerce::toInt($data['lookbackDays'] ?? null),
            accountId: Coerce::toStringOrNull($data['accountId'] ?? null),
            baseUrl: Coerce::toStringOrNull($data['baseUrl'] ?? null),
            apiKey: Coerce::toStringOrNull($data['apiKey'] ?? null),
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
            'kind' => $this->kind,
            'sourceKindId' => $this->sourceKindId,
            'location' => $this->location,
            'enabled' => $this->enabled,
            'lookbackDays' => $this->lookbackDays,
        ];
        if ($this->accountId !== null) {
            $payload['accountId'] = $this->accountId;
        }
        if ($this->baseUrl !== null) {
            $payload['baseUrl'] = $this->baseUrl;
        }
        if ($this->apiKey !== null) {
            $payload['apiKey'] = $this->apiKey;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
