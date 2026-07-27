<?php

/*
 * infrawrench/sdk v0.7.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.7.0).
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

final class MsTeamsWebhook implements \JsonSerializable
{
    /**
     * @param string $label Display name for the channel, e.g. #alerts
     * @param string $urlHint Non-secret hint at the stored webhook URL (host and last four characters). The URL itself is never returned.
     * @param bool $workflowPages Alerts raised by a workflow calling infra.page(...)
     */
    public function __construct(
        public readonly string $id,
        public readonly string $label,
        public readonly string $urlHint,
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
            label: Coerce::toString($data['label'] ?? null),
            urlHint: Coerce::toString($data['urlHint'] ?? null),
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
            'label' => $this->label,
            'urlHint' => $this->urlHint,
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
