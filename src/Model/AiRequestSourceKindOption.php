<?php

/*
 * infrawrench/sdk v1.57.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.57.0).
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

final class AiRequestSourceKindOption implements \JsonSerializable
{
    /**
     * @param 'plugin'|'litellm' $kind
     * @param bool $queriesBillable Reading this source is billed to the account's own provider (Logs Insights).
     * @param list<array{id: string, name: string}> $accounts
     */
    public function __construct(
        public readonly string $kind,
        public readonly ?string $pluginId,
        public readonly ?string $pluginName,
        public readonly string $sourceKindId,
        public readonly string $label,
        public readonly string $description,
        public readonly string $locationLabel,
        public readonly int $maxHistoryDays,
        public readonly bool $queriesBillable,
        public readonly bool $acceptsPrefix,
        public readonly ?string $helpUrl,
        public readonly array $accounts,
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
            kind: Coerce::toString($data['kind'] ?? null),
            pluginId: Coerce::toStringOrNull($data['pluginId'] ?? null),
            pluginName: Coerce::toStringOrNull($data['pluginName'] ?? null),
            sourceKindId: Coerce::toString($data['sourceKindId'] ?? null),
            label: Coerce::toString($data['label'] ?? null),
            description: Coerce::toString($data['description'] ?? null),
            locationLabel: Coerce::toString($data['locationLabel'] ?? null),
            maxHistoryDays: Coerce::toInt($data['maxHistoryDays'] ?? null),
            queriesBillable: Coerce::toBool($data['queriesBillable'] ?? null),
            acceptsPrefix: Coerce::toBool($data['acceptsPrefix'] ?? null),
            helpUrl: Coerce::toStringOrNull($data['helpUrl'] ?? null),
            accounts: Coerce::mapList($data['accounts'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
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
            'kind' => $this->kind,
            'pluginId' => $this->pluginId,
            'pluginName' => $this->pluginName,
            'sourceKindId' => $this->sourceKindId,
            'label' => $this->label,
            'description' => $this->description,
            'locationLabel' => $this->locationLabel,
            'maxHistoryDays' => $this->maxHistoryDays,
            'queriesBillable' => $this->queriesBillable,
            'acceptsPrefix' => $this->acceptsPrefix,
            'helpUrl' => $this->helpUrl,
            'accounts' => $this->accounts,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
