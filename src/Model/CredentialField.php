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

final class CredentialField implements \JsonSerializable
{
    /**
     * @param list<CredentialFieldRegion>|null $regions
     * @param array{label: string, url: string}|null $helpLink
     */
    public function __construct(
        public readonly string $key,
        public readonly string $label,
        public readonly ?string $description = null,
        public readonly ?string $placeholder = null,
        public readonly ?bool $sensitive = null,
        public readonly ?bool $multiline = null,
        public readonly ?string $defaultValue = null,
        public readonly ?array $regions = null,
        public readonly ?array $helpLink = null,
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
            label: Coerce::toString($data['label'] ?? null),
            description: Coerce::toStringOrNull($data['description'] ?? null),
            placeholder: Coerce::toStringOrNull($data['placeholder'] ?? null),
            sensitive: Coerce::toBoolOrNull($data['sensitive'] ?? null),
            multiline: Coerce::toBoolOrNull($data['multiline'] ?? null),
            defaultValue: Coerce::toStringOrNull($data['defaultValue'] ?? null),
            regions: Coerce::nullable($data['regions'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): CredentialFieldRegion => CredentialFieldRegion::fromArray(Coerce::toArray($item)))),
            helpLink: Coerce::toArrayOrNull($data['helpLink'] ?? null),
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
            'label' => $this->label,
        ];
        if ($this->description !== null) {
            $payload['description'] = $this->description;
        }
        if ($this->placeholder !== null) {
            $payload['placeholder'] = $this->placeholder;
        }
        if ($this->sensitive !== null) {
            $payload['sensitive'] = $this->sensitive;
        }
        if ($this->multiline !== null) {
            $payload['multiline'] = $this->multiline;
        }
        if ($this->defaultValue !== null) {
            $payload['defaultValue'] = $this->defaultValue;
        }
        if ($this->regions !== null) {
            $payload['regions'] = array_map(static fn (CredentialFieldRegion $item): array => $item->toArray(), $this->regions);
        }
        if ($this->helpLink !== null) {
            $payload['helpLink'] = $this->helpLink;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
