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

/** Empty lists and blank fields are dropped on write. */
final class SavingsFindingFilter implements \JsonSerializable
{
    /**
     * @param list<SavingsFindingKind::*>|null $kinds
     * @param list<string>|null $pluginIds
     * @param list<string>|null $accountIds
     * @param list<string>|null $regions
     * @param list<array{key: string, values?: list<string>}>|null $tags Every term must match; a term without values matches any value of the key.
     */
    public function __construct(
        public readonly ?array $kinds = null,
        public readonly ?array $pluginIds = null,
        public readonly ?array $accountIds = null,
        public readonly ?array $regions = null,
        public readonly ?array $tags = null,
        public readonly ?float $minMonthlySavings = null,
        public readonly ?string $detectedFrom = null,
        public readonly ?string $detectedTo = null,
        public readonly ?string $search = null,
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
            kinds: Coerce::nullable($data['kinds'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            pluginIds: Coerce::nullable($data['pluginIds'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            accountIds: Coerce::nullable($data['accountIds'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            regions: Coerce::nullable($data['regions'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            tags: Coerce::nullable($data['tags'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): array => Coerce::toArray($item))),
            minMonthlySavings: Coerce::toFloatOrNull($data['minMonthlySavings'] ?? null),
            detectedFrom: Coerce::toStringOrNull($data['detectedFrom'] ?? null),
            detectedTo: Coerce::toStringOrNull($data['detectedTo'] ?? null),
            search: Coerce::toStringOrNull($data['search'] ?? null),
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
        if ($this->kinds !== null) {
            $payload['kinds'] = $this->kinds;
        }
        if ($this->pluginIds !== null) {
            $payload['pluginIds'] = $this->pluginIds;
        }
        if ($this->accountIds !== null) {
            $payload['accountIds'] = $this->accountIds;
        }
        if ($this->regions !== null) {
            $payload['regions'] = $this->regions;
        }
        if ($this->tags !== null) {
            $payload['tags'] = $this->tags;
        }
        if ($this->minMonthlySavings !== null) {
            $payload['minMonthlySavings'] = $this->minMonthlySavings;
        }
        if ($this->detectedFrom !== null) {
            $payload['detectedFrom'] = $this->detectedFrom;
        }
        if ($this->detectedTo !== null) {
            $payload['detectedTo'] = $this->detectedTo;
        }
        if ($this->search !== null) {
            $payload['search'] = $this->search;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
