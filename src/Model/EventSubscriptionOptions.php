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

final class EventSubscriptionOptions implements \JsonSerializable
{
    /**
     * @param list<array{id: string, name: string, pluginId: string}> $accounts
     * @param list<string> $environments
     * @param list<array{accountId: string, accountName: string, pluginId: string, pluginName: string, resourceTypeId: string, resourceTypeName: string, resourceId: string, resourceName: string}> $sinks
     */
    public function __construct(
        public readonly array $accounts,
        public readonly array $environments,
        public readonly array $sinks,
        public readonly bool $canSubscribeToCost,
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
            accounts: Coerce::mapList($data['accounts'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            environments: Coerce::mapList($data['environments'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            sinks: Coerce::mapList($data['sinks'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            canSubscribeToCost: Coerce::toBool($data['canSubscribeToCost'] ?? null),
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
            'accounts' => $this->accounts,
            'environments' => $this->environments,
            'sinks' => $this->sinks,
            'canSubscribeToCost' => $this->canSubscribeToCost,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
