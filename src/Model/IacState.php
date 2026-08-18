<?php

/*
 * infrawrench/sdk v1.29.1 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.29.1).
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

final class IacState implements \JsonSerializable
{
    /**
     * @param string $label User-supplied name for this state, e.g. "prod / us-east-1".
     * @param string|null $accountId The account this state covers, or null when it covers the whole organization.
     * @param 'tfstate'|'show-json' $format Which document shape was uploaded: a raw state file, or `terraform show -json`.
     * @param string $formatVersion The document's own version — "4" for a state file, "1.0"-style otherwise.
     * @param int|null $serial State file serial; null for show output.
     * @param string|null $lineage State file lineage; null for show output.
     * @param int $resourceCount Managed resource instances recorded.
     * @param int $dataSourceCount Data-source entries, recorded but never matched against inventory.
     * @param int $redactedAttributeCount Attribute values dropped because the state marked them sensitive. Redaction happens at parse time — no sensitive value is ever stored.
     * @param list<string> $parseWarnings
     */
    public function __construct(
        public readonly string $id,
        public readonly string $label,
        public readonly ?string $accountId,
        public readonly ?string $accountName,
        public readonly string $format,
        public readonly string $formatVersion,
        public readonly ?string $terraformVersion,
        public readonly ?int $serial,
        public readonly ?string $lineage,
        public readonly int $resourceCount,
        public readonly int $dataSourceCount,
        public readonly int $redactedAttributeCount,
        public readonly array $parseWarnings,
        public readonly ?string $uploadedByUserId,
        public readonly ?string $uploadedByName,
        public readonly string $createdAt,
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
            label: Coerce::toString($data['label'] ?? null),
            accountId: Coerce::toStringOrNull($data['accountId'] ?? null),
            accountName: Coerce::toStringOrNull($data['accountName'] ?? null),
            format: Coerce::toString($data['format'] ?? null),
            formatVersion: Coerce::toString($data['formatVersion'] ?? null),
            terraformVersion: Coerce::toStringOrNull($data['terraformVersion'] ?? null),
            serial: Coerce::toIntOrNull($data['serial'] ?? null),
            lineage: Coerce::toStringOrNull($data['lineage'] ?? null),
            resourceCount: Coerce::toInt($data['resourceCount'] ?? null),
            dataSourceCount: Coerce::toInt($data['dataSourceCount'] ?? null),
            redactedAttributeCount: Coerce::toInt($data['redactedAttributeCount'] ?? null),
            parseWarnings: Coerce::mapList($data['parseWarnings'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            uploadedByUserId: Coerce::toStringOrNull($data['uploadedByUserId'] ?? null),
            uploadedByName: Coerce::toStringOrNull($data['uploadedByName'] ?? null),
            createdAt: Coerce::toString($data['createdAt'] ?? null),
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
            'id' => $this->id,
            'label' => $this->label,
            'accountId' => $this->accountId,
            'accountName' => $this->accountName,
            'format' => $this->format,
            'formatVersion' => $this->formatVersion,
            'terraformVersion' => $this->terraformVersion,
            'serial' => $this->serial,
            'lineage' => $this->lineage,
            'resourceCount' => $this->resourceCount,
            'dataSourceCount' => $this->dataSourceCount,
            'redactedAttributeCount' => $this->redactedAttributeCount,
            'parseWarnings' => $this->parseWarnings,
            'uploadedByUserId' => $this->uploadedByUserId,
            'uploadedByName' => $this->uploadedByName,
            'createdAt' => $this->createdAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
