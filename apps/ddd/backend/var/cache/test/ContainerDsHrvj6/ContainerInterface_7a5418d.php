<?php

namespace ContainerDsHrvj6;

class ContainerInterface_7a5418d implements \ProxyManager\Proxy\VirtualProxyInterface, \Symfony\Component\DependencyInjection\ContainerInterface
{

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $valueHolderf3c29 = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializer0caac = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicPropertiesbe983 = [
        
    ];

    public function set(string $id, ?object $service)
    {
        $this->initializer0caac && ($this->initializer0caac->__invoke($valueHolderf3c29, $this, 'set', array('id' => $id, 'service' => $service), $this->initializer0caac) || 1) && $this->valueHolderf3c29 = $valueHolderf3c29;

        return $this->valueHolderf3c29->set($id, $service);
    }

    public function get($id, int $invalidBehavior = 1)
    {
        $this->initializer0caac && ($this->initializer0caac->__invoke($valueHolderf3c29, $this, 'get', array('id' => $id, 'invalidBehavior' => $invalidBehavior), $this->initializer0caac) || 1) && $this->valueHolderf3c29 = $valueHolderf3c29;

        return $this->valueHolderf3c29->get($id, $invalidBehavior);
    }

    public function has($id)
    {
        $this->initializer0caac && ($this->initializer0caac->__invoke($valueHolderf3c29, $this, 'has', array('id' => $id), $this->initializer0caac) || 1) && $this->valueHolderf3c29 = $valueHolderf3c29;

        return $this->valueHolderf3c29->has($id);
    }

    public function initialized(string $id)
    {
        $this->initializer0caac && ($this->initializer0caac->__invoke($valueHolderf3c29, $this, 'initialized', array('id' => $id), $this->initializer0caac) || 1) && $this->valueHolderf3c29 = $valueHolderf3c29;

        return $this->valueHolderf3c29->initialized($id);
    }

    public function getParameter(string $name)
    {
        $this->initializer0caac && ($this->initializer0caac->__invoke($valueHolderf3c29, $this, 'getParameter', array('name' => $name), $this->initializer0caac) || 1) && $this->valueHolderf3c29 = $valueHolderf3c29;

        return $this->valueHolderf3c29->getParameter($name);
    }

    public function hasParameter(string $name)
    {
        $this->initializer0caac && ($this->initializer0caac->__invoke($valueHolderf3c29, $this, 'hasParameter', array('name' => $name), $this->initializer0caac) || 1) && $this->valueHolderf3c29 = $valueHolderf3c29;

        return $this->valueHolderf3c29->hasParameter($name);
    }

    public function setParameter(string $name, $value)
    {
        $this->initializer0caac && ($this->initializer0caac->__invoke($valueHolderf3c29, $this, 'setParameter', array('name' => $name, 'value' => $value), $this->initializer0caac) || 1) && $this->valueHolderf3c29 = $valueHolderf3c29;

        return $this->valueHolderf3c29->setParameter($name, $value);
    }

    /**
     * Constructor for lazy initialization
     *
     * @param \Closure|null $initializer
     */
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;

        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance = $reflection->newInstanceWithoutConstructor();

        $instance->initializer0caac = $initializer;

        return $instance;
    }

    public function __construct()
    {
        static $reflection;

        if (! $this->valueHolderf3c29) {
            $reflection = $reflection ?? new \ReflectionClass('Symfony\\Component\\DependencyInjection\\ContainerInterface');
            $this->valueHolderf3c29 = $reflection->newInstanceWithoutConstructor();
        }
    }

    public function & __get($name)
    {
        $this->initializer0caac && ($this->initializer0caac->__invoke($valueHolderf3c29, $this, '__get', ['name' => $name], $this->initializer0caac) || 1) && $this->valueHolderf3c29 = $valueHolderf3c29;

        if (isset(self::$publicPropertiesbe983[$name])) {
            return $this->valueHolderf3c29->$name;
        }

        $targetObject = $this->valueHolderf3c29;

        $backtrace = debug_backtrace(false);
        trigger_error(
            sprintf(
                'Undefined property: %s::$%s in %s on line %s',
                'Symfony\\Component\\DependencyInjection\\ContainerInterface',
                $name,
                $backtrace[0]['file'],
                $backtrace[0]['line']
            ),
            \E_USER_NOTICE
        );
        return $targetObject->$name;
    }

    public function __set($name, $value)
    {
        $this->initializer0caac && ($this->initializer0caac->__invoke($valueHolderf3c29, $this, '__set', array('name' => $name, 'value' => $value), $this->initializer0caac) || 1) && $this->valueHolderf3c29 = $valueHolderf3c29;

        $targetObject = $this->valueHolderf3c29;

        return $targetObject->$name = $value;
    }

    public function __isset($name)
    {
        $this->initializer0caac && ($this->initializer0caac->__invoke($valueHolderf3c29, $this, '__isset', array('name' => $name), $this->initializer0caac) || 1) && $this->valueHolderf3c29 = $valueHolderf3c29;

        $targetObject = $this->valueHolderf3c29;

        return isset($targetObject->$name);
    }

    public function __unset($name)
    {
        $this->initializer0caac && ($this->initializer0caac->__invoke($valueHolderf3c29, $this, '__unset', array('name' => $name), $this->initializer0caac) || 1) && $this->valueHolderf3c29 = $valueHolderf3c29;

        $targetObject = $this->valueHolderf3c29;

        unset($targetObject->$name);
return;
    }

    public function __clone()
    {
        $this->initializer0caac && ($this->initializer0caac->__invoke($valueHolderf3c29, $this, '__clone', array(), $this->initializer0caac) || 1) && $this->valueHolderf3c29 = $valueHolderf3c29;

        $this->valueHolderf3c29 = clone $this->valueHolderf3c29;
    }

    public function __sleep()
    {
        $this->initializer0caac && ($this->initializer0caac->__invoke($valueHolderf3c29, $this, '__sleep', array(), $this->initializer0caac) || 1) && $this->valueHolderf3c29 = $valueHolderf3c29;

        return array('valueHolderf3c29');
    }

    public function __wakeup()
    {
    }

    public function setProxyInitializer(\Closure $initializer = null)
    {
        $this->initializer0caac = $initializer;
    }

    public function getProxyInitializer()
    {
        return $this->initializer0caac;
    }

    public function initializeProxy() : bool
    {
        return $this->initializer0caac && ($this->initializer0caac->__invoke($valueHolderf3c29, $this, 'initializeProxy', array(), $this->initializer0caac) || 1) && $this->valueHolderf3c29 = $valueHolderf3c29;
    }

    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolderf3c29;
    }

    public function getWrappedValueHolderValue() : ?object
    {
        return $this->valueHolderf3c29;
    }


}

if (!\class_exists('ContainerInterface_7a5418d', false)) {
    \class_alias(__NAMESPACE__.'\\ContainerInterface_7a5418d', 'ContainerInterface_7a5418d', false);
}
