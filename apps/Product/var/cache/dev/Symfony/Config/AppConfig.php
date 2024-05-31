<?php

namespace Symfony\Config;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class AppConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $foo;
    private $_usedProperties = [];

    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function foo($value): static
    {
        $this->_usedProperties['foo'] = true;
        $this->foo = $value;

        return $this;
    }

    public function getExtensionAlias(): string
    {
        return 'app';
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('foo', $value)) {
            $this->_usedProperties['foo'] = true;
            $this->foo = $value['foo'];
            unset($value['foo']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['foo'])) {
            $output['foo'] = $this->foo;
        }

        return $output;
    }

}
