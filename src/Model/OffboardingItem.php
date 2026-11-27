<?php

/*
 * infrawrench/sdk v1.136.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.136.0).
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

final class OffboardingItem implements \JsonSerializable
{
    /**
     * @param string $kind What the row is: their Infrawrench membership, API key or SSH key; a cloud principal (an IAM user, a membership, a personal key); a paid seat; another synced resource that names them or that they own; an on-call rotation or a cover they have not served; a lease they set; a just-in-time grant they hold.
     * @param string|null $providerName Provider display name; null for Infrawrench's own records.
     * @param 'exact'|'alias'|'possible' $confidence `exact`: their email. `alias`: a handle or address listed on the offboarding. `possible`: something weaker (the part of the email before the `@`, the same name at another domain, their full name) that a person has to confirm before any action is offered.
     * @param string $matchReason Why the sweep thinks this is theirs.
     * @param 'matched'|'unconfirmed'|'confirmed'|'rejected' $matchState `unconfirmed` possible matches offer no action; `rejected` rows (not them) leave the checklist's progress but stay in the export.
     * @param list<OffboardingActionId::*> $actions What can be done from Infrawrench. Empty: do it in the provider, then mark the row done.
     * @param 'open'|'done'|'skipped'|'failed'|'gone' $status `gone` means a later scan no longer found the row: removed outside Infrawrench, or no longer reported by the provider.
     * @param string|null $resolution The action that resolved the row, `"manual"`, or `"gone"`.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $kind,
        public readonly string $title,
        public readonly ?string $detail,
        public readonly ?string $pluginId,
        public readonly ?string $providerName,
        public readonly ?string $accountId,
        public readonly ?string $accountName,
        public readonly ?string $resourceId,
        public readonly ?string $resourceTypeId,
        public readonly string $confidence,
        public readonly string $matchReason,
        public readonly string $matchState,
        public readonly array $actions,
        public readonly string $status,
        public readonly ?string $resolution,
        public readonly ?string $lastError,
        public readonly ?string $note,
        public readonly ?string $resolvedByName,
        public readonly ?string $resolvedAt,
        public readonly string $firstSeenAt,
        public readonly string $lastSeenAt,
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
            kind: Coerce::toString($data['kind'] ?? null),
            title: Coerce::toString($data['title'] ?? null),
            detail: Coerce::toStringOrNull($data['detail'] ?? null),
            pluginId: Coerce::toStringOrNull($data['pluginId'] ?? null),
            providerName: Coerce::toStringOrNull($data['providerName'] ?? null),
            accountId: Coerce::toStringOrNull($data['accountId'] ?? null),
            accountName: Coerce::toStringOrNull($data['accountName'] ?? null),
            resourceId: Coerce::toStringOrNull($data['resourceId'] ?? null),
            resourceTypeId: Coerce::toStringOrNull($data['resourceTypeId'] ?? null),
            confidence: Coerce::toString($data['confidence'] ?? null),
            matchReason: Coerce::toString($data['matchReason'] ?? null),
            matchState: Coerce::toString($data['matchState'] ?? null),
            actions: Coerce::mapList($data['actions'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            status: Coerce::toString($data['status'] ?? null),
            resolution: Coerce::toStringOrNull($data['resolution'] ?? null),
            lastError: Coerce::toStringOrNull($data['lastError'] ?? null),
            note: Coerce::toStringOrNull($data['note'] ?? null),
            resolvedByName: Coerce::toStringOrNull($data['resolvedByName'] ?? null),
            resolvedAt: Coerce::toStringOrNull($data['resolvedAt'] ?? null),
            firstSeenAt: Coerce::toString($data['firstSeenAt'] ?? null),
            lastSeenAt: Coerce::toString($data['lastSeenAt'] ?? null),
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
            'kind' => $this->kind,
            'title' => $this->title,
            'detail' => $this->detail,
            'pluginId' => $this->pluginId,
            'providerName' => $this->providerName,
            'accountId' => $this->accountId,
            'accountName' => $this->accountName,
            'resourceId' => $this->resourceId,
            'resourceTypeId' => $this->resourceTypeId,
            'confidence' => $this->confidence,
            'matchReason' => $this->matchReason,
            'matchState' => $this->matchState,
            'actions' => $this->actions,
            'status' => $this->status,
            'resolution' => $this->resolution,
            'lastError' => $this->lastError,
            'note' => $this->note,
            'resolvedByName' => $this->resolvedByName,
            'resolvedAt' => $this->resolvedAt,
            'firstSeenAt' => $this->firstSeenAt,
            'lastSeenAt' => $this->lastSeenAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
