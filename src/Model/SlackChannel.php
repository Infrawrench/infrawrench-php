<?php

/*
 * infrawrench/sdk v1.39.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.39.0).
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

final class SlackChannel implements \JsonSerializable
{
    /**
     * @param string $channelId Slack channel id (C…/G…)
     * @param string $channelName Channel name without the leading #
     */
    public function __construct(
        public readonly string $id,
        public readonly string $installationId,
        public readonly string $channelId,
        public readonly string $channelName,
        public readonly bool $isPrivate,
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
            installationId: Coerce::toString($data['installationId'] ?? null),
            channelId: Coerce::toString($data['channelId'] ?? null),
            channelName: Coerce::toString($data['channelName'] ?? null),
            isPrivate: Coerce::toBool($data['isPrivate'] ?? null),
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
            'installationId' => $this->installationId,
            'channelId' => $this->channelId,
            'channelName' => $this->channelName,
            'isPrivate' => $this->isPrivate,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
