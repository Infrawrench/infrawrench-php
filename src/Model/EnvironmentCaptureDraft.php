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

final class EnvironmentCaptureDraft implements \JsonSerializable
{
    /**
     * @param list<EnvironmentCaptureDraftMember> $members
     * @param list<EnvironmentParameter> $suggestedParameters
     * @param list<array{resourceId: string, displayName: string, reason: string}> $skipped
     */
    public function __construct(
        public readonly array $members,
        public readonly array $suggestedParameters,
        public readonly array $skipped,
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
            members: Coerce::mapList($data['members'] ?? null, static fn (mixed $item): EnvironmentCaptureDraftMember => EnvironmentCaptureDraftMember::fromArray(Coerce::toArray($item))),
            suggestedParameters: Coerce::mapList($data['suggestedParameters'] ?? null, static fn (mixed $item): EnvironmentParameter => EnvironmentParameter::fromArray(Coerce::toArray($item))),
            skipped: Coerce::mapList($data['skipped'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
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
            'members' => array_map(static fn (EnvironmentCaptureDraftMember $item): array => $item->toArray(), $this->members),
            'suggestedParameters' => array_map(static fn (EnvironmentParameter $item): array => $item->toArray(), $this->suggestedParameters),
            'skipped' => $this->skipped,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
