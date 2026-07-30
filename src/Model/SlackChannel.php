<?php

/*
 * infrawrench/sdk v0.16.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.16.0).
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

final class SlackChannel implements \JsonSerializable
{
    /**
     * @param string $channelId Slack channel id (C…/G…)
     * @param string $channelName Channel name without the leading #
     * @param bool $workflowPages Alerts raised by a workflow calling infra.page(...)
     */
    public function __construct(
        public readonly string $id,
        public readonly string $installationId,
        public readonly string $channelId,
        public readonly string $channelName,
        public readonly bool $isPrivate,
        public readonly bool $syncIncidents,
        public readonly bool $budgetAlerts,
        public readonly bool $workflowPages,
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
            installationId: Coerce::toString($data['installationId'] ?? null),
            channelId: Coerce::toString($data['channelId'] ?? null),
            channelName: Coerce::toString($data['channelName'] ?? null),
            isPrivate: Coerce::toBool($data['isPrivate'] ?? null),
            syncIncidents: Coerce::toBool($data['syncIncidents'] ?? null),
            budgetAlerts: Coerce::toBool($data['budgetAlerts'] ?? null),
            workflowPages: Coerce::toBool($data['workflowPages'] ?? null),
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
            'installationId' => $this->installationId,
            'channelId' => $this->channelId,
            'channelName' => $this->channelName,
            'isPrivate' => $this->isPrivate,
            'syncIncidents' => $this->syncIncidents,
            'budgetAlerts' => $this->budgetAlerts,
            'workflowPages' => $this->workflowPages,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
