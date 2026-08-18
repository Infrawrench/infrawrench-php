<?php

/*
 * infrawrench/sdk v1.31.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.31.0).
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

final class SessionRecordingSettingsUpdate implements \JsonSerializable
{
    public function __construct(
        public readonly ?bool $enabled = null,
        public readonly ?bool $captureInput = null,
        public readonly ?int $retentionDays = null,
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
            captureInput: Coerce::toBoolOrNull($data['captureInput'] ?? null),
            retentionDays: Coerce::toIntOrNull($data['retentionDays'] ?? null),
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
        if ($this->captureInput !== null) {
            $payload['captureInput'] = $this->captureInput;
        }
        if ($this->retentionDays !== null) {
            $payload['retentionDays'] = $this->retentionDays;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
