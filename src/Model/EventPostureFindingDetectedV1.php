<?php

/*
 * infrawrench/sdk v1.84.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.84.0).
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
 * A critical or high severity posture check started failing on a resource. Each finding is sent
 * once.
 *
 * Spec schema: `Event_posture_finding_detected_v1`.
 */
final class EventPostureFindingDetectedV1 implements \JsonSerializable
{
    /**
     * @param string $id `evt_…`. Unique per event and stable across retries and redeliveries: dedupe on it.
     * @param int $version Payload schema version of `type`.
     * @param string $createdAt When the event happened.
     * @param EventSeverity::* $severity
     * @param string|null $accountId The account the event is about; null when it spans several or none.
     * @param string|null $environment The `env`/`environment`/`stage` tag of the resource the event is about; null when there is none.
     * @param string $title One line for a human.
     * @param string|null $url Deep link into Infrawrench.
     * @param bool $test True only for Send test event.
     * @param 'posture.finding.detected' $type
     */
    public function __construct(
        public readonly string $id,
        public readonly int $version,
        public readonly string $createdAt,
        public readonly string $organizationId,
        public readonly string $severity,
        public readonly ?string $accountId,
        public readonly ?string $environment,
        public readonly string $title,
        public readonly ?string $url,
        public readonly bool $test,
        public readonly string $type,
        public readonly EventDataPostureFindingDetectedV1 $data,
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
            version: Coerce::toInt($data['version'] ?? null),
            createdAt: Coerce::toString($data['createdAt'] ?? null),
            organizationId: Coerce::toString($data['organizationId'] ?? null),
            severity: Coerce::toString($data['severity'] ?? null),
            accountId: Coerce::toStringOrNull($data['accountId'] ?? null),
            environment: Coerce::toStringOrNull($data['environment'] ?? null),
            title: Coerce::toString($data['title'] ?? null),
            url: Coerce::toStringOrNull($data['url'] ?? null),
            test: Coerce::toBool($data['test'] ?? null),
            type: Coerce::toString($data['type'] ?? null),
            data: EventDataPostureFindingDetectedV1::fromArray(Coerce::toArray($data['data'] ?? null)),
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
            'version' => $this->version,
            'createdAt' => $this->createdAt,
            'organizationId' => $this->organizationId,
            'severity' => $this->severity,
            'accountId' => $this->accountId,
            'environment' => $this->environment,
            'title' => $this->title,
            'url' => $this->url,
            'test' => $this->test,
            'type' => $this->type,
            'data' => $this->data->toArray(),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
