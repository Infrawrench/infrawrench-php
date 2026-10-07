<?php

/*
 * infrawrench/sdk v1.76.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.76.0).
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

final class PagingProviderAccount implements \JsonSerializable
{
    /**
     * @param bool $supportsAcknowledgeEvent Whether an Infrawrench acknowledgement is written back as an event.
     * @param array{label: string, canAcknowledge: bool, canResolve: bool}|null $incidents
     * @param 'managed'|'manual'|null $webhookMode `managed`: Infrawrench subscribes the webhook through the provider's API. `manual`: the user adds the URL in the provider's dashboard and pastes its signing secret.
     */
    public function __construct(
        public readonly string $accountId,
        public readonly string $displayName,
        public readonly string $pluginId,
        public readonly string $targetLabel,
        public readonly ?string $targetDescription,
        public readonly bool $supportsAcknowledgeEvent,
        public readonly ?string $onCallSourceLabel,
        public readonly ?array $incidents,
        public readonly ?string $webhookMode,
        public readonly ?string $webhookSetupHelp,
        public readonly PagingProviderSettings $settings,
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
            accountId: Coerce::toString($data['accountId'] ?? null),
            displayName: Coerce::toString($data['displayName'] ?? null),
            pluginId: Coerce::toString($data['pluginId'] ?? null),
            targetLabel: Coerce::toString($data['targetLabel'] ?? null),
            targetDescription: Coerce::toStringOrNull($data['targetDescription'] ?? null),
            supportsAcknowledgeEvent: Coerce::toBool($data['supportsAcknowledgeEvent'] ?? null),
            onCallSourceLabel: Coerce::toStringOrNull($data['onCallSourceLabel'] ?? null),
            incidents: Coerce::toArrayOrNull($data['incidents'] ?? null),
            webhookMode: Coerce::toStringOrNull($data['webhookMode'] ?? null),
            webhookSetupHelp: Coerce::toStringOrNull($data['webhookSetupHelp'] ?? null),
            settings: PagingProviderSettings::fromArray(Coerce::toArray($data['settings'] ?? null)),
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
            'accountId' => $this->accountId,
            'displayName' => $this->displayName,
            'pluginId' => $this->pluginId,
            'targetLabel' => $this->targetLabel,
            'targetDescription' => $this->targetDescription,
            'supportsAcknowledgeEvent' => $this->supportsAcknowledgeEvent,
            'onCallSourceLabel' => $this->onCallSourceLabel,
            'incidents' => $this->incidents,
            'webhookMode' => $this->webhookMode,
            'webhookSetupHelp' => $this->webhookSetupHelp,
            'settings' => $this->settings->toArray(),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
