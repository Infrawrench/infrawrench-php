<?php

/*
 * infrawrench/sdk v1.34.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.34.0).
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

final class EnvironmentCaptureRequest implements \JsonSerializable
{
    /** @param list<string>|null $resourceIds */
    public function __construct(
        public readonly ?array $resourceIds = null,
        public readonly ?string $accountId = null,
        public readonly ?string $tagKey = null,
        public readonly ?string $tagValue = null,
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
            resourceIds: Coerce::nullable($data['resourceIds'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            accountId: Coerce::toStringOrNull($data['accountId'] ?? null),
            tagKey: Coerce::toStringOrNull($data['tagKey'] ?? null),
            tagValue: Coerce::toStringOrNull($data['tagValue'] ?? null),
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
        if ($this->resourceIds !== null) {
            $payload['resourceIds'] = $this->resourceIds;
        }
        if ($this->accountId !== null) {
            $payload['accountId'] = $this->accountId;
        }
        if ($this->tagKey !== null) {
            $payload['tagKey'] = $this->tagKey;
        }
        if ($this->tagValue !== null) {
            $payload['tagValue'] = $this->tagValue;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
