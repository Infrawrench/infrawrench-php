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

final class ResourceTypeSummary implements \JsonSerializable
{
    /**
     * @param list<array{pluginId: string, resourceTypeId: string, matchField?: string, verb?: string}>|null $attachTargets
     * @param bool|null $schedulable The type declares lifecycle start/stop actions, so its resources can carry a sleep/wake schedule.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $displayName,
        public readonly bool $supportsCreate,
        public readonly ?string $pluralDisplayName = null,
        public readonly ?string $parentTypeId = null,
        public readonly ?array $attachTargets = null,
        public readonly ?bool $isSshHost = null,
        public readonly ?bool $sshTunnelAttachSource = null,
        public readonly ?bool $showInSidebar = null,
        public readonly ?bool $accountRoot = null,
        public readonly ?bool $schedulable = null,
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
            displayName: Coerce::toString($data['displayName'] ?? null),
            supportsCreate: Coerce::toBool($data['supportsCreate'] ?? null),
            pluralDisplayName: Coerce::toStringOrNull($data['pluralDisplayName'] ?? null),
            parentTypeId: Coerce::toStringOrNull($data['parentTypeId'] ?? null),
            attachTargets: Coerce::nullable($data['attachTargets'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): array => Coerce::toArray($item))),
            isSshHost: Coerce::toBoolOrNull($data['isSshHost'] ?? null),
            sshTunnelAttachSource: Coerce::toBoolOrNull($data['sshTunnelAttachSource'] ?? null),
            showInSidebar: Coerce::toBoolOrNull($data['showInSidebar'] ?? null),
            accountRoot: Coerce::toBoolOrNull($data['accountRoot'] ?? null),
            schedulable: Coerce::toBoolOrNull($data['schedulable'] ?? null),
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
            'displayName' => $this->displayName,
            'supportsCreate' => $this->supportsCreate,
        ];
        if ($this->pluralDisplayName !== null) {
            $payload['pluralDisplayName'] = $this->pluralDisplayName;
        }
        if ($this->parentTypeId !== null) {
            $payload['parentTypeId'] = $this->parentTypeId;
        }
        if ($this->attachTargets !== null) {
            $payload['attachTargets'] = $this->attachTargets;
        }
        if ($this->isSshHost !== null) {
            $payload['isSshHost'] = $this->isSshHost;
        }
        if ($this->sshTunnelAttachSource !== null) {
            $payload['sshTunnelAttachSource'] = $this->sshTunnelAttachSource;
        }
        if ($this->showInSidebar !== null) {
            $payload['showInSidebar'] = $this->showInSidebar;
        }
        if ($this->accountRoot !== null) {
            $payload['accountRoot'] = $this->accountRoot;
        }
        if ($this->schedulable !== null) {
            $payload['schedulable'] = $this->schedulable;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
