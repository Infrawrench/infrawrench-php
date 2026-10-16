<?php

/*
 * infrawrench/sdk v1.82.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.82.0).
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

final class LeakedSecret implements \JsonSerializable
{
    /**
     * @param 'open'|'rotated'|'dismissed'|'resolved' $status `open` needs rotating; `rotated` was rotated through Infrawrench or detected because the stored value changed; `dismissed` was accepted as not a risk; `resolved` was closed on the scanner by someone else before it was rotated here.
     * @param string $scannerAccountId The scanner account (GitHub, GitLab) the finding came from.
     * @param string $tokenType The scanner's identifier for the token type.
     * @param string|null $ownerPluginId The plugin that issues this kind of token.
     * @param string|null $secretHint At most the first and last four characters. The secret itself is never stored or returned.
     * @param string|null $url The finding on the scanner.
     * @param 'open'|'resolved' $upstreamState
     * @param 'active'|'inactive'|'unknown'|null $validity
     * @param 'account'|'secret-field'|'output'|'none' $matchKind What the leak was matched to: an account credential, a secret stored on a resource, a resource output other resources reference, or nothing Infrawrench holds.
     * @param 'fingerprint'|'token-type'|'none' $matchConfidence `fingerprint`: the leaked value equals a stored one (compared by keyed hash, never by value). `token-type`: the scanner withheld the value, so only the token's issuer is known.
     * @param list<string> $candidateAccountIds Accounts it may belong to when a token-type match is ambiguous.
     * @param array{mode: 'reissue'|'replace'|'account'|'manual', manageUrl: string|null} $rotation
     * @param 'reissued'|'replaced'|'detected'|'manual'|null $rotationMethod
     * @param 'false-positive'|'wont-fix'|'used-in-tests'|null $dismissedReason
     */
    public function __construct(
        public readonly string $id,
        public readonly string $status,
        public readonly string $scannerAccountId,
        public readonly string $scannerAccountName,
        public readonly string $scannerPluginId,
        public readonly string $tokenType,
        public readonly string $tokenTypeLabel,
        public readonly ?string $ownerPluginId,
        public readonly ?string $ownerPluginName,
        public readonly ?string $secretHint,
        public readonly ?string $repository,
        public readonly ?string $path,
        public readonly ?int $line,
        public readonly ?string $commitSha,
        public readonly ?string $url,
        public readonly string $upstreamState,
        public readonly ?string $upstreamResolution,
        public readonly ?string $validity,
        public readonly bool $publiclyLeaked,
        public readonly string $detectedAt,
        public readonly string $firstSeenAt,
        public readonly string $matchKind,
        public readonly string $matchConfidence,
        public readonly ?string $matchedAccountId,
        public readonly ?string $matchedAccountName,
        public readonly ?string $matchedResourceId,
        public readonly ?string $matchedResourceName,
        public readonly ?string $matchedResourceTypeId,
        public readonly ?string $matchedPluginId,
        public readonly ?string $matchedFieldKey,
        public readonly array $candidateAccountIds,
        public readonly array $rotation,
        public readonly ?string $rotatedAt,
        public readonly ?string $rotatedBy,
        public readonly ?string $rotationMethod,
        public readonly ?string $dismissedReason,
        public readonly ?string $dismissedComment,
        public readonly ?string $dismissedAt,
        public readonly ?string $dismissedBy,
        public readonly ?string $upstreamResolvedAt,
        public readonly ?string $upstreamResolveError,
        public readonly bool $canResolveUpstream,
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
            status: Coerce::toString($data['status'] ?? null),
            scannerAccountId: Coerce::toString($data['scannerAccountId'] ?? null),
            scannerAccountName: Coerce::toString($data['scannerAccountName'] ?? null),
            scannerPluginId: Coerce::toString($data['scannerPluginId'] ?? null),
            tokenType: Coerce::toString($data['tokenType'] ?? null),
            tokenTypeLabel: Coerce::toString($data['tokenTypeLabel'] ?? null),
            ownerPluginId: Coerce::toStringOrNull($data['ownerPluginId'] ?? null),
            ownerPluginName: Coerce::toStringOrNull($data['ownerPluginName'] ?? null),
            secretHint: Coerce::toStringOrNull($data['secretHint'] ?? null),
            repository: Coerce::toStringOrNull($data['repository'] ?? null),
            path: Coerce::toStringOrNull($data['path'] ?? null),
            line: Coerce::toIntOrNull($data['line'] ?? null),
            commitSha: Coerce::toStringOrNull($data['commitSha'] ?? null),
            url: Coerce::toStringOrNull($data['url'] ?? null),
            upstreamState: Coerce::toString($data['upstreamState'] ?? null),
            upstreamResolution: Coerce::toStringOrNull($data['upstreamResolution'] ?? null),
            validity: Coerce::toStringOrNull($data['validity'] ?? null),
            publiclyLeaked: Coerce::toBool($data['publiclyLeaked'] ?? null),
            detectedAt: Coerce::toString($data['detectedAt'] ?? null),
            firstSeenAt: Coerce::toString($data['firstSeenAt'] ?? null),
            matchKind: Coerce::toString($data['matchKind'] ?? null),
            matchConfidence: Coerce::toString($data['matchConfidence'] ?? null),
            matchedAccountId: Coerce::toStringOrNull($data['matchedAccountId'] ?? null),
            matchedAccountName: Coerce::toStringOrNull($data['matchedAccountName'] ?? null),
            matchedResourceId: Coerce::toStringOrNull($data['matchedResourceId'] ?? null),
            matchedResourceName: Coerce::toStringOrNull($data['matchedResourceName'] ?? null),
            matchedResourceTypeId: Coerce::toStringOrNull($data['matchedResourceTypeId'] ?? null),
            matchedPluginId: Coerce::toStringOrNull($data['matchedPluginId'] ?? null),
            matchedFieldKey: Coerce::toStringOrNull($data['matchedFieldKey'] ?? null),
            candidateAccountIds: Coerce::mapList($data['candidateAccountIds'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            rotation: Coerce::toArray($data['rotation'] ?? null),
            rotatedAt: Coerce::toStringOrNull($data['rotatedAt'] ?? null),
            rotatedBy: Coerce::toStringOrNull($data['rotatedBy'] ?? null),
            rotationMethod: Coerce::toStringOrNull($data['rotationMethod'] ?? null),
            dismissedReason: Coerce::toStringOrNull($data['dismissedReason'] ?? null),
            dismissedComment: Coerce::toStringOrNull($data['dismissedComment'] ?? null),
            dismissedAt: Coerce::toStringOrNull($data['dismissedAt'] ?? null),
            dismissedBy: Coerce::toStringOrNull($data['dismissedBy'] ?? null),
            upstreamResolvedAt: Coerce::toStringOrNull($data['upstreamResolvedAt'] ?? null),
            upstreamResolveError: Coerce::toStringOrNull($data['upstreamResolveError'] ?? null),
            canResolveUpstream: Coerce::toBool($data['canResolveUpstream'] ?? null),
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
            'status' => $this->status,
            'scannerAccountId' => $this->scannerAccountId,
            'scannerAccountName' => $this->scannerAccountName,
            'scannerPluginId' => $this->scannerPluginId,
            'tokenType' => $this->tokenType,
            'tokenTypeLabel' => $this->tokenTypeLabel,
            'ownerPluginId' => $this->ownerPluginId,
            'ownerPluginName' => $this->ownerPluginName,
            'secretHint' => $this->secretHint,
            'repository' => $this->repository,
            'path' => $this->path,
            'line' => $this->line,
            'commitSha' => $this->commitSha,
            'url' => $this->url,
            'upstreamState' => $this->upstreamState,
            'upstreamResolution' => $this->upstreamResolution,
            'validity' => $this->validity,
            'publiclyLeaked' => $this->publiclyLeaked,
            'detectedAt' => $this->detectedAt,
            'firstSeenAt' => $this->firstSeenAt,
            'matchKind' => $this->matchKind,
            'matchConfidence' => $this->matchConfidence,
            'matchedAccountId' => $this->matchedAccountId,
            'matchedAccountName' => $this->matchedAccountName,
            'matchedResourceId' => $this->matchedResourceId,
            'matchedResourceName' => $this->matchedResourceName,
            'matchedResourceTypeId' => $this->matchedResourceTypeId,
            'matchedPluginId' => $this->matchedPluginId,
            'matchedFieldKey' => $this->matchedFieldKey,
            'candidateAccountIds' => $this->candidateAccountIds,
            'rotation' => $this->rotation,
            'rotatedAt' => $this->rotatedAt,
            'rotatedBy' => $this->rotatedBy,
            'rotationMethod' => $this->rotationMethod,
            'dismissedReason' => $this->dismissedReason,
            'dismissedComment' => $this->dismissedComment,
            'dismissedAt' => $this->dismissedAt,
            'dismissedBy' => $this->dismissedBy,
            'upstreamResolvedAt' => $this->upstreamResolvedAt,
            'upstreamResolveError' => $this->upstreamResolveError,
            'canResolveUpstream' => $this->canResolveUpstream,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
