<?php

declare(strict_types=1);

namespace SimplePay\ApiClient\Enums;

enum TransactionStatus: string
{
    /**
     * Transaction created and preparing for future processing
     */
    case Created = 'created';

    /**
     * System is ready for accepting payment
     *
     * End customer allowed to send cryptocurrency
     */
    case Processing = 'processing';

    /**
     * Transaction found in blockchain
     *
     * System awaiting for some amount of new blocks to be mined for safety
     *
     * `hash` and `block` fields in transaction was filled on this status
     */
    case Confirming = 'confirming';

    /**
     * Transaction succeeded
     */
    case Success = 'success';

    /**
     * Transaction rejected
     *
     * Transaction was failed, or another issue was happen
     */
    case Rejected = 'rejected';

    /**
     * Transaction canceled
     */
    case Canceled = 'canceled';

    /**
     * Transaction expired
     *
     * End customer does not send transaction in time
     */
    case Expired = 'expired';
}
