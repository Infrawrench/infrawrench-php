<?php

/*
 * infrawrench/sdk v1.0.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.0.0).
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

final class PinFull implements \JsonSerializable
{
    /**
     * @param array<string, mixed> $fieldsJson
     * @param array<string, mixed> $outputsJson
     */
    public function __construct(
        public readonly string $pinId,
        public readonly string $resourceId,
        public readonly int $gridX,
        public readonly int $gridY,
        public readonly int $gridW,
        public readonly int $gridH,
        public readonly string $displayName,
        public readonly string $pluginId,
        public readonly string $resourceTypeId,
        public readonly string $accountId,
        public readonly array $fieldsJson,
        public readonly array $outputsJson,
        public readonly string $pluginLogoSvg,
        public readonly string $pluginDisplayName,
        public readonly ProbeStatus $status,
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
            pinId: Coerce::toString($data['pinId'] ?? null),
            resourceId: Coerce::toString($data['resourceId'] ?? null),
            gridX: Coerce::toInt($data['gridX'] ?? null),
            gridY: Coerce::toInt($data['gridY'] ?? null),
            gridW: Coerce::toInt($data['gridW'] ?? null),
            gridH: Coerce::toInt($data['gridH'] ?? null),
            displayName: Coerce::toString($data['displayName'] ?? null),
            pluginId: Coerce::toString($data['pluginId'] ?? null),
            resourceTypeId: Coerce::toString($data['resourceTypeId'] ?? null),
            accountId: Coerce::toString($data['accountId'] ?? null),
            fieldsJson: Coerce::toArray($data['fieldsJson'] ?? null),
            outputsJson: Coerce::toArray($data['outputsJson'] ?? null),
            pluginLogoSvg: Coerce::toString($data['pluginLogoSvg'] ?? null),
            pluginDisplayName: Coerce::toString($data['pluginDisplayName'] ?? null),
            status: ProbeStatus::fromArray(Coerce::toArray($data['status'] ?? null)),
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
            'pinId' => $this->pinId,
            'resourceId' => $this->resourceId,
            'gridX' => $this->gridX,
            'gridY' => $this->gridY,
            'gridW' => $this->gridW,
            'gridH' => $this->gridH,
            'displayName' => $this->displayName,
            'pluginId' => $this->pluginId,
            'resourceTypeId' => $this->resourceTypeId,
            'accountId' => $this->accountId,
            'fieldsJson' => $this->fieldsJson,
            'outputsJson' => $this->outputsJson,
            'pluginLogoSvg' => $this->pluginLogoSvg,
            'pluginDisplayName' => $this->pluginDisplayName,
            'status' => $this->status->toArray(),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
