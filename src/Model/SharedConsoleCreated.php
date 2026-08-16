<?php

/*
 * infrawrench/sdk v1.27.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.27.0).
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

final class SharedConsoleCreated implements \JsonSerializable
{
    /**
     * @param list<SharedConsoleParticipant> $participants
     * @param string $inviteToken The invite, returned exactly once. Only its sha256 is stored, so it cannot be shown again — mint a replacement instead.
     */
    public function __construct(
        public readonly SharedConsole $share,
        public readonly array $participants,
        public readonly string $inviteToken,
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
            share: SharedConsole::fromArray(Coerce::toArray($data['share'] ?? null)),
            participants: Coerce::mapList($data['participants'] ?? null, static fn (mixed $item): SharedConsoleParticipant => SharedConsoleParticipant::fromArray(Coerce::toArray($item))),
            inviteToken: Coerce::toString($data['inviteToken'] ?? null),
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
            'share' => $this->share->toArray(),
            'participants' => array_map(static fn (SharedConsoleParticipant $item): array => $item->toArray(), $this->participants),
            'inviteToken' => $this->inviteToken,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
