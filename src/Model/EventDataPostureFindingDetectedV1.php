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

/**
 * `data` of a `posture.finding.detected` event, version 1. A critical or high severity posture
 * check started failing on a resource. Each finding is sent once.
 *
 * Spec schema: `EventData_posture_finding_detected_v1`.
 */
final class EventDataPostureFindingDetectedV1 implements \JsonSerializable
{
    /**
     * @param string $resourceId Infrawrench resource id.
     * @param string $resourceName Resource display name.
     * @param string $resourceTypeId Resource type id.
     * @param string $pluginId Provider plugin id.
     * @param string|null $externalId Provider-native id.
     * @param string $ruleId The posture rule that matched.
     * @param string $title Short rule title.
     * @param 'critical'|'high' $findingSeverity The finding's own severity.
     * @param string $category Posture category.
     * @param string $reason Why the resource fails the rule.
     */
    public function __construct(
        public readonly string $resourceId,
        public readonly string $resourceName,
        public readonly string $resourceTypeId,
        public readonly string $pluginId,
        public readonly ?string $externalId,
        public readonly string $ruleId,
        public readonly string $title,
        public readonly string $findingSeverity,
        public readonly string $category,
        public readonly string $reason,
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
            resourceId: Coerce::toString($data['resourceId'] ?? null),
            resourceName: Coerce::toString($data['resourceName'] ?? null),
            resourceTypeId: Coerce::toString($data['resourceTypeId'] ?? null),
            pluginId: Coerce::toString($data['pluginId'] ?? null),
            externalId: Coerce::toStringOrNull($data['externalId'] ?? null),
            ruleId: Coerce::toString($data['ruleId'] ?? null),
            title: Coerce::toString($data['title'] ?? null),
            findingSeverity: Coerce::toString($data['findingSeverity'] ?? null),
            category: Coerce::toString($data['category'] ?? null),
            reason: Coerce::toString($data['reason'] ?? null),
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
            'resourceId' => $this->resourceId,
            'resourceName' => $this->resourceName,
            'resourceTypeId' => $this->resourceTypeId,
            'pluginId' => $this->pluginId,
            'externalId' => $this->externalId,
            'ruleId' => $this->ruleId,
            'title' => $this->title,
            'findingSeverity' => $this->findingSeverity,
            'category' => $this->category,
            'reason' => $this->reason,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
