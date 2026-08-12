<?php

/*
 * infrawrench/sdk v1.20.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.20.0).
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

final class PreflightCheck implements \JsonSerializable
{
    /**
     * @param 'ok'|'missing'|'unknown' $status
     * @param list<PreflightPermission> $missingPermissions
     * @param array{label: string, url: string}|null $helpLink
     */
    public function __construct(
        public readonly string $capabilityId,
        public readonly string $status,
        public readonly array $missingPermissions,
        public readonly ?string $message,
        public readonly ?array $helpLink,
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
            capabilityId: Coerce::toString($data['capabilityId'] ?? null),
            status: Coerce::toString($data['status'] ?? null),
            missingPermissions: Coerce::mapList($data['missingPermissions'] ?? null, static fn (mixed $item): PreflightPermission => PreflightPermission::fromArray(Coerce::toArray($item))),
            message: Coerce::toStringOrNull($data['message'] ?? null),
            helpLink: Coerce::toArrayOrNull($data['helpLink'] ?? null),
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
            'capabilityId' => $this->capabilityId,
            'status' => $this->status,
            'missingPermissions' => array_map(static fn (PreflightPermission $item): array => $item->toArray(), $this->missingPermissions),
            'message' => $this->message,
            'helpLink' => $this->helpLink,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
