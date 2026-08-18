<?php

/*
 * infrawrench/sdk v1.30.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.30.0).
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

final class AlertRuleInput implements \JsonSerializable
{
    /**
     * @param string|null $id Send the existing id to preserve it, which keeps in-flight held and escalating deliveries pointing at their rule.
     * @param list<array{field: 'trigger', op: 'in'|'notIn', values: list<AlertTrigger::*>}|array{field: 'severity', op: 'gte'|'eq', severity: AlertSeverity::*}|array{field: 'accountId', op: 'in'|'notIn', values: list<string>}|array{field: 'pluginId', op: 'in'|'notIn', values: list<string>}|array{field: 'resourceTypeId', op: 'in'|'notIn', values: list<string>}|array{field: 'amountCents', op: 'gte'|'lt', cents: int}|array{field: 'key', op: 'contains'|'notContains'|'eq', value: string}|array{field: 'text', op: 'contains'|'notContains', value: string}>|null $conditions
     * @param list<array{kind: 'push'}|array{kind: 'slack', channelId: string}|array{kind: 'msteams', webhookId: string}>|null $destinations
     */
    public function __construct(
        public readonly string $name,
        public readonly ?string $id = null,
        public readonly ?bool $enabled = null,
        public readonly ?array $conditions = null,
        public readonly ?array $destinations = null,
        public readonly ?bool $continueOnMatch = null,
        public readonly ?QuietHours $quietHours = null,
        public readonly ?EscalationPolicy $escalation = null,
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
            id: Coerce::toStringOrNull($data['id'] ?? null),
            enabled: Coerce::toBoolOrNull($data['enabled'] ?? null),
            conditions: Coerce::toListOrNull($data['conditions'] ?? null),
            destinations: Coerce::toListOrNull($data['destinations'] ?? null),
            continueOnMatch: Coerce::toBoolOrNull($data['continueOnMatch'] ?? null),
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
        $payload = [
            'name' => $this->name,
        ];
        if ($this->id !== null) {
            $payload['id'] = $this->id;
        }
        if ($this->enabled !== null) {
            $payload['enabled'] = $this->enabled;
        }
        if ($this->conditions !== null) {
            $payload['conditions'] = $this->conditions;
        }
        if ($this->destinations !== null) {
            $payload['destinations'] = $this->destinations;
        }
        if ($this->continueOnMatch !== null) {
            $payload['continueOnMatch'] = $this->continueOnMatch;
        }
        if ($this->quietHours !== null) {
            $payload['quietHours'] = $this->quietHours?->toArray();
        }
        if ($this->escalation !== null) {
            $payload['escalation'] = $this->escalation?->toArray();
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
