<?php

/*
 * infrawrench/sdk v1.10.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.10.0).
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

final class ConnectSecretExportRequest implements \JsonSerializable
{
    /** @param array<string, string> $keyOverrides */
    public function __construct(
        public readonly string $sourceAccountId,
        public readonly string $sourceResourceId,
        public readonly string $sourcePluginId,
        public readonly string $sourceResourceTypeId,
        public readonly string $targetAccountId,
        public readonly string $targetPluginId,
        public readonly string $templateId,
        public readonly string $namespace,
        public readonly string $secretName,
        public readonly array $keyOverrides,
        public readonly ?string $sourceExternalId = null,
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
            sourceAccountId: Coerce::toString($data['sourceAccountId'] ?? null),
            sourceResourceId: Coerce::toString($data['sourceResourceId'] ?? null),
            sourcePluginId: Coerce::toString($data['sourcePluginId'] ?? null),
            sourceResourceTypeId: Coerce::toString($data['sourceResourceTypeId'] ?? null),
            targetAccountId: Coerce::toString($data['targetAccountId'] ?? null),
            targetPluginId: Coerce::toString($data['targetPluginId'] ?? null),
            templateId: Coerce::toString($data['templateId'] ?? null),
            namespace: Coerce::toString($data['namespace'] ?? null),
            secretName: Coerce::toString($data['secretName'] ?? null),
            keyOverrides: Coerce::mapValues($data['keyOverrides'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            sourceExternalId: Coerce::toStringOrNull($data['sourceExternalId'] ?? null),
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
            'sourceAccountId' => $this->sourceAccountId,
            'sourceResourceId' => $this->sourceResourceId,
            'sourcePluginId' => $this->sourcePluginId,
            'sourceResourceTypeId' => $this->sourceResourceTypeId,
            'targetAccountId' => $this->targetAccountId,
            'targetPluginId' => $this->targetPluginId,
            'templateId' => $this->templateId,
            'namespace' => $this->namespace,
            'secretName' => $this->secretName,
            'keyOverrides' => $this->keyOverrides,
        ];
        if ($this->sourceExternalId !== null) {
            $payload['sourceExternalId'] = $this->sourceExternalId;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
