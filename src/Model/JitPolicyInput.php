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

final class JitPolicyInput implements \JsonSerializable
{
    /**
     * @param list<JitPolicyTarget> $targets
     * @param list<string>|null $requesterUserIds
     * @param list<string>|null $requesterRoleIds
     * @param list<string>|null $approverUserIds
     * @param list<string>|null $approverRoleIds
     * @param list<string>|null $approverOnCallScheduleIds
     */
    public function __construct(
        public readonly string $name,
        public readonly string $accountId,
        public readonly array $targets,
        public readonly int $maxDurationMinutes,
        public readonly ?string $description = null,
        public readonly ?bool $enabled = null,
        public readonly ?int $defaultDurationMinutes = null,
        public readonly ?int $requestTimeoutMinutes = null,
        public readonly ?array $requesterUserIds = null,
        public readonly ?array $requesterRoleIds = null,
        public readonly ?array $approverUserIds = null,
        public readonly ?array $approverRoleIds = null,
        public readonly ?array $approverOnCallScheduleIds = null,
        public readonly ?bool $allowSelfApprovalDuringIncident = null,
        public readonly ?bool $requireReason = null,
        public readonly ?bool $requireTicket = null,
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
            name: Coerce::toString($data['name'] ?? null),
            accountId: Coerce::toString($data['accountId'] ?? null),
            targets: Coerce::mapList($data['targets'] ?? null, static fn (mixed $item): JitPolicyTarget => JitPolicyTarget::fromArray(Coerce::toArray($item))),
            maxDurationMinutes: Coerce::toInt($data['maxDurationMinutes'] ?? null),
            description: Coerce::toStringOrNull($data['description'] ?? null),
            enabled: Coerce::toBoolOrNull($data['enabled'] ?? null),
            defaultDurationMinutes: Coerce::toIntOrNull($data['defaultDurationMinutes'] ?? null),
            requestTimeoutMinutes: Coerce::toIntOrNull($data['requestTimeoutMinutes'] ?? null),
            requesterUserIds: Coerce::nullable($data['requesterUserIds'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            requesterRoleIds: Coerce::nullable($data['requesterRoleIds'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            approverUserIds: Coerce::nullable($data['approverUserIds'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            approverRoleIds: Coerce::nullable($data['approverRoleIds'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            approverOnCallScheduleIds: Coerce::nullable($data['approverOnCallScheduleIds'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            allowSelfApprovalDuringIncident: Coerce::toBoolOrNull($data['allowSelfApprovalDuringIncident'] ?? null),
            requireReason: Coerce::toBoolOrNull($data['requireReason'] ?? null),
            requireTicket: Coerce::toBoolOrNull($data['requireTicket'] ?? null),
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
            'name' => $this->name,
            'accountId' => $this->accountId,
            'targets' => array_map(static fn (JitPolicyTarget $item): array => $item->toArray(), $this->targets),
            'maxDurationMinutes' => $this->maxDurationMinutes,
        ];
        if ($this->description !== null) {
            $payload['description'] = $this->description;
        }
        if ($this->enabled !== null) {
            $payload['enabled'] = $this->enabled;
        }
        if ($this->defaultDurationMinutes !== null) {
            $payload['defaultDurationMinutes'] = $this->defaultDurationMinutes;
        }
        if ($this->requestTimeoutMinutes !== null) {
            $payload['requestTimeoutMinutes'] = $this->requestTimeoutMinutes;
        }
        if ($this->requesterUserIds !== null) {
            $payload['requesterUserIds'] = $this->requesterUserIds;
        }
        if ($this->requesterRoleIds !== null) {
            $payload['requesterRoleIds'] = $this->requesterRoleIds;
        }
        if ($this->approverUserIds !== null) {
            $payload['approverUserIds'] = $this->approverUserIds;
        }
        if ($this->approverRoleIds !== null) {
            $payload['approverRoleIds'] = $this->approverRoleIds;
        }
        if ($this->approverOnCallScheduleIds !== null) {
            $payload['approverOnCallScheduleIds'] = $this->approverOnCallScheduleIds;
        }
        if ($this->allowSelfApprovalDuringIncident !== null) {
            $payload['allowSelfApprovalDuringIncident'] = $this->allowSelfApprovalDuringIncident;
        }
        if ($this->requireReason !== null) {
            $payload['requireReason'] = $this->requireReason;
        }
        if ($this->requireTicket !== null) {
            $payload['requireTicket'] = $this->requireTicket;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
