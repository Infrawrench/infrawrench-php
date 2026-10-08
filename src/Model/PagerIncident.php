<?php

/*
 * infrawrench/sdk v1.79.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.79.0).
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

final class PagerIncident implements \JsonSerializable
{
    /**
     * @param string $id Infrawrench's id for the mirrored incident.
     * @param 'triggered'|'acknowledged'|'resolved' $status
     * @param list<array{name: string|null, email: string|null}> $assignees
     * @param bool $fromInfrawrench True when an Infrawrench alert opened this incident.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $accountId,
        public readonly string $accountName,
        public readonly string $pluginId,
        public readonly string $externalId,
        public readonly ?string $reference,
        public readonly string $title,
        public readonly string $status,
        public readonly ?string $statusLabel,
        public readonly ?string $urgency,
        public readonly ?string $url,
        public readonly ?string $serviceName,
        public readonly array $assignees,
        public readonly string $createdAt,
        public readonly ?string $updatedAt,
        public readonly ?string $resolvedAt,
        public readonly bool $fromInfrawrench,
        public readonly bool $canAcknowledge,
        public readonly bool $canResolve,
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
            accountId: Coerce::toString($data['accountId'] ?? null),
            accountName: Coerce::toString($data['accountName'] ?? null),
            pluginId: Coerce::toString($data['pluginId'] ?? null),
            externalId: Coerce::toString($data['externalId'] ?? null),
            reference: Coerce::toStringOrNull($data['reference'] ?? null),
            title: Coerce::toString($data['title'] ?? null),
            status: Coerce::toString($data['status'] ?? null),
            statusLabel: Coerce::toStringOrNull($data['statusLabel'] ?? null),
            urgency: Coerce::toStringOrNull($data['urgency'] ?? null),
            url: Coerce::toStringOrNull($data['url'] ?? null),
            serviceName: Coerce::toStringOrNull($data['serviceName'] ?? null),
            assignees: Coerce::mapList($data['assignees'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            createdAt: Coerce::toString($data['createdAt'] ?? null),
            updatedAt: Coerce::toStringOrNull($data['updatedAt'] ?? null),
            resolvedAt: Coerce::toStringOrNull($data['resolvedAt'] ?? null),
            fromInfrawrench: Coerce::toBool($data['fromInfrawrench'] ?? null),
            canAcknowledge: Coerce::toBool($data['canAcknowledge'] ?? null),
            canResolve: Coerce::toBool($data['canResolve'] ?? null),
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
            'accountId' => $this->accountId,
            'accountName' => $this->accountName,
            'pluginId' => $this->pluginId,
            'externalId' => $this->externalId,
            'reference' => $this->reference,
            'title' => $this->title,
            'status' => $this->status,
            'statusLabel' => $this->statusLabel,
            'urgency' => $this->urgency,
            'url' => $this->url,
            'serviceName' => $this->serviceName,
            'assignees' => $this->assignees,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
            'resolvedAt' => $this->resolvedAt,
            'fromInfrawrench' => $this->fromInfrawrench,
            'canAcknowledge' => $this->canAcknowledge,
            'canResolve' => $this->canResolve,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
