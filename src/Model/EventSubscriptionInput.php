<?php

/*
 * infrawrench/sdk v1.85.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.85.0).
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

final class EventSubscriptionInput implements \JsonSerializable
{
    /**
     * @param array{kind: 'webhook', url: string}|array{kind: 'publish', accountId: string, resourceTypeId: string, resourceId: string} $destination
     * @param list<string>|null $eventTypes Event types to receive (see /event-subscriptions/catalog). Empty means all.
     * @param list<string>|null $accountIds Only events about these accounts. Empty does not filter; an event with no account never matches a non-empty list.
     * @param list<string>|null $environments Only events whose environment is one of these (case-insensitive). Empty does not filter; an event with no environment never matches a non-empty list.
     */
    public function __construct(
        public readonly string $name,
        public readonly array $destination,
        public readonly ?bool $enabled = null,
        public readonly ?array $eventTypes = null,
        public readonly mixed $minSeverity = null,
        public readonly ?array $accountIds = null,
        public readonly ?array $environments = null,
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
            destination: $data['destination'] ?? null,
            enabled: Coerce::toBoolOrNull($data['enabled'] ?? null),
            eventTypes: Coerce::nullable($data['eventTypes'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            minSeverity: $data['minSeverity'] ?? null,
            accountIds: Coerce::nullable($data['accountIds'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            environments: Coerce::nullable($data['environments'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
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
            'destination' => $this->destination,
        ];
        if ($this->enabled !== null) {
            $payload['enabled'] = $this->enabled;
        }
        if ($this->eventTypes !== null) {
            $payload['eventTypes'] = $this->eventTypes;
        }
        if ($this->minSeverity !== null) {
            $payload['minSeverity'] = $this->minSeverity;
        }
        if ($this->accountIds !== null) {
            $payload['accountIds'] = $this->accountIds;
        }
        if ($this->environments !== null) {
            $payload['environments'] = $this->environments;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
