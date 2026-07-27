<?php

/*
 * infrawrench/sdk v0.8.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.8.0).
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

final class SlackStatus implements \JsonSerializable
{
    /**
     * @param bool $configured True when this deployment has a Slack app registered
     * @param list<SlackInstallation> $installations
     * @param list<SlackChannel> $channels
     */
    public function __construct(
        public readonly bool $configured,
        public readonly array $installations,
        public readonly array $channels,
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
            configured: Coerce::toBool($data['configured'] ?? null),
            installations: Coerce::mapList($data['installations'] ?? null, static fn (mixed $item): SlackInstallation => SlackInstallation::fromArray(Coerce::toArray($item))),
            channels: Coerce::mapList($data['channels'] ?? null, static fn (mixed $item): SlackChannel => SlackChannel::fromArray(Coerce::toArray($item))),
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
            'configured' => $this->configured,
            'installations' => array_map(static fn (SlackInstallation $item): array => $item->toArray(), $this->installations),
            'channels' => array_map(static fn (SlackChannel $item): array => $item->toArray(), $this->channels),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
