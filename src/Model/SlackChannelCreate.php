<?php

/*
 * infrawrench/sdk v0.26.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.26.0).
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

final class SlackChannelCreate implements \JsonSerializable
{
    public function __construct(
        public readonly string $installationId,
        public readonly string $channelId,
        public readonly string $channelName,
        public readonly ?bool $isPrivate = null,
        public readonly ?bool $syncIncidents = null,
        public readonly ?bool $budgetAlerts = null,
        public readonly ?bool $anomalyAlerts = null,
        public readonly ?bool $workflowPages = null,
        public readonly ?bool $weeklyDigest = null,
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
            installationId: Coerce::toString($data['installationId'] ?? null),
            channelId: Coerce::toString($data['channelId'] ?? null),
            channelName: Coerce::toString($data['channelName'] ?? null),
            isPrivate: Coerce::toBoolOrNull($data['isPrivate'] ?? null),
            syncIncidents: Coerce::toBoolOrNull($data['syncIncidents'] ?? null),
            budgetAlerts: Coerce::toBoolOrNull($data['budgetAlerts'] ?? null),
            anomalyAlerts: Coerce::toBoolOrNull($data['anomalyAlerts'] ?? null),
            workflowPages: Coerce::toBoolOrNull($data['workflowPages'] ?? null),
            weeklyDigest: Coerce::toBoolOrNull($data['weeklyDigest'] ?? null),
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
            'installationId' => $this->installationId,
            'channelId' => $this->channelId,
            'channelName' => $this->channelName,
        ];
        if ($this->isPrivate !== null) {
            $payload['isPrivate'] = $this->isPrivate;
        }
        if ($this->syncIncidents !== null) {
            $payload['syncIncidents'] = $this->syncIncidents;
        }
        if ($this->budgetAlerts !== null) {
            $payload['budgetAlerts'] = $this->budgetAlerts;
        }
        if ($this->anomalyAlerts !== null) {
            $payload['anomalyAlerts'] = $this->anomalyAlerts;
        }
        if ($this->workflowPages !== null) {
            $payload['workflowPages'] = $this->workflowPages;
        }
        if ($this->weeklyDigest !== null) {
            $payload['weeklyDigest'] = $this->weeklyDigest;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
