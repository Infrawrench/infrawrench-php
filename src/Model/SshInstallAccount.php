<?php

/*
 * infrawrench/sdk v1.44.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.44.0).
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

final class SshInstallAccount implements \JsonSerializable
{
    public function __construct(
        public readonly string $accountId,
        public readonly string $displayName,
        public readonly string $pluginId,
        public readonly string $serviceName,
        public readonly string $description,
        public readonly ?string $logoSvg = null,
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
            displayName: Coerce::toString($data['displayName'] ?? null),
            pluginId: Coerce::toString($data['pluginId'] ?? null),
            serviceName: Coerce::toString($data['serviceName'] ?? null),
            description: Coerce::toString($data['description'] ?? null),
            logoSvg: Coerce::toStringOrNull($data['logoSvg'] ?? null),
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
            'displayName' => $this->displayName,
            'pluginId' => $this->pluginId,
            'serviceName' => $this->serviceName,
            'description' => $this->description,
        ];
        if ($this->logoSvg !== null) {
            $payload['logoSvg'] = $this->logoSvg;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
