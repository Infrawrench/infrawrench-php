<?php

/*
 * infrawrench/sdk v1.85.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.85.0).
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

final class ComplianceControlRow implements \JsonSerializable
{
    /**
     * @param string $title Short paraphrase of the control, not the framework's own text.
     * @param list<string> $sources
     * @param 'evidence'|'gaps'|'not-applicable' $status `evidence`: at least one mapped source has evidence and none shows a gap. `gaps`: a source shows a gap, or no mapped source produced evidence. `not-applicable`: the org said so, with a justification.
     * @param list<string> $reasons
     * @param list<string> $missingSources
     */
    public function __construct(
        public readonly string $id,
        public readonly string $title,
        public readonly string $group,
        public readonly array $sources,
        public readonly string $status,
        public readonly array $reasons,
        public readonly array $missingSources,
        public readonly bool $applicable,
        public readonly ?string $justification,
        public readonly ?ComplianceControlOwner $owner,
        public readonly ?string $notes,
        public readonly ?string $settingUpdatedAt,
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
            title: Coerce::toString($data['title'] ?? null),
            group: Coerce::toString($data['group'] ?? null),
            sources: Coerce::mapList($data['sources'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            status: Coerce::toString($data['status'] ?? null),
            reasons: Coerce::mapList($data['reasons'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            missingSources: Coerce::mapList($data['missingSources'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            applicable: Coerce::toBool($data['applicable'] ?? null),
            justification: Coerce::toStringOrNull($data['justification'] ?? null),
            owner: Coerce::nullable($data['owner'] ?? null, static fn (mixed $value): ComplianceControlOwner => ComplianceControlOwner::fromArray(Coerce::toArray($value))),
            notes: Coerce::toStringOrNull($data['notes'] ?? null),
            settingUpdatedAt: Coerce::toStringOrNull($data['settingUpdatedAt'] ?? null),
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
            'title' => $this->title,
            'group' => $this->group,
            'sources' => $this->sources,
            'status' => $this->status,
            'reasons' => $this->reasons,
            'missingSources' => $this->missingSources,
            'applicable' => $this->applicable,
            'justification' => $this->justification,
            'owner' => $this->owner?->toArray(),
            'notes' => $this->notes,
            'settingUpdatedAt' => $this->settingUpdatedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
