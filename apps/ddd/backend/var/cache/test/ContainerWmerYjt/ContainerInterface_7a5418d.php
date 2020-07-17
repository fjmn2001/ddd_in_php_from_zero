<?php

namespace ContainerWmerYjt;

class ContainerInterface_7a5418d implements \ProxyManager\Proxy\VirtualProxyInterface, \Symfony\Component\DependencyInjection\ContainerInterface
{

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $valueHolderccd8f = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializer9969b = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicProperties23694 = [
        
    ];

    public function set(string $id, ?object $service)
    {
        $this->initializer9969b && ($this->initializer9969b->__invoke($valueHolderccd8f, $this, 'set', array('id' => $id, 'service' => $service), $this->initializer9969b) || 1) && $this->valueHolderccd8f = $valueHolderccd8f;

        return $this->valueHolderccd8f->set($id, $service);
    }

    public function get($id, int $invalidBehavior = 1)
    {
        $this->initializer9969b && ($this->initializer9969b->__invoke($valueHolderccd8f, $this, 'get', array('id' => $id, 'invalidBehavior' => $invalidBehavior), $this->initializer9969b) || 1) && $this->valueHolderccd8f = $valueHolderccd8f;

        return $this->valueHolderccd8f->get($id, $invalidBehavior);
    }

    public function has($id)
    {
        $this->initializer9969b && ($this->initializer9969b->__invoke($valueHolderccd8f, $this, 'has', array('id' => $id), $this->initializer9969b) || 1) && $this->valueHolderccd8f = $valueHolderccd8f;

        return $this->valueHolderccd8f->has($id);
    }

    public function initialized(string $id)
    {
        $this->initializer9969b && ($this->initializer9969b->__invoke($valueHolderccd8f, $this, 'initialized', array('id' => $id), $this->initializer9969b) || 1) && $this->valueHolderccd8f = $valueHolderccd8f;

        return $this->valueHolderccd8f->initialized($id);
    }

    public function getParameter(string $name)
    {
        $this->initializer9969b && ($this->initializer9969b->__invoke($valueHolderccd8f, $this, 'getParameter', array('name' => $name), $this->initializer9969b) || 1) && $this->valueHolderccd8f = $valueHolderccd8f;

        return $this->valueHolderccd8f->getParameter($name);
    }

    public function hasParameter(string $name)
    {
        $this->initializer9969b && ($this->initializer9969b->__invoke($valueHolderccd8f, $this, 'hasParameter', array('name' => $name), $this->initializer9969b) || 1) && $this->valueHolderccd8f = $valueHolderccd8f;

        return $this->valueHolderccd8f->hasParameter($name);
    }

    public function setParameter(string $name, $value)
    {
        $this->initializer9969b && ($this->initializer9969b->__invoke($valueHolderccd8f, $this, 'setParameter', array('name' => $name, 'value' => $value), $this->initializer9969b) || 1) && $this->valueHolderccd8f = $valueHolderccd8f;

        return $this->valueHolderccd8f->setParameter($name, $value);
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

        $instance->initializer9969b = $initializer;

        return $instance;
    }

    public function __construct()
    {
        static $reflection;

        if (! $this->valueHolderccd8f) {
            $reflection = $reflection ?? new \ReflectionClass('Symfony\\Component\\DependencyInjection\\ContainerInterface');
            $this->valueHolderccd8f = $reflection->newInstanceWithoutConstructor();
        }
    }

    public function & __get($name)
    {
        $this->initializer9969b && ($this->initializer9969b->__invoke($valueHolderccd8f, $this, '__get', ['name' => $name], $this->initializer9969b) || 1) && $this->valueHolderccd8f = $valueHolderccd8f;

        if (isset(self::$publicProperties23694[$name])) {
            return $this->valueHolderccd8f->$name;
        }

        $targetObject = $this->valueHolderccd8f;

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
        $this->initializer9969b && ($this->initializer9969b->__invoke($valueHolderccd8f, $this, '__set', array('name' => $name, 'value' => $value), $this->initializer9969b) || 1) && $this->valueHolderccd8f = $valueHolderccd8f;

        $targetObject = $this->valueHolderccd8f;

        return $targetObject->$name = $value;
    }

    public function __isset($name)
    {
        $this->initializer9969b && ($this->initializer9969b->__invoke($valueHolderccd8f, $this, '__isset', array('name' => $name), $this->initializer9969b) || 1) && $this->valueHolderccd8f = $valueHolderccd8f;

        $targetObject = $this->valueHolderccd8f;

        return isset($targetObject->$name);
    }

    public function __unset($name)
    {
        $this->initializer9969b && ($this->initializer9969b->__invoke($valueHolderccd8f, $this, '__unset', array('name' => $name), $this->initializer9969b) || 1) && $this->valueHolderccd8f = $valueHolderccd8f;

        $targetObject = $this->valueHolderccd8f;

        unset($targetObject->$name);
return;
    }

    public function __clone()
    {
        $this->initializer9969b && ($this->initializer9969b->__invoke($valueHolderccd8f, $this, '__clone', array(), $this->initializer9969b) || 1) && $this->valueHolderccd8f = $valueHolderccd8f;

        $this->valueHolderccd8f = clone $this->valueHolderccd8f;
    }

    public function __sleep()
    {
        $this->initializer9969b && ($this->initializer9969b->__invoke($valueHolderccd8f, $this, '__sleep', array(), $this->initializer9969b) || 1) && $this->valueHolderccd8f = $valueHolderccd8f;

        return array('valueHolderccd8f');
    }

    public function __wakeup()
    {
    }

    public function setProxyInitializer(\Closure $initializer = null)
    {
        $this->initializer9969b = $initializer;
    }

    public function getProxyInitializer()
    {
        return $this->initializer9969b;
    }

    public function initializeProxy() : bool
    {
        return $this->initializer9969b && ($this->initializer9969b->__invoke($valueHolderccd8f, $this, 'initializeProxy', array(), $this->initializer9969b) || 1) && $this->valueHolderccd8f = $valueHolderccd8f;
    }

    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolderccd8f;
    }

    public function getWrappedValueHolderValue() : ?object
    {
        return $this->valueHolderccd8f;
    }


}

if (!\class_exists('ContainerInterface_7a5418d', false)) {
    \class_alias(__NAMESPACE__.'\\ContainerInterface_7a5418d', 'ContainerInterface_7a5418d', false);
}
