<?php

/*
 * infrawrench/sdk v0.37.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.37.0).
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

final class AgentVmAccount implements \JsonSerializable
{
    /**
     * @param array<string, string> $defaultFields
     * @param list<string> $hiddenFieldKeys
     * @param array<string, string>|null $defaultFieldLabels
     * @param list<array<string, mixed>>|null $createFields
     */
    public function __construct(
        public readonly string $accountId,
        public readonly string $accountName,
        public readonly string $pluginId,
        public readonly string $pluginName,
        public readonly string $resourceTypeId,
        public readonly string $resourceTypeName,
        public readonly string $defaultUsername,
        public readonly array $defaultFields,
        public readonly array $hiddenFieldKeys,
        public readonly ?string $pluginLogoSvg = null,
        public readonly ?array $defaultFieldLabels = null,
        public readonly ?array $createFields = null,
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
            accountId: Coerce::toString($data['accountId'] ?? null),
            accountName: Coerce::toString($data['accountName'] ?? null),
            pluginId: Coerce::toString($data['pluginId'] ?? null),
            pluginName: Coerce::toString($data['pluginName'] ?? null),
            resourceTypeId: Coerce::toString($data['resourceTypeId'] ?? null),
            resourceTypeName: Coerce::toString($data['resourceTypeName'] ?? null),
            defaultUsername: Coerce::toString($data['defaultUsername'] ?? null),
            defaultFields: Coerce::mapValues($data['defaultFields'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            hiddenFieldKeys: Coerce::mapList($data['hiddenFieldKeys'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            pluginLogoSvg: Coerce::toStringOrNull($data['pluginLogoSvg'] ?? null),
            defaultFieldLabels: Coerce::nullable($data['defaultFieldLabels'] ?? null, static fn (mixed $value): array => Coerce::mapValues($value, static fn (mixed $item): string => Coerce::toString($item))),
            createFields: Coerce::nullable($data['createFields'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): array => Coerce::toArray($item))),
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
            'accountId' => $this->accountId,
            'accountName' => $this->accountName,
            'pluginId' => $this->pluginId,
            'pluginName' => $this->pluginName,
            'resourceTypeId' => $this->resourceTypeId,
            'resourceTypeName' => $this->resourceTypeName,
            'defaultUsername' => $this->defaultUsername,
            'defaultFields' => $this->defaultFields,
            'hiddenFieldKeys' => $this->hiddenFieldKeys,
        ];
        if ($this->pluginLogoSvg !== null) {
            $payload['pluginLogoSvg'] = $this->pluginLogoSvg;
        }
        if ($this->defaultFieldLabels !== null) {
            $payload['defaultFieldLabels'] = $this->defaultFieldLabels;
        }
        if ($this->createFields !== null) {
            $payload['createFields'] = $this->createFields;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
