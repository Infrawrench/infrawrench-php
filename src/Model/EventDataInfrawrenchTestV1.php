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

/**
 * `data` of a `infrawrench.test` event, version 1. Sent by Send test event. Never raised by
 * anything else.
 *
 * Spec schema: `EventData_infrawrench_test_v1`.
 */
final class EventDataInfrawrenchTestV1 implements \JsonSerializable
{
    /**
     * @param string $message Fixed text saying this is a test.
     * @param string $subscriptionId The subscription the test was sent to.
     */
    public function __construct(
        public readonly string $message,
        public readonly string $subscriptionId,
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
            message: Coerce::toString($data['message'] ?? null),
            subscriptionId: Coerce::toString($data['subscriptionId'] ?? null),
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
            'message' => $this->message,
            'subscriptionId' => $this->subscriptionId,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
