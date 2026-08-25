<?php

/*
 * infrawrench/sdk v1.35.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.35.0).
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

final class EnvironmentTemplateMember implements \JsonSerializable
{
    /**
     * @param string $key Unique within the template; the id references are written against.
     * @param PluginId::* $pluginId
     * @param array<string, array{kind: 'literal', value: string}|array{kind: 'parameter', parameter: string}|array{kind: 'output', member: string, outputKey: string}|array{kind: 'member-id', member: string}> $fields
     * @param string|null $nameFieldKey The create-form field carrying the resource's name, detected at capture by matching the captured value against the source's display name. The instance name prefix is applied to this field and no other.
     */
    public function __construct(
        public readonly string $key,
        public readonly string $pluginId,
        public readonly string $resourceTypeId,
        public readonly string $accountId,
        public readonly string $sourceName,
        public readonly array $fields,
        public readonly ?string $sourceResourceId = null,
        public readonly ?string $nameFieldKey = null,
        public readonly ?string $parentMember = null,
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
            pluginId: Coerce::toString($data['pluginId'] ?? null),
            resourceTypeId: Coerce::toString($data['resourceTypeId'] ?? null),
            accountId: Coerce::toString($data['accountId'] ?? null),
            sourceName: Coerce::toString($data['sourceName'] ?? null),
            fields: Coerce::toArray($data['fields'] ?? null),
            sourceResourceId: Coerce::toStringOrNull($data['sourceResourceId'] ?? null),
            nameFieldKey: Coerce::toStringOrNull($data['nameFieldKey'] ?? null),
            parentMember: Coerce::toStringOrNull($data['parentMember'] ?? null),
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
            'key' => $this->key,
            'pluginId' => $this->pluginId,
            'resourceTypeId' => $this->resourceTypeId,
            'accountId' => $this->accountId,
            'sourceName' => $this->sourceName,
            'fields' => $this->fields,
        ];
        if ($this->sourceResourceId !== null) {
            $payload['sourceResourceId'] = $this->sourceResourceId;
        }
        if ($this->nameFieldKey !== null) {
            $payload['nameFieldKey'] = $this->nameFieldKey;
        }
        if ($this->parentMember !== null) {
            $payload['parentMember'] = $this->parentMember;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
