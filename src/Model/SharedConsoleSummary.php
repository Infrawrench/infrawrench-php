<?php

/*
 * infrawrench/sdk v1.25.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.25.0).
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

final class SharedConsoleSummary implements \JsonSerializable
{
    /**
     * @param string $routingKey Load-balancer affinity hint. A guest's WebSocket must carry it as `?sid=` so the upgrade lands on the replica holding the pty. Not a secret and not authorisation.
     * @param string $host Final hop, as the proxy dialled it — never as a client asserted it.
     * @param bool $allowHandover False makes the share strictly read-only: nobody but the sharer can ever type. This is the one hard safety property the feature offers, as opposed to inferring intent from command text.
     * @param 'active'|'revoked'|'ended' $status `revoked` — somebody ended the share; `ended` — the underlying SSH session closed. Either way the fan-out stops and attached guests are disconnected.
     * @param string|null $inviteConsumedAt Set once an invite admitted somebody new. The link stops working for anyone else at that moment; the sharer mints a replacement for the next guest.
     * @param string|null $recordingId The session recording this console is being taped into, when the org records. Participants are attributed in that recording's own metadata and as asciicast markers on its timeline.
     * @param int $ptyRows The pty's geometry, which is the **driver's** geometry. One pty has one size, so everyone else letterboxes rather than reflowing.
     * @param list<SharedConsoleParticipant> $participants
     */
    public function __construct(
        public readonly string $id,
        public readonly string $routingKey,
        public readonly ?string $ownerUserId,
        public readonly ?string $ownerName,
        public readonly ?string $accountId,
        public readonly ?string $resourceId,
        public readonly string $host,
        public readonly int $port,
        public readonly string $username,
        public readonly bool $allowHandover,
        public readonly string $status,
        public readonly ?string $inviteTokenPrefix,
        public readonly ?string $inviteExpiresAt,
        public readonly ?string $inviteConsumedAt,
        public readonly ?string $recordingId,
        public readonly int $ptyCols,
        public readonly int $ptyRows,
        public readonly string $createdAt,
        public readonly array $participants,
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
            routingKey: Coerce::toString($data['routingKey'] ?? null),
            ownerUserId: Coerce::toStringOrNull($data['ownerUserId'] ?? null),
            ownerName: Coerce::toStringOrNull($data['ownerName'] ?? null),
            accountId: Coerce::toStringOrNull($data['accountId'] ?? null),
            resourceId: Coerce::toStringOrNull($data['resourceId'] ?? null),
            host: Coerce::toString($data['host'] ?? null),
            port: Coerce::toInt($data['port'] ?? null),
            username: Coerce::toString($data['username'] ?? null),
            allowHandover: Coerce::toBool($data['allowHandover'] ?? null),
            status: Coerce::toString($data['status'] ?? null),
            inviteTokenPrefix: Coerce::toStringOrNull($data['inviteTokenPrefix'] ?? null),
            inviteExpiresAt: Coerce::toStringOrNull($data['inviteExpiresAt'] ?? null),
            inviteConsumedAt: Coerce::toStringOrNull($data['inviteConsumedAt'] ?? null),
            recordingId: Coerce::toStringOrNull($data['recordingId'] ?? null),
            ptyCols: Coerce::toInt($data['ptyCols'] ?? null),
            ptyRows: Coerce::toInt($data['ptyRows'] ?? null),
            createdAt: Coerce::toString($data['createdAt'] ?? null),
            participants: Coerce::mapList($data['participants'] ?? null, static fn (mixed $item): SharedConsoleParticipant => SharedConsoleParticipant::fromArray(Coerce::toArray($item))),
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
            'routingKey' => $this->routingKey,
            'ownerUserId' => $this->ownerUserId,
            'ownerName' => $this->ownerName,
            'accountId' => $this->accountId,
            'resourceId' => $this->resourceId,
            'host' => $this->host,
            'port' => $this->port,
            'username' => $this->username,
            'allowHandover' => $this->allowHandover,
            'status' => $this->status,
            'inviteTokenPrefix' => $this->inviteTokenPrefix,
            'inviteExpiresAt' => $this->inviteExpiresAt,
            'inviteConsumedAt' => $this->inviteConsumedAt,
            'recordingId' => $this->recordingId,
            'ptyCols' => $this->ptyCols,
            'ptyRows' => $this->ptyRows,
            'createdAt' => $this->createdAt,
            'participants' => array_map(static fn (SharedConsoleParticipant $item): array => $item->toArray(), $this->participants),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
