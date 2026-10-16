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

final class EventSubscription implements \JsonSerializable
{
    /**
     * @param array{kind: 'webhook', url: string}|array{kind: 'publish', accountId: string, resourceTypeId: string, resourceId: string} $destination
     * @param string $destinationLabel Human label for the destination.
     * @param list<string> $eventTypes Event types to receive (see /event-subscriptions/catalog). Empty means all.
     * @param list<string> $accountIds Only events about these accounts. Empty does not filter; an event with no account never matches a non-empty list.
     * @param list<string> $environments Only events whose environment is one of these (case-insensitive). Empty does not filter; an event with no environment never matches a non-empty list.
     * @param string|null $secretHint Last four characters of the signing secret; null for publish destinations.
     * @param string|null $previousSecretExpiresAt Until when the secret before the last reroll still signs.
     * @param string|null $disabledReason Set when the subscription was turned off automatically after sustained failure.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly bool $enabled,
        public readonly array $destination,
        public readonly string $destinationLabel,
        public readonly array $eventTypes,
        public readonly mixed $minSeverity,
        public readonly array $accountIds,
        public readonly array $environments,
        public readonly ?string $secretHint,
        public readonly ?string $previousSecretExpiresAt,
        public readonly ?string $disabledReason,
        public readonly ?string $disabledAt,
        public readonly int $consecutiveFailures,
        public readonly ?string $failingSince,
        public readonly ?string $lastSuccessAt,
        public readonly ?string $lastFailureAt,
        public readonly string $createdAt,
        public readonly string $updatedAt,
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
            id: Coerce::toString($data['id'] ?? null),
            name: Coerce::toString($data['name'] ?? null),
            enabled: Coerce::toBool($data['enabled'] ?? null),
            destination: $data['destination'] ?? null,
            destinationLabel: Coerce::toString($data['destinationLabel'] ?? null),
            eventTypes: Coerce::mapList($data['eventTypes'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            minSeverity: $data['minSeverity'] ?? null,
            accountIds: Coerce::mapList($data['accountIds'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            environments: Coerce::mapList($data['environments'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            secretHint: Coerce::toStringOrNull($data['secretHint'] ?? null),
            previousSecretExpiresAt: Coerce::toStringOrNull($data['previousSecretExpiresAt'] ?? null),
            disabledReason: Coerce::toStringOrNull($data['disabledReason'] ?? null),
            disabledAt: Coerce::toStringOrNull($data['disabledAt'] ?? null),
            consecutiveFailures: Coerce::toInt($data['consecutiveFailures'] ?? null),
            failingSince: Coerce::toStringOrNull($data['failingSince'] ?? null),
            lastSuccessAt: Coerce::toStringOrNull($data['lastSuccessAt'] ?? null),
            lastFailureAt: Coerce::toStringOrNull($data['lastFailureAt'] ?? null),
            createdAt: Coerce::toString($data['createdAt'] ?? null),
            updatedAt: Coerce::toString($data['updatedAt'] ?? null),
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
            'id' => $this->id,
            'name' => $this->name,
            'enabled' => $this->enabled,
            'destination' => $this->destination,
            'destinationLabel' => $this->destinationLabel,
            'eventTypes' => $this->eventTypes,
            'minSeverity' => $this->minSeverity,
            'accountIds' => $this->accountIds,
            'environments' => $this->environments,
            'secretHint' => $this->secretHint,
            'previousSecretExpiresAt' => $this->previousSecretExpiresAt,
            'disabledReason' => $this->disabledReason,
            'disabledAt' => $this->disabledAt,
            'consecutiveFailures' => $this->consecutiveFailures,
            'failingSince' => $this->failingSince,
            'lastSuccessAt' => $this->lastSuccessAt,
            'lastFailureAt' => $this->lastFailureAt,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
