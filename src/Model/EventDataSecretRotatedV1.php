<?php

/*
 * infrawrench/sdk v1.84.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.84.0).
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
 * `data` of a `secret.rotated` event, version 1. A leaked credential was rotated, or its stored
 * value was seen to change.
 *
 * Spec schema: `EventData_secret_rotated_v1`.
 */
final class EventDataSecretRotatedV1 implements \JsonSerializable
{
    /**
     * @param string $leakId Infrawrench leaked secret id.
     * @param string $tokenType The scanner's identifier for the token type.
     * @param string $tokenTypeLabel Human name of the token type.
     * @param string|null $ownerPluginId Plugin that issues this token type.
     * @param 'account'|'secret-field'|'output'|'none' $matchKind What the leak was matched to.
     * @param string|null $matchedAccountId The connected account the leak belongs to.
     * @param string|null $matchedResourceId The resource whose stored secret leaked.
     * @param 'reissued'|'replaced'|'detected'|'manual' $method How the rotation was recorded.
     * @param string|null $rotatedBy Who rotated it, when a person did.
     * @param bool $upstreamResolved The finding was closed on the scanner as revoked.
     */
    public function __construct(
        public readonly string $leakId,
        public readonly string $tokenType,
        public readonly string $tokenTypeLabel,
        public readonly ?string $ownerPluginId,
        public readonly string $matchKind,
        public readonly ?string $matchedAccountId,
        public readonly ?string $matchedResourceId,
        public readonly string $method,
        public readonly ?string $rotatedBy,
        public readonly bool $upstreamResolved,
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
            leakId: Coerce::toString($data['leakId'] ?? null),
            tokenType: Coerce::toString($data['tokenType'] ?? null),
            tokenTypeLabel: Coerce::toString($data['tokenTypeLabel'] ?? null),
            ownerPluginId: Coerce::toStringOrNull($data['ownerPluginId'] ?? null),
            matchKind: Coerce::toString($data['matchKind'] ?? null),
            matchedAccountId: Coerce::toStringOrNull($data['matchedAccountId'] ?? null),
            matchedResourceId: Coerce::toStringOrNull($data['matchedResourceId'] ?? null),
            method: Coerce::toString($data['method'] ?? null),
            rotatedBy: Coerce::toStringOrNull($data['rotatedBy'] ?? null),
            upstreamResolved: Coerce::toBool($data['upstreamResolved'] ?? null),
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
            'leakId' => $this->leakId,
            'tokenType' => $this->tokenType,
            'tokenTypeLabel' => $this->tokenTypeLabel,
            'ownerPluginId' => $this->ownerPluginId,
            'matchKind' => $this->matchKind,
            'matchedAccountId' => $this->matchedAccountId,
            'matchedResourceId' => $this->matchedResourceId,
            'method' => $this->method,
            'rotatedBy' => $this->rotatedBy,
            'upstreamResolved' => $this->upstreamResolved,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
