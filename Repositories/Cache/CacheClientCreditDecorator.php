<?php

namespace Modules\Icreditsimulator\Repositories\Cache;

use Modules\Icreditsimulator\Repositories\ClientCreditRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheClientCreditDecorator extends BaseCacheDecorator implements ClientCreditRepository
{
    public function __construct(ClientCreditRepository $clientcredit)
    {
        parent::__construct();
        $this->entityName = 'icreditsimulator.clientcredits';
        $this->repository = $clientcredit;
    }
}
