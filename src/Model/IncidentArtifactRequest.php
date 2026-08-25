<?php

/*
 * infrawrench/sdk v1.37.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.37.0).
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

/**
 * What the declaration asked for, recorded so a retry asks for the same thing. Present on the
 * status-page artefact, where a retry that forgot the operator's chosen components would publish
 * the outage against the whole page.
 *
 * The API may send `null` in place of this object.
 */
final class IncidentArtifactRequest implements \JsonSerializable
{
    /** @param list<string>|null $componentIds */
    public function __construct(
        public readonly ?string $statusPageId = null,
        public readonly ?array $componentIds = null,
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
            statusPageId: Coerce::toStringOrNull($data['statusPageId'] ?? null),
            componentIds: Coerce::nullable($data['componentIds'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
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
        if ($this->statusPageId !== null) {
            $payload['statusPageId'] = $this->statusPageId;
        }
        if ($this->componentIds !== null) {
            $payload['componentIds'] = $this->componentIds;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
