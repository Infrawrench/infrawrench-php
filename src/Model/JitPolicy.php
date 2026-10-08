<?php

/*
 * infrawrench/sdk v1.77.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.77.0).
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

final class JitPolicy implements \JsonSerializable
{
    /**
     * @param list<JitPolicyTarget> $targets
     * @param list<string> $requesterUserIds Who may ask. Empty (with requesterRoleIds) means any member with access:request.
     * @param list<string> $requesterRoleIds
     * @param list<string> $approverUserIds
     * @param list<string> $approverRoleIds
     * @param list<string> $approverOnCallScheduleIds Rotations whose current on-call person may approve.
     * @param bool|null $canRequest Caller-relative: whether the caller may ask under this policy.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly ?string $description,
        public readonly bool $enabled,
        public readonly string $accountId,
        public readonly ?string $accountName,
        public readonly string $pluginId,
        public readonly array $targets,
        public readonly int $maxDurationMinutes,
        public readonly int $defaultDurationMinutes,
        public readonly int $requestTimeoutMinutes,
        public readonly array $requesterUserIds,
        public readonly array $requesterRoleIds,
        public readonly array $approverUserIds,
        public readonly array $approverRoleIds,
        public readonly array $approverOnCallScheduleIds,
        public readonly bool $allowSelfApprovalDuringIncident,
        public readonly bool $requireReason,
        public readonly bool $requireTicket,
        public readonly string $createdAt,
        public readonly string $updatedAt,
        public readonly ?JitProviderLabels $labels = null,
        public readonly ?bool $canRequest = null,
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
            name: Coerce::toString($data['name'] ?? null),
            description: Coerce::toStringOrNull($data['description'] ?? null),
            enabled: Coerce::toBool($data['enabled'] ?? null),
            accountId: Coerce::toString($data['accountId'] ?? null),
            accountName: Coerce::toStringOrNull($data['accountName'] ?? null),
            pluginId: Coerce::toString($data['pluginId'] ?? null),
            targets: Coerce::mapList($data['targets'] ?? null, static fn (mixed $item): JitPolicyTarget => JitPolicyTarget::fromArray(Coerce::toArray($item))),
            maxDurationMinutes: Coerce::toInt($data['maxDurationMinutes'] ?? null),
            defaultDurationMinutes: Coerce::toInt($data['defaultDurationMinutes'] ?? null),
            requestTimeoutMinutes: Coerce::toInt($data['requestTimeoutMinutes'] ?? null),
            requesterUserIds: Coerce::mapList($data['requesterUserIds'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            requesterRoleIds: Coerce::mapList($data['requesterRoleIds'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            approverUserIds: Coerce::mapList($data['approverUserIds'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            approverRoleIds: Coerce::mapList($data['approverRoleIds'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            approverOnCallScheduleIds: Coerce::mapList($data['approverOnCallScheduleIds'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            allowSelfApprovalDuringIncident: Coerce::toBool($data['allowSelfApprovalDuringIncident'] ?? null),
            requireReason: Coerce::toBool($data['requireReason'] ?? null),
            requireTicket: Coerce::toBool($data['requireTicket'] ?? null),
            createdAt: Coerce::toString($data['createdAt'] ?? null),
            updatedAt: Coerce::toString($data['updatedAt'] ?? null),
            labels: Coerce::nullable($data['labels'] ?? null, static fn (mixed $value): JitProviderLabels => JitProviderLabels::fromArray(Coerce::toArray($value))),
            canRequest: Coerce::toBoolOrNull($data['canRequest'] ?? null),
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
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'enabled' => $this->enabled,
            'accountId' => $this->accountId,
            'accountName' => $this->accountName,
            'pluginId' => $this->pluginId,
            'targets' => array_map(static fn (JitPolicyTarget $item): array => $item->toArray(), $this->targets),
            'maxDurationMinutes' => $this->maxDurationMinutes,
            'defaultDurationMinutes' => $this->defaultDurationMinutes,
            'requestTimeoutMinutes' => $this->requestTimeoutMinutes,
            'requesterUserIds' => $this->requesterUserIds,
            'requesterRoleIds' => $this->requesterRoleIds,
            'approverUserIds' => $this->approverUserIds,
            'approverRoleIds' => $this->approverRoleIds,
            'approverOnCallScheduleIds' => $this->approverOnCallScheduleIds,
            'allowSelfApprovalDuringIncident' => $this->allowSelfApprovalDuringIncident,
            'requireReason' => $this->requireReason,
            'requireTicket' => $this->requireTicket,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
        ];
        if ($this->labels !== null) {
            $payload['labels'] = $this->labels?->toArray();
        }
        if ($this->canRequest !== null) {
            $payload['canRequest'] = $this->canRequest;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
