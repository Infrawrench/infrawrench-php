<?php

/*
 * infrawrench/sdk v1.84.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.84.0).
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

final class EventDelivery implements \JsonSerializable
{
    /**
     * @param 'pending'|'retrying'|'succeeded'|'dead'|'skipped' $state
     * @param list<EventDeliveryAttempt> $attempts
     * @param array<string, mixed> $payload The envelope as sent.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $subscriptionId,
        public readonly string $eventId,
        public readonly string $eventType,
        public readonly string $state,
        public readonly int $attemptCount,
        public readonly ?string $nextAttemptAt,
        public readonly ?string $lastAttemptAt,
        public readonly ?string $deliveredAt,
        public readonly ?int $responseStatus,
        public readonly ?string $responseExcerpt,
        public readonly ?string $error,
        public readonly bool $test,
        public readonly ?string $redeliveryOf,
        public readonly array $attempts,
        public readonly string $createdAt,
        public readonly array $payload,
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
            subscriptionId: Coerce::toString($data['subscriptionId'] ?? null),
            eventId: Coerce::toString($data['eventId'] ?? null),
            eventType: Coerce::toString($data['eventType'] ?? null),
            state: Coerce::toString($data['state'] ?? null),
            attemptCount: Coerce::toInt($data['attemptCount'] ?? null),
            nextAttemptAt: Coerce::toStringOrNull($data['nextAttemptAt'] ?? null),
            lastAttemptAt: Coerce::toStringOrNull($data['lastAttemptAt'] ?? null),
            deliveredAt: Coerce::toStringOrNull($data['deliveredAt'] ?? null),
            responseStatus: Coerce::toIntOrNull($data['responseStatus'] ?? null),
            responseExcerpt: Coerce::toStringOrNull($data['responseExcerpt'] ?? null),
            error: Coerce::toStringOrNull($data['error'] ?? null),
            test: Coerce::toBool($data['test'] ?? null),
            redeliveryOf: Coerce::toStringOrNull($data['redeliveryOf'] ?? null),
            attempts: Coerce::mapList($data['attempts'] ?? null, static fn (mixed $item): EventDeliveryAttempt => EventDeliveryAttempt::fromArray(Coerce::toArray($item))),
            createdAt: Coerce::toString($data['createdAt'] ?? null),
            payload: Coerce::toArray($data['payload'] ?? null),
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
            'subscriptionId' => $this->subscriptionId,
            'eventId' => $this->eventId,
            'eventType' => $this->eventType,
            'state' => $this->state,
            'attemptCount' => $this->attemptCount,
            'nextAttemptAt' => $this->nextAttemptAt,
            'lastAttemptAt' => $this->lastAttemptAt,
            'deliveredAt' => $this->deliveredAt,
            'responseStatus' => $this->responseStatus,
            'responseExcerpt' => $this->responseExcerpt,
            'error' => $this->error,
            'test' => $this->test,
            'redeliveryOf' => $this->redeliveryOf,
            'attempts' => array_map(static fn (EventDeliveryAttempt $item): array => $item->toArray(), $this->attempts),
            'createdAt' => $this->createdAt,
            'payload' => $this->payload,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
