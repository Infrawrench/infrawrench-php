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

final class Runbook implements \JsonSerializable
{
    /**
     * @param list<RunbookStep> $steps
     * @param list<string> $resourceTypeIds Resource types this runbook is about; empty means it is not scoped to a type. Used to answer 'which runbooks apply here', **never** to restrict who may open it — a runbook nobody can find is the failure this feature exists to fix.
     * @param string|null $tagKey Optional tag narrowing. Matched case-insensitively.
     * @param string|null $tagValue Required value of `tagKey`, matched exactly.
     * @param bool $enabled Off keeps the row and hides it from the 'what applies here' lookup. Retiring a runbook must not cost you the history of the runs performed against it.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly ?string $description,
        public readonly array $steps,
        public readonly array $resourceTypeIds,
        public readonly ?string $tagKey,
        public readonly ?string $tagValue,
        public readonly bool $enabled,
        public readonly ?string $createdByUserId,
        public readonly ?string $createdByName,
        public readonly string $createdAt,
        public readonly string $updatedAt,
        public readonly int $runCount,
        public readonly ?string $lastRunAt,
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
            name: Coerce::toString($data['name'] ?? null),
            description: Coerce::toStringOrNull($data['description'] ?? null),
            steps: Coerce::mapList($data['steps'] ?? null, static fn (mixed $item): RunbookStep => RunbookStep::fromArray(Coerce::toArray($item))),
            resourceTypeIds: Coerce::mapList($data['resourceTypeIds'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            tagKey: Coerce::toStringOrNull($data['tagKey'] ?? null),
            tagValue: Coerce::toStringOrNull($data['tagValue'] ?? null),
            enabled: Coerce::toBool($data['enabled'] ?? null),
            createdByUserId: Coerce::toStringOrNull($data['createdByUserId'] ?? null),
            createdByName: Coerce::toStringOrNull($data['createdByName'] ?? null),
            createdAt: Coerce::toString($data['createdAt'] ?? null),
            updatedAt: Coerce::toString($data['updatedAt'] ?? null),
            runCount: Coerce::toInt($data['runCount'] ?? null),
            lastRunAt: Coerce::toStringOrNull($data['lastRunAt'] ?? null),
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
            'name' => $this->name,
            'description' => $this->description,
            'steps' => array_map(static fn (RunbookStep $item): array => $item->toArray(), $this->steps),
            'resourceTypeIds' => $this->resourceTypeIds,
            'tagKey' => $this->tagKey,
            'tagValue' => $this->tagValue,
            'enabled' => $this->enabled,
            'createdByUserId' => $this->createdByUserId,
            'createdByName' => $this->createdByName,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
            'runCount' => $this->runCount,
            'lastRunAt' => $this->lastRunAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
