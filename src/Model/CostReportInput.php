<?php

/*
 * infrawrench/sdk v1.28.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.28.0).
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

final class CostReportInput implements \JsonSerializable
{
    /**
     * @param string|null $folderId Folder the report is filed under (see /cost-report-folders); null is the top level of the Reports list. Moving a report is this same PUT with a different folderId; an id from another org is a 400. Deleting a folder never deletes its reports — they fall back to the top level.
     */
    public function __construct(
        public readonly string $name,
        public readonly CostGraphConfig $config,
        public readonly ?string $description = null,
        public readonly ?string $folderId = null,
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
            config: CostGraphConfig::fromArray(Coerce::toArray($data['config'] ?? null)),
            description: Coerce::toStringOrNull($data['description'] ?? null),
            folderId: Coerce::toStringOrNull($data['folderId'] ?? null),
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
            'config' => $this->config->toArray(),
        ];
        if ($this->description !== null) {
            $payload['description'] = $this->description;
        }
        if ($this->folderId !== null) {
            $payload['folderId'] = $this->folderId;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
