<?php

/*
 * infrawrench/sdk v1.9.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.9.0).
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

/**
 * `draft` → `approved` → `sent`, plus `void` from either issued state.
 *
 * **A draft recomputes its figures from live spend on every read; an approved, sent or void
 * invoice never does.** Approval is the freeze: the lines, the totals, the exchange rates and the
 * day they were read, the billing rules in force and the names of everything in scope are written
 * onto the invoice, and no later restatement of spend, change of rate, edit of a rule or rename
 * can alter what the document says.
 *
 * An issued invoice is never edited and never deleted. A wrong one is voided with a reason and
 * superseded by a corrective invoice; both survive. The server enforces this, not just the UI.
 *
 * The values `InvoiceStatus` accepts.
 *
 * Constants rather than an enum, deliberately: a value added by a newer API version has to
 * deserialize, and `enum::from()` would raise instead.
 */
final class InvoiceStatus
{
    public const DRAFT = 'draft';
    public const APPROVED = 'approved';
    public const SENT = 'sent';
    public const VOID = 'void';

    /**
     * Every value, in the order the spec lists them.
     *
     * @return list<string>
     */
    public static function values(): array
    {
        return [
            self::DRAFT,
            self::APPROVED,
            self::SENT,
            self::VOID,
        ];
    }
}
