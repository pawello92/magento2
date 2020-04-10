<?php
/**
 * Application config storage writer
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Framework\App\Config\Storage;

use Magento\Framework\App\Config\ConfigResource\ConfigInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\Config\Validator\ScopeValidator;

class Writer implements WriterInterface
{
    /**
     * Resource model of config data
     *
     * @var ConfigInterface
     */
    protected $_resource;

    /**
     * @var ScopeValidator
     */
    private $validator;

    /**
     * @param ConfigInterface $resource
     */
    public function __construct(ConfigInterface $resource, ScopeValidator $validator)
    {
        $this->_resource = $resource;
        $this->validator = $validator;
    }

    /**
     * Delete config value from storage
     *
     * @param   string $path
     * @param   string $scope
     * @param   int $scopeId
     * @return  void
     */
    public function delete($path, $scope = ScopeConfigInterface::SCOPE_TYPE_DEFAULT, $scopeId = 0)
    {
        $this->_resource->deleteConfig(rtrim($path, '/'), $scope, $scopeId);
    }

    /**
     * Save config value to storage
     *
     * @param string $path
     * @param string $value
     * @param string $scope
     * @param int $scopeId
     * @return void
     */
    public function save($path, $value, $scope = ScopeConfigInterface::SCOPE_TYPE_DEFAULT, $scopeId = 0)
    {
        $this->validator->isScopeInRegistry($scope);
        $this->_resource->saveConfig(rtrim($path, '/'), $value, $scope, $scopeId);
    }
}
