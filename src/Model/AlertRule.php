<?php

/*
 * infrawrench/sdk v1.37.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.37.0).
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

final class AlertRule implements \JsonSerializable
{
    /**
     * @param int $position Ascending evaluation order
     * @param list<array{field: 'trigger', op: 'in'|'notIn', values: list<AlertTrigger::*>}|array{field: 'severity', op: 'gte'|'eq', severity: AlertSeverity::*}|array{field: 'accountId', op: 'in'|'notIn', values: list<string>}|array{field: 'pluginId', op: 'in'|'notIn', values: list<string>}|array{field: 'resourceTypeId', op: 'in'|'notIn', values: list<string>}|array{field: 'amountCents', op: 'gte'|'lt', cents: int}|array{field: 'key', op: 'contains'|'notContains'|'eq', value: string}|array{field: 'text', op: 'contains'|'notContains', value: string}> $conditions
     * @param list<array{kind: 'push'}|array{kind: 'slack', channelId: string}|array{kind: 'msteams', webhookId: string}|array{kind: 'on-call', scheduleId: string}> $destinations Empty is legal and meaningful: an enabled rule with no destinations swallows matching alerts and shadows the rules below it.
     * @param bool $continueOnMatch False (the default) makes the list first-match-wins, which is what lets a narrow rule sit above a broad one. True makes the rule a tee that copies without shadowing.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly bool $enabled,
        public readonly int $position,
        public readonly array $conditions,
        public readonly array $destinations,
        public readonly bool $continueOnMatch,
        public readonly ?QuietHours $quietHours,
        public readonly ?EscalationPolicy $escalation,
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
            position: Coerce::toInt($data['position'] ?? null),
            conditions: Coerce::toList($data['conditions'] ?? null),
            destinations: Coerce::toList($data['destinations'] ?? null),
            continueOnMatch: Coerce::toBool($data['continueOnMatch'] ?? null),
            quietHours: Coerce::nullable($data['quietHours'] ?? null, static fn (mixed $value): QuietHours => QuietHours::fromArray(Coerce::toArray($value))),
            escalation: Coerce::nullable($data['escalation'] ?? null, static fn (mixed $value): EscalationPolicy => EscalationPolicy::fromArray(Coerce::toArray($value))),
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
            'position' => $this->position,
            'conditions' => $this->conditions,
            'destinations' => $this->destinations,
            'continueOnMatch' => $this->continueOnMatch,
            'quietHours' => $this->quietHours?->toArray(),
            'escalation' => $this->escalation?->toArray(),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
