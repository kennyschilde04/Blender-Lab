<?php

namespace ContainerQh71iAK;

class SecureApiKeyService_9d4c3f7 extends \App\Infrastructure\Services\SecureApiKeyService implements \ProxyManager\Proxy\VirtualProxyInterface
{
    private $valueHolder0d182 = null;
    private $initializer92fcc = null;
    private static $publicProperties602d7 = [
        'throwErrors' => true,
    ];
    public function encryptApiKey(string $apiKey) : bool|string
    {
        $this->initializer92fcc && ($this->initializer92fcc->__invoke($valueHolder0d182, $this, 'encryptApiKey', array('apiKey' => $apiKey), $this->initializer92fcc) || 1) && $this->valueHolder0d182 = $valueHolder0d182;
        return $this->valueHolder0d182->encryptApiKey($apiKey);
    }
    public function decryptApiKey(string $encryptedApiKey) : string
    {
        $this->initializer92fcc && ($this->initializer92fcc->__invoke($valueHolder0d182, $this, 'decryptApiKey', array('encryptedApiKey' => $encryptedApiKey), $this->initializer92fcc) || 1) && $this->valueHolder0d182 = $valueHolder0d182;
        return $this->valueHolder0d182->decryptApiKey($encryptedApiKey);
    }
    public function generateApiKey(int $length = 32) : string
    {
        $this->initializer92fcc && ($this->initializer92fcc->__invoke($valueHolder0d182, $this, 'generateApiKey', array('length' => $length), $this->initializer92fcc) || 1) && $this->valueHolder0d182 = $valueHolder0d182;
        return $this->valueHolder0d182->generateApiKey($length);
    }
    public function getApiKeyHash(string $apiKey, int $keyDerivationIterations = 1000, int $derivedKeyLength = 32) : string
    {
        $this->initializer92fcc && ($this->initializer92fcc->__invoke($valueHolder0d182, $this, 'getApiKeyHash', array('apiKey' => $apiKey, 'keyDerivationIterations' => $keyDerivationIterations, 'derivedKeyLength' => $derivedKeyLength), $this->initializer92fcc) || 1) && $this->valueHolder0d182 = $valueHolder0d182;
        return $this->valueHolder0d182->getApiKeyHash($apiKey, $keyDerivationIterations, $derivedKeyLength);
    }
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;
        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance   = $reflection->newInstanceWithoutConstructor();
        unset($instance->throwErrors);
        $instance->initializer92fcc = $initializer;
        return $instance;
    }
    public function __construct()
    {
        static $reflection;
        if (! $this->valueHolder0d182) {
            $reflection = $reflection ?? new \ReflectionClass('App\\Infrastructure\\Services\\SecureApiKeyService');
            $this->valueHolder0d182 = $reflection->newInstanceWithoutConstructor();
        unset($this->throwErrors);
        }
    }
    public function & __get($name)
    {
        $this->initializer92fcc && ($this->initializer92fcc->__invoke($valueHolder0d182, $this, '__get', ['name' => $name], $this->initializer92fcc) || 1) && $this->valueHolder0d182 = $valueHolder0d182;
        if (isset(self::$publicProperties602d7[$name])) {
            return $this->valueHolder0d182->$name;
        }
        $realInstanceReflection = new \ReflectionClass('App\\Infrastructure\\Services\\SecureApiKeyService');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder0d182;
            $backtrace = debug_backtrace(false, 1);
            trigger_error(
                sprintf(
                    'Undefined property: %s::$%s in %s on line %s',
                    $realInstanceReflection->getName(),
                    $name,
                    $backtrace[0]['file'],
                    $backtrace[0]['line']
                ),
                \E_USER_NOTICE
            );
            return $targetObject->$name;
        }
        $targetObject = $this->valueHolder0d182;
        $accessor = function & () use ($targetObject, $name) {
            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();
        return $returnValue;
    }
    public function __set($name, $value)
    {
        $this->initializer92fcc && ($this->initializer92fcc->__invoke($valueHolder0d182, $this, '__set', array('name' => $name, 'value' => $value), $this->initializer92fcc) || 1) && $this->valueHolder0d182 = $valueHolder0d182;
        if (isset(self::$publicProperties602d7[$name])) {
            return ($this->valueHolder0d182->$name = $value);
        }
        $realInstanceReflection = new \ReflectionClass('App\\Infrastructure\\Services\\SecureApiKeyService');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder0d182;
            $targetObject->$name = $value;
            return $targetObject->$name;
        }
        $targetObject = $this->valueHolder0d182;
        $accessor = function & () use ($targetObject, $name, $value) {
            $targetObject->$name = $value;
            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();
        return $returnValue;
    }
    public function __isset($name)
    {
        $this->initializer92fcc && ($this->initializer92fcc->__invoke($valueHolder0d182, $this, '__isset', array('name' => $name), $this->initializer92fcc) || 1) && $this->valueHolder0d182 = $valueHolder0d182;
        if (isset(self::$publicProperties602d7[$name])) {
            return isset($this->valueHolder0d182->$name);
        }
        $realInstanceReflection = new \ReflectionClass('App\\Infrastructure\\Services\\SecureApiKeyService');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder0d182;
            return isset($targetObject->$name);
        }
        $targetObject = $this->valueHolder0d182;
        $accessor = function () use ($targetObject, $name) {
            return isset($targetObject->$name);
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();
        return $returnValue;
    }
    public function __unset($name)
    {
        $this->initializer92fcc && ($this->initializer92fcc->__invoke($valueHolder0d182, $this, '__unset', array('name' => $name), $this->initializer92fcc) || 1) && $this->valueHolder0d182 = $valueHolder0d182;
        if (isset(self::$publicProperties602d7[$name])) {
            unset($this->valueHolder0d182->$name);
            return;
        }
        $realInstanceReflection = new \ReflectionClass('App\\Infrastructure\\Services\\SecureApiKeyService');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder0d182;
            unset($targetObject->$name);
            return;
        }
        $targetObject = $this->valueHolder0d182;
        $accessor = function () use ($targetObject, $name) {
            unset($targetObject->$name);
            return;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $accessor();
    }
    public function __clone()
    {
        $this->initializer92fcc && ($this->initializer92fcc->__invoke($valueHolder0d182, $this, '__clone', array(), $this->initializer92fcc) || 1) && $this->valueHolder0d182 = $valueHolder0d182;
        $this->valueHolder0d182 = clone $this->valueHolder0d182;
    }
    public function __sleep()
    {
        $this->initializer92fcc && ($this->initializer92fcc->__invoke($valueHolder0d182, $this, '__sleep', array(), $this->initializer92fcc) || 1) && $this->valueHolder0d182 = $valueHolder0d182;
        return array('valueHolder0d182');
    }
    public function __wakeup()
    {
        unset($this->throwErrors);
    }
    public function setProxyInitializer(?\Closure $initializer = null) : void
    {
        $this->initializer92fcc = $initializer;
    }
    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializer92fcc;
    }
    public function initializeProxy() : bool
    {
        return $this->initializer92fcc && ($this->initializer92fcc->__invoke($valueHolder0d182, $this, 'initializeProxy', array(), $this->initializer92fcc) || 1) && $this->valueHolder0d182 = $valueHolder0d182;
    }
    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolder0d182;
    }
    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder0d182;
    }
}

if (!\class_exists('SecureApiKeyService_9d4c3f7', false)) {
    \class_alias(__NAMESPACE__.'\\SecureApiKeyService_9d4c3f7', 'SecureApiKeyService_9d4c3f7', false);
}
