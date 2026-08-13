<?php

/*
 * infrawrench/sdk v1.23.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.23.0).
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

final class SessionRecordingUsage implements \JsonSerializable
{
    /** @param int $storedBytes Compressed size actually stored. */
    public function __construct(
        public readonly int $recordingCount,
        public readonly int $storedBytes,
        public readonly int $capturedBytes,
        public readonly ?string $oldestStartedAt,
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
            recordingCount: Coerce::toInt($data['recordingCount'] ?? null),
            storedBytes: Coerce::toInt($data['storedBytes'] ?? null),
            capturedBytes: Coerce::toInt($data['capturedBytes'] ?? null),
            oldestStartedAt: Coerce::toStringOrNull($data['oldestStartedAt'] ?? null),
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
            'recordingCount' => $this->recordingCount,
            'storedBytes' => $this->storedBytes,
            'capturedBytes' => $this->capturedBytes,
            'oldestStartedAt' => $this->oldestStartedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
