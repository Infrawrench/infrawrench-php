<?php

/*
 * infrawrench/sdk v1.85.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.85.0).
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
 * `data` of a `secret.leaked` event, version 1. A secret scanner found a credential committed to
 * code. Each finding is sent once; the value itself is never included.
 *
 * Spec schema: `EventData_secret_leaked_v1`.
 */
final class EventDataSecretLeakedV1 implements \JsonSerializable
{
    /**
     * @param string $leakId Infrawrench leaked secret id.
     * @param string $tokenType The scanner's identifier for the token type.
     * @param string $tokenTypeLabel Human name of the token type.
     * @param string|null $ownerPluginId Plugin that issues this token type.
     * @param 'account'|'secret-field'|'output'|'none' $matchKind What the leak was matched to.
     * @param string|null $matchedAccountId The connected account the leak belongs to.
     * @param string|null $matchedResourceId The resource whose stored secret leaked.
     * @param string $scannerPluginId Plugin of the scanner that found it.
     * @param string $scannerAccountId Scanner account that found it.
     * @param 'fingerprint'|'token-type'|'none' $matchConfidence How the match was made.
     * @param string|null $repository Repository the secret was found in.
     * @param string|null $path File the secret was found in.
     * @param string|null $url The finding on the scanner.
     * @param 'active'|'inactive'|'unknown'|null $validity The scanner's validity check.
     * @param bool $publiclyLeaked The scanner also found it in a public place.
     * @param string $detectedAt When the scanner first saw it.
     */
    public function __construct(
        public readonly string $leakId,
        public readonly string $tokenType,
        public readonly string $tokenTypeLabel,
        public readonly ?string $ownerPluginId,
        public readonly string $matchKind,
        public readonly ?string $matchedAccountId,
        public readonly ?string $matchedResourceId,
        public readonly string $scannerPluginId,
        public readonly string $scannerAccountId,
        public readonly string $matchConfidence,
        public readonly ?string $repository,
        public readonly ?string $path,
        public readonly ?string $url,
        public readonly ?string $validity,
        public readonly bool $publiclyLeaked,
        public readonly string $detectedAt,
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
            scannerPluginId: Coerce::toString($data['scannerPluginId'] ?? null),
            scannerAccountId: Coerce::toString($data['scannerAccountId'] ?? null),
            matchConfidence: Coerce::toString($data['matchConfidence'] ?? null),
            repository: Coerce::toStringOrNull($data['repository'] ?? null),
            path: Coerce::toStringOrNull($data['path'] ?? null),
            url: Coerce::toStringOrNull($data['url'] ?? null),
            validity: Coerce::toStringOrNull($data['validity'] ?? null),
            publiclyLeaked: Coerce::toBool($data['publiclyLeaked'] ?? null),
            detectedAt: Coerce::toString($data['detectedAt'] ?? null),
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
            'scannerPluginId' => $this->scannerPluginId,
            'scannerAccountId' => $this->scannerAccountId,
            'matchConfidence' => $this->matchConfidence,
            'repository' => $this->repository,
            'path' => $this->path,
            'url' => $this->url,
            'validity' => $this->validity,
            'publiclyLeaked' => $this->publiclyLeaked,
            'detectedAt' => $this->detectedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
