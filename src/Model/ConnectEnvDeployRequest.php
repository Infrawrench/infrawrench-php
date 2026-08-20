<?php

/*
 * infrawrench/sdk v1.34.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.34.0).
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

final class ConnectEnvDeployRequest implements \JsonSerializable
{
    /**
     * @param array<string, string> $keyOverrides
     * @param 'dotenv'|'profile' $format
     */
    public function __construct(
        public readonly string $sourceAccountId,
        public readonly string $sourceResourceId,
        public readonly string $sourcePluginId,
        public readonly string $sourceResourceTypeId,
        public readonly string $targetSshHost,
        public readonly string $sshKeyId,
        public readonly string $sshUsername,
        public readonly string $templateId,
        public readonly array $keyOverrides,
        public readonly string $format,
        public readonly string $filePath,
        public readonly bool $append,
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
            targetSshHost: Coerce::toString($data['targetSshHost'] ?? null),
            sshKeyId: Coerce::toString($data['sshKeyId'] ?? null),
            sshUsername: Coerce::toString($data['sshUsername'] ?? null),
            templateId: Coerce::toString($data['templateId'] ?? null),
            keyOverrides: Coerce::mapValues($data['keyOverrides'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            format: Coerce::toString($data['format'] ?? null),
            filePath: Coerce::toString($data['filePath'] ?? null),
            append: Coerce::toBool($data['append'] ?? null),
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
            'targetSshHost' => $this->targetSshHost,
            'sshKeyId' => $this->sshKeyId,
            'sshUsername' => $this->sshUsername,
            'templateId' => $this->templateId,
            'keyOverrides' => $this->keyOverrides,
            'format' => $this->format,
            'filePath' => $this->filePath,
            'append' => $this->append,
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
