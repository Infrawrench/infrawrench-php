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

/**
 * Who is emailed when this object fires, **in addition to** whatever the organization's alert
 * routing rules decide. Delivered whether or not a rule matched and not held by quiet hours. On a
 * write, omitting the field leaves the stored list unchanged; send empty arrays to clear it.
 */
final class AlertEmailRecipients implements \JsonSerializable
{
    /**
     * @param list<string> $userIds Organization members, by user id (from GET /alert-email). The member's current login address is read when the alert is sent, so an email change follows them and a member who leaves stops receiving.
     * @param list<string> $addresses Extra addresses (a `finance@` alias, someone without a login). Each must pass the organization's external-address policy (GET /alert-email/settings), checked when saved and again when sent.
     */
    public function __construct(
        public readonly array $userIds,
        public readonly array $addresses,
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
            userIds: Coerce::mapList($data['userIds'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            addresses: Coerce::mapList($data['addresses'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
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
            'userIds' => $this->userIds,
            'addresses' => $this->addresses,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
