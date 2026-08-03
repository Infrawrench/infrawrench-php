<?php

/*
 * infrawrench/sdk v0.29.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.29.0).
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

final class DigestSettingsUpdate implements \JsonSerializable
{
    /**
     * @param string|null $timezone IANA time zone name. Rejected with 400 if the server does not know the zone.
     */
    public function __construct(
        public readonly ?bool $enabled = null,
        public readonly ?string $timezone = null,
        public readonly ?int $sendDay = null,
        public readonly ?int $sendHour = null,
        public readonly ?bool $narrativeEnabled = null,
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
            enabled: Coerce::toBoolOrNull($data['enabled'] ?? null),
            timezone: Coerce::toStringOrNull($data['timezone'] ?? null),
            sendDay: Coerce::toIntOrNull($data['sendDay'] ?? null),
            sendHour: Coerce::toIntOrNull($data['sendHour'] ?? null),
            narrativeEnabled: Coerce::toBoolOrNull($data['narrativeEnabled'] ?? null),
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
        if ($this->enabled !== null) {
            $payload['enabled'] = $this->enabled;
        }
        if ($this->timezone !== null) {
            $payload['timezone'] = $this->timezone;
        }
        if ($this->sendDay !== null) {
            $payload['sendDay'] = $this->sendDay;
        }
        if ($this->sendHour !== null) {
            $payload['sendHour'] = $this->sendHour;
        }
        if ($this->narrativeEnabled !== null) {
            $payload['narrativeEnabled'] = $this->narrativeEnabled;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
