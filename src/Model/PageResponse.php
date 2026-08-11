<?php

/*
 * infrawrench/sdk v1.9.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.9.0).
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

final class PageResponse implements \JsonSerializable
{
    /**
     * @param bool $delivered True when at least one recipient was reached on any transport.
     * @param bool $suppressed True when the key was still in cooldown, so nothing was sent.
     * @param int $sms Twilio deliveries (SMS + voice) that Twilio accepted.
     * @param int $push Push notifications accepted by Expo.
     * @param int $slack Slack channel posts Slack accepted.
     * @param int $msTeams Microsoft Teams webhook posts Teams accepted.
     * @param string|null $retryAt When suppressed, the time at which this key can page again.
     */
    public function __construct(
        public readonly bool $delivered,
        public readonly bool $suppressed,
        public readonly int $sms,
        public readonly int $push,
        public readonly int $slack,
        public readonly int $msTeams,
        public readonly ?string $retryAt = null,
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
            delivered: Coerce::toBool($data['delivered'] ?? null),
            suppressed: Coerce::toBool($data['suppressed'] ?? null),
            sms: Coerce::toInt($data['sms'] ?? null),
            push: Coerce::toInt($data['push'] ?? null),
            slack: Coerce::toInt($data['slack'] ?? null),
            msTeams: Coerce::toInt($data['msTeams'] ?? null),
            retryAt: Coerce::toStringOrNull($data['retryAt'] ?? null),
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
            'delivered' => $this->delivered,
            'suppressed' => $this->suppressed,
            'sms' => $this->sms,
            'push' => $this->push,
            'slack' => $this->slack,
            'msTeams' => $this->msTeams,
        ];
        if ($this->retryAt !== null) {
            $payload['retryAt'] = $this->retryAt;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
