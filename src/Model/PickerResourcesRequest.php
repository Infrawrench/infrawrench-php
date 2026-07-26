<?php

/*
 * infrawrench/sdk v0.1.1 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.1.1).
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

final class PickerResourcesRequest implements \JsonSerializable
{
    /**
     * @param list<array{pluginId: string, resourceTypeId: string, outputKey: string}> $sources
     */
    public function __construct(
        public readonly array $sources,
        public readonly string $accountId,
        public readonly ?string $regionHint = null,
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
            sources: Coerce::mapList($data['sources'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            accountId: Coerce::toString($data['accountId'] ?? null),
            regionHint: Coerce::toStringOrNull($data['regionHint'] ?? null),
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
            'sources' => $this->sources,
            'accountId' => $this->accountId,
        ];
        if ($this->regionHint !== null) {
            $payload['regionHint'] = $this->regionHint;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
