<?php

/*
 * infrawrench/sdk v1.10.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.10.0).
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

final class SessionRecording implements \JsonSerializable
{
    /**
     * @param string|null $userId Who opened the session; null when the socket authenticated with an API key.
     * @param string|null $userName Display-name snapshot taken at record time, so a departed member still reads as one.
     * @param string $host Final hop, as dialled.
     * @param int $hopCount 1 for a direct session; higher when it jumped through bastions.
     * @param bool $hasInput True when the cast also contains keystrokes (the org opted into input capture).
     * @param 'recording'|'complete'|'truncated'|'abandoned' $status `recording` (live), `complete` (closed cleanly), `truncated` (hit the per-session capture ceiling — the tape is a genuine partial and says so), or `abandoned` (the server handling the session went away before it could close the row).
     * @param int $outputBytes Terminal bytes captured, before compression.
     */
    public function __construct(
        public readonly string $id,
        public readonly ?string $userId,
        public readonly ?string $userName,
        public readonly ?string $accountId,
        public readonly ?string $resourceId,
        public readonly string $host,
        public readonly int $port,
        public readonly string $username,
        public readonly int $hopCount,
        public readonly int $cols,
        public readonly int $rows,
        public readonly bool $hasInput,
        public readonly string $status,
        public readonly int $outputBytes,
        public readonly int $eventCount,
        public readonly string $startedAt,
        public readonly ?string $endedAt,
        public readonly ?int $durationMs,
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
            userId: Coerce::toStringOrNull($data['userId'] ?? null),
            userName: Coerce::toStringOrNull($data['userName'] ?? null),
            accountId: Coerce::toStringOrNull($data['accountId'] ?? null),
            resourceId: Coerce::toStringOrNull($data['resourceId'] ?? null),
            host: Coerce::toString($data['host'] ?? null),
            port: Coerce::toInt($data['port'] ?? null),
            username: Coerce::toString($data['username'] ?? null),
            hopCount: Coerce::toInt($data['hopCount'] ?? null),
            cols: Coerce::toInt($data['cols'] ?? null),
            rows: Coerce::toInt($data['rows'] ?? null),
            hasInput: Coerce::toBool($data['hasInput'] ?? null),
            status: Coerce::toString($data['status'] ?? null),
            outputBytes: Coerce::toInt($data['outputBytes'] ?? null),
            eventCount: Coerce::toInt($data['eventCount'] ?? null),
            startedAt: Coerce::toString($data['startedAt'] ?? null),
            endedAt: Coerce::toStringOrNull($data['endedAt'] ?? null),
            durationMs: Coerce::toIntOrNull($data['durationMs'] ?? null),
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
            'userId' => $this->userId,
            'userName' => $this->userName,
            'accountId' => $this->accountId,
            'resourceId' => $this->resourceId,
            'host' => $this->host,
            'port' => $this->port,
            'username' => $this->username,
            'hopCount' => $this->hopCount,
            'cols' => $this->cols,
            'rows' => $this->rows,
            'hasInput' => $this->hasInput,
            'status' => $this->status,
            'outputBytes' => $this->outputBytes,
            'eventCount' => $this->eventCount,
            'startedAt' => $this->startedAt,
            'endedAt' => $this->endedAt,
            'durationMs' => $this->durationMs,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
