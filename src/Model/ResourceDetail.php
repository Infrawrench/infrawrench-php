<?php

/*
 * infrawrench/sdk v0.37.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.37.0).
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

final class ResourceDetail implements \JsonSerializable
{
    /**
     * @param array<string, mixed> $detailSchema
     * @param list<ChildResourceRef> $childResources
     * @param list<ChildTypeRef> $childTypes
     * @param list<PeerPane> $peerPanes
     * @param list<PeerPaneStub> $peerIntegrationStubs
     * @param list<EditableField> $editableFields
     * @param list<CredentialFormat> $credentialFormats
     * @param array<string, mixed> $resourceFields
     * @param bool $schedulable The type declares lifecycle start/stop actions, so this resource can carry a sleep/wake schedule.
     */
    public function __construct(
        public readonly array $detailSchema,
        public readonly array $childResources,
        public readonly array $childTypes,
        public readonly string $pluginId,
        public readonly string $pluginLogoSvg,
        public readonly string $resourceId,
        public readonly string $accountId,
        public readonly string $resourceTypeId,
        public readonly array $peerPanes,
        public readonly array $peerIntegrationStubs,
        public readonly bool $canDelete,
        public readonly bool $canEdit,
        public readonly array $editableFields,
        public readonly array $credentialFormats,
        public readonly bool $hasManifestEditor,
        public readonly bool $hasSecretVersions,
        public readonly string $resourceDisplayName,
        public readonly string $resourceTypeLabel,
        public readonly array $resourceFields,
        public readonly bool $hasSqlEditor,
        public readonly bool $hasStorageBrowser,
        public readonly bool $hasArtifactRegistry,
        public readonly bool $hasKvBrowser,
        public readonly bool $hasKvConsole,
        public readonly bool $isMongoDb,
        public readonly bool $hasDockerActions,
        public readonly bool $hasSshTerminal,
        public readonly bool $hasSftpBrowser,
        public readonly ?string $sshHost,
        public readonly ?string $defaultSshUsername,
        public readonly string $containerId,
        public readonly string $databaseName,
        public readonly string $storageBucketName,
        public readonly bool $supportsMetrics,
        public readonly bool $schedulable,
        public readonly ?string $kvDriverName = null,
        public readonly ?string $sshPrivateHost = null,
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
            detailSchema: Coerce::toArray($data['detailSchema'] ?? null),
            childResources: Coerce::mapList($data['childResources'] ?? null, static fn (mixed $item): ChildResourceRef => ChildResourceRef::fromArray(Coerce::toArray($item))),
            childTypes: Coerce::mapList($data['childTypes'] ?? null, static fn (mixed $item): ChildTypeRef => ChildTypeRef::fromArray(Coerce::toArray($item))),
            pluginId: Coerce::toString($data['pluginId'] ?? null),
            pluginLogoSvg: Coerce::toString($data['pluginLogoSvg'] ?? null),
            resourceId: Coerce::toString($data['resourceId'] ?? null),
            accountId: Coerce::toString($data['accountId'] ?? null),
            resourceTypeId: Coerce::toString($data['resourceTypeId'] ?? null),
            peerPanes: Coerce::mapList($data['peerPanes'] ?? null, static fn (mixed $item): PeerPane => PeerPane::fromArray(Coerce::toArray($item))),
            peerIntegrationStubs: Coerce::mapList($data['peerIntegrationStubs'] ?? null, static fn (mixed $item): PeerPaneStub => PeerPaneStub::fromArray(Coerce::toArray($item))),
            canDelete: Coerce::toBool($data['canDelete'] ?? null),
            canEdit: Coerce::toBool($data['canEdit'] ?? null),
            editableFields: Coerce::mapList($data['editableFields'] ?? null, static fn (mixed $item): EditableField => EditableField::fromArray(Coerce::toArray($item))),
            credentialFormats: Coerce::mapList($data['credentialFormats'] ?? null, static fn (mixed $item): CredentialFormat => CredentialFormat::fromArray(Coerce::toArray($item))),
            hasManifestEditor: Coerce::toBool($data['hasManifestEditor'] ?? null),
            hasSecretVersions: Coerce::toBool($data['hasSecretVersions'] ?? null),
            resourceDisplayName: Coerce::toString($data['resourceDisplayName'] ?? null),
            resourceTypeLabel: Coerce::toString($data['resourceTypeLabel'] ?? null),
            resourceFields: Coerce::toArray($data['resourceFields'] ?? null),
            hasSqlEditor: Coerce::toBool($data['hasSqlEditor'] ?? null),
            hasStorageBrowser: Coerce::toBool($data['hasStorageBrowser'] ?? null),
            hasArtifactRegistry: Coerce::toBool($data['hasArtifactRegistry'] ?? null),
            hasKvBrowser: Coerce::toBool($data['hasKvBrowser'] ?? null),
            hasKvConsole: Coerce::toBool($data['hasKvConsole'] ?? null),
            isMongoDb: Coerce::toBool($data['isMongoDb'] ?? null),
            hasDockerActions: Coerce::toBool($data['hasDockerActions'] ?? null),
            hasSshTerminal: Coerce::toBool($data['hasSshTerminal'] ?? null),
            hasSftpBrowser: Coerce::toBool($data['hasSftpBrowser'] ?? null),
            sshHost: Coerce::toStringOrNull($data['sshHost'] ?? null),
            defaultSshUsername: Coerce::toStringOrNull($data['defaultSshUsername'] ?? null),
            containerId: Coerce::toString($data['containerId'] ?? null),
            databaseName: Coerce::toString($data['databaseName'] ?? null),
            storageBucketName: Coerce::toString($data['storageBucketName'] ?? null),
            supportsMetrics: Coerce::toBool($data['supportsMetrics'] ?? null),
            schedulable: Coerce::toBool($data['schedulable'] ?? null),
            kvDriverName: Coerce::toStringOrNull($data['kvDriverName'] ?? null),
            sshPrivateHost: Coerce::toStringOrNull($data['sshPrivateHost'] ?? null),
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
            'detailSchema' => $this->detailSchema,
            'childResources' => array_map(static fn (ChildResourceRef $item): array => $item->toArray(), $this->childResources),
            'childTypes' => array_map(static fn (ChildTypeRef $item): array => $item->toArray(), $this->childTypes),
            'pluginId' => $this->pluginId,
            'pluginLogoSvg' => $this->pluginLogoSvg,
            'resourceId' => $this->resourceId,
            'accountId' => $this->accountId,
            'resourceTypeId' => $this->resourceTypeId,
            'peerPanes' => array_map(static fn (PeerPane $item): array => $item->toArray(), $this->peerPanes),
            'peerIntegrationStubs' => array_map(static fn (PeerPaneStub $item): array => $item->toArray(), $this->peerIntegrationStubs),
            'canDelete' => $this->canDelete,
            'canEdit' => $this->canEdit,
            'editableFields' => array_map(static fn (EditableField $item): array => $item->toArray(), $this->editableFields),
            'credentialFormats' => array_map(static fn (CredentialFormat $item): array => $item->toArray(), $this->credentialFormats),
            'hasManifestEditor' => $this->hasManifestEditor,
            'hasSecretVersions' => $this->hasSecretVersions,
            'resourceDisplayName' => $this->resourceDisplayName,
            'resourceTypeLabel' => $this->resourceTypeLabel,
            'resourceFields' => $this->resourceFields,
            'hasSqlEditor' => $this->hasSqlEditor,
            'hasStorageBrowser' => $this->hasStorageBrowser,
            'hasArtifactRegistry' => $this->hasArtifactRegistry,
            'hasKvBrowser' => $this->hasKvBrowser,
            'hasKvConsole' => $this->hasKvConsole,
            'isMongoDb' => $this->isMongoDb,
            'hasDockerActions' => $this->hasDockerActions,
            'hasSshTerminal' => $this->hasSshTerminal,
            'hasSftpBrowser' => $this->hasSftpBrowser,
            'sshHost' => $this->sshHost,
            'defaultSshUsername' => $this->defaultSshUsername,
            'containerId' => $this->containerId,
            'databaseName' => $this->databaseName,
            'storageBucketName' => $this->storageBucketName,
            'supportsMetrics' => $this->supportsMetrics,
            'schedulable' => $this->schedulable,
        ];
        if ($this->kvDriverName !== null) {
            $payload['kvDriverName'] = $this->kvDriverName;
        }
        if ($this->sshPrivateHost !== null) {
            $payload['sshPrivateHost'] = $this->sshPrivateHost;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
