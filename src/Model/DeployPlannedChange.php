<?php

/*
 * infrawrench/sdk v0.35.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.35.0).
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

final class DeployPlannedChange implements \JsonSerializable
{
    /**
     * @param 'create'|'update'|'delete' $action
     * @param array<string, string>|null $fields
     * @param array{pluginId: string, parentResourceId: string}|null $sidecar
     */
    public function __construct(
        public readonly string $action,
        public readonly string $accountId,
        public readonly string $resourceTypeId,
        public readonly string $displayName,
        public readonly ?string $resourceId = null,
        public readonly ?array $fields = null,
        public readonly ?array $sidecar = null,
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
            action: Coerce::toString($data['action'] ?? null),
            accountId: Coerce::toString($data['accountId'] ?? null),
            resourceTypeId: Coerce::toString($data['resourceTypeId'] ?? null),
            displayName: Coerce::toString($data['displayName'] ?? null),
            resourceId: Coerce::toStringOrNull($data['resourceId'] ?? null),
            fields: Coerce::nullable($data['fields'] ?? null, static fn (mixed $value): array => Coerce::mapValues($value, static fn (mixed $item): string => Coerce::toString($item))),
            sidecar: Coerce::toArrayOrNull($data['sidecar'] ?? null),
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
            'action' => $this->action,
            'accountId' => $this->accountId,
            'resourceTypeId' => $this->resourceTypeId,
            'displayName' => $this->displayName,
        ];
        if ($this->resourceId !== null) {
            $payload['resourceId'] = $this->resourceId;
        }
        if ($this->fields !== null) {
            $payload['fields'] = $this->fields;
        }
        if ($this->sidecar !== null) {
            $payload['sidecar'] = $this->sidecar;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
