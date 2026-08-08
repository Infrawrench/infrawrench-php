<?php

/*
 * infrawrench/sdk v1.1.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.1.0).
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

final class SessionRecordingSettings implements \JsonSerializable
{
    /**
     * @param bool $captureInput Also record keystrokes. Separate from `enabled` because it captures input at prompts the remote host chose not to echo — a sudo password, a pasted token — which is a materially different promise to the people being recorded.
     */
    public function __construct(
        public readonly bool $enabled,
        public readonly bool $captureInput,
        public readonly int $retentionDays,
        public readonly SessionRecordingUsage $usage,
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
            enabled: Coerce::toBool($data['enabled'] ?? null),
            captureInput: Coerce::toBool($data['captureInput'] ?? null),
            retentionDays: Coerce::toInt($data['retentionDays'] ?? null),
            usage: SessionRecordingUsage::fromArray(Coerce::toArray($data['usage'] ?? null)),
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
            'enabled' => $this->enabled,
            'captureInput' => $this->captureInput,
            'retentionDays' => $this->retentionDays,
            'usage' => $this->usage->toArray(),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
