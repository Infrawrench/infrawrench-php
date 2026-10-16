<?php

/*
 * infrawrench/sdk v1.82.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.82.0).
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

final class IdleRuleView implements \JsonSerializable
{
    /**
     * @param PluginId::* $pluginId
     * @param 'remove'|'reconfigure'|'stop' $action
     * @param list<string> $resourceTypeNames
     * @param list<IdleRuleThresholdView> $thresholds
     */
    public function __construct(
        public readonly string $ruleKey,
        public readonly string $pluginId,
        public readonly string $pluginName,
        public readonly string $ruleId,
        public readonly string $label,
        public readonly string $description,
        public readonly string $action,
        public readonly array $resourceTypeNames,
        public readonly bool $enabled,
        public readonly array $thresholds,
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
            ruleKey: Coerce::toString($data['ruleKey'] ?? null),
            pluginId: Coerce::toString($data['pluginId'] ?? null),
            pluginName: Coerce::toString($data['pluginName'] ?? null),
            ruleId: Coerce::toString($data['ruleId'] ?? null),
            label: Coerce::toString($data['label'] ?? null),
            description: Coerce::toString($data['description'] ?? null),
            action: Coerce::toString($data['action'] ?? null),
            resourceTypeNames: Coerce::mapList($data['resourceTypeNames'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            enabled: Coerce::toBool($data['enabled'] ?? null),
            thresholds: Coerce::mapList($data['thresholds'] ?? null, static fn (mixed $item): IdleRuleThresholdView => IdleRuleThresholdView::fromArray(Coerce::toArray($item))),
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
            'ruleKey' => $this->ruleKey,
            'pluginId' => $this->pluginId,
            'pluginName' => $this->pluginName,
            'ruleId' => $this->ruleId,
            'label' => $this->label,
            'description' => $this->description,
            'action' => $this->action,
            'resourceTypeNames' => $this->resourceTypeNames,
            'enabled' => $this->enabled,
            'thresholds' => array_map(static fn (IdleRuleThresholdView $item): array => $item->toArray(), $this->thresholds),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
