<?php

namespace Magento\Framework\App\Config\Validator;

use InvalidArgumentException;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

class ScopeValidator
{
    /**
     * @param $scope
     * @return void
     * @throws InvalidArgumentException
     */
    public function isScopeInRegistry($scope)
    {
        if (
            null !== $scope
            && !in_array($scope, [
                ScopeConfigInterface::SCOPE_TYPE_DEFAULT,
                ScopeInterface::SCOPE_GROUPS,
                ScopeInterface::SCOPE_STORES,
                ScopeInterface::SCOPE_WEBSITES,
            ], true)
        ) {
            throw new InvalidArgumentException(
                sprintf(
                    'Scope must be one of : %s, %s, %s or %s.',
                    ScopeConfigInterface::SCOPE_TYPE_DEFAULT,
                    ScopeInterface::SCOPE_GROUPS,
                    ScopeInterface::SCOPE_STORES,
                    ScopeInterface::SCOPE_WEBSITES
                )
            );
        }
    }
}
