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

final class AlertDelivery implements \JsonSerializable
{
    /**
     * @param AlertTrigger::* $trigger
     * @param AlertSeverity::* $severity
     * @param 'held'|'awaiting_ack'|'sent'|'acknowledged'|'escalated'|'expired' $state
     * @param string|null $deliverAfter When a quiet-hours hold is released.
     * @param string|null $escalateAt When an unacknowledged alert escalates.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $trigger,
        public readonly string $severity,
        public readonly string $title,
        public readonly string $body,
        public readonly ?string $ruleName,
        public readonly string $state,
        public readonly string $createdAt,
        public readonly ?string $deliverAfter,
        public readonly ?string $escalateAt,
        public readonly ?string $acknowledgedAt,
        public readonly ?string $acknowledgedByUserId,
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
            trigger: Coerce::toString($data['trigger'] ?? null),
            severity: Coerce::toString($data['severity'] ?? null),
            title: Coerce::toString($data['title'] ?? null),
            body: Coerce::toString($data['body'] ?? null),
            ruleName: Coerce::toStringOrNull($data['ruleName'] ?? null),
            state: Coerce::toString($data['state'] ?? null),
            createdAt: Coerce::toString($data['createdAt'] ?? null),
            deliverAfter: Coerce::toStringOrNull($data['deliverAfter'] ?? null),
            escalateAt: Coerce::toStringOrNull($data['escalateAt'] ?? null),
            acknowledgedAt: Coerce::toStringOrNull($data['acknowledgedAt'] ?? null),
            acknowledgedByUserId: Coerce::toStringOrNull($data['acknowledgedByUserId'] ?? null),
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
            'trigger' => $this->trigger,
            'severity' => $this->severity,
            'title' => $this->title,
            'body' => $this->body,
            'ruleName' => $this->ruleName,
            'state' => $this->state,
            'createdAt' => $this->createdAt,
            'deliverAfter' => $this->deliverAfter,
            'escalateAt' => $this->escalateAt,
            'acknowledgedAt' => $this->acknowledgedAt,
            'acknowledgedByUserId' => $this->acknowledgedByUserId,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
