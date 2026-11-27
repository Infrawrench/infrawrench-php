<?php

/*
 * infrawrench/sdk v1.135.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.135.0).
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

final class OffboardingCandidate implements \JsonSerializable
{
    /**
     * @param string $kind What the row is: their Infrawrench membership, API key or SSH key; a cloud principal (an IAM user, a membership, a personal key); a paid seat; another synced resource that names them or that they own; an on-call rotation or a cover they have not served; a lease they set; a just-in-time grant they hold.
     * @param 'exact'|'alias'|'possible' $confidence `exact`: their email. `alias`: a handle or address listed on the offboarding. `possible`: something weaker (the part of the email before the `@`, the same name at another domain, their full name) that a person has to confirm before any action is offered.
     * @param list<OffboardingActionId::*> $actions
     */
    public function __construct(
        public readonly string $key,
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
        public readonly array $actions,
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
            key: Coerce::toString($data['key'] ?? null),
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
            actions: Coerce::mapList($data['actions'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
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
            'key' => $this->key,
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
            'actions' => $this->actions,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
