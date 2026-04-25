<?php

namespace ContainerQh71iAK;

class AppService_05c3deb extends \App\Infrastructure\Services\AppService implements \ProxyManager\Proxy\VirtualProxyInterface
{
    private $valueHolder0d182 = null;
    private $initializer92fcc = null;
    private static $publicProperties602d7 = [
        'throwErrors' => true,
    ];
    public function createCachesSnapshot() : void
    {
        $this->initializer92fcc && ($this->initializer92fcc->__invoke($valueHolder0d182, $this, 'createCachesSnapshot', array(), $this->initializer92fcc) || 1) && $this->valueHolder0d182 = $valueHolder0d182;
        $this->valueHolder0d182->createCachesSnapshot();
return;
    }
    public function restoreCachesSnapshot() : void
    {
        $this->initializer92fcc && ($this->initializer92fcc->__invoke($valueHolder0d182, $this, 'restoreCachesSnapshot', array(), $this->initializer92fcc) || 1) && $this->valueHolder0d182 = $valueHolder0d182;
        $this->valueHolder0d182->restoreCachesSnapshot();
return;
    }
    public function deactivateCaches() : void
    {
        $this->initializer92fcc && ($this->initializer92fcc->__invoke($valueHolder0d182, $this, 'deactivateCaches', array(), $this->initializer92fcc) || 1) && $this->valueHolder0d182 = $valueHolder0d182;
        $this->valueHolder0d182->deactivateCaches();
return;
    }
    public function activateCaches() : void
    {
        $this->initializer92fcc && ($this->initializer92fcc->__invoke($valueHolder0d182, $this, 'activateCaches', array(), $this->initializer92fcc) || 1) && $this->valueHolder0d182 = $valueHolder0d182;
        $this->valueHolder0d182->activateCaches();
return;
    }
    public function createEntityRightsRestrictionsStateSnapshot() : void
    {
        $this->initializer92fcc && ($this->initializer92fcc->__invoke($valueHolder0d182, $this, 'createEntityRightsRestrictionsStateSnapshot', array(), $this->initializer92fcc) || 1) && $this->valueHolder0d182 = $valueHolder0d182;
        $this->valueHolder0d182->createEntityRightsRestrictionsStateSnapshot();
return;
    }
    public function restoreEntityRightsRestrictionsStateSnapshot() : void
    {
        $this->initializer92fcc && ($this->initializer92fcc->__invoke($valueHolder0d182, $this, 'restoreEntityRightsRestrictionsStateSnapshot', array(), $this->initializer92fcc) || 1) && $this->valueHolder0d182 = $valueHolder0d182;
        $this->valueHolder0d182->restoreEntityRightsRestrictionsStateSnapshot();
return;
    }
    public function deactivateEntityRightsRestrictions() : void
    {
        $this->initializer92fcc && ($this->initializer92fcc->__invoke($valueHolder0d182, $this, 'deactivateEntityRightsRestrictions', array(), $this->initializer92fcc) || 1) && $this->valueHolder0d182 = $valueHolder0d182;
        $this->valueHolder0d182->deactivateEntityRightsRestrictions();
return;
    }
    public function getContainerServiceClassNameForClass(string $className) : ?string
    {
        $this->initializer92fcc && ($this->initializer92fcc->__invoke($valueHolder0d182, $this, 'getContainerServiceClassNameForClass', array('className' => $className), $this->initializer92fcc) || 1) && $this->valueHolder0d182 = $valueHolder0d182;
        return $this->valueHolder0d182->getContainerServiceClassNameForClass($className);
    }
    public function getRequestService() : ?\DDD\Presentation\Services\RequestService
    {
        $this->initializer92fcc && ($this->initializer92fcc->__invoke($valueHolder0d182, $this, 'getRequestService', array(), $this->initializer92fcc) || 1) && $this->valueHolder0d182 = $valueHolder0d182;
        return $this->valueHolder0d182->getRequestService();
    }
    public function getService(string $serviceName) : mixed
    {
        $this->initializer92fcc && ($this->initializer92fcc->__invoke($valueHolder0d182, $this, 'getService', array('serviceName' => $serviceName), $this->initializer92fcc) || 1) && $this->valueHolder0d182 = $valueHolder0d182;
        return $this->valueHolder0d182->getService($serviceName);
    }
    public function getKernel() : \DDD\Symfony\Kernels\DDDKernel
    {
        $this->initializer92fcc && ($this->initializer92fcc->__invoke($valueHolder0d182, $this, 'getKernel', array(), $this->initializer92fcc) || 1) && $this->valueHolder0d182 = $valueHolder0d182;
        return $this->valueHolder0d182->getKernel();
    }
    public function getEnvironment() : string
    {
        $this->initializer92fcc && ($this->initializer92fcc->__invoke($valueHolder0d182, $this, 'getEnvironment', array(), $this->initializer92fcc) || 1) && $this->valueHolder0d182 = $valueHolder0d182;
        return $this->valueHolder0d182->getEnvironment();
    }
    public function getKernelPrefix() : ?string
    {
        $this->initializer92fcc && ($this->initializer92fcc->__invoke($valueHolder0d182, $this, 'getKernelPrefix', array(), $this->initializer92fcc) || 1) && $this->valueHolder0d182 = $valueHolder0d182;
        return $this->valueHolder0d182->getKernelPrefix();
    }
    public function getConsoleDir(bool $returnRelativePath = true) : string
    {
        $this->initializer92fcc && ($this->initializer92fcc->__invoke($valueHolder0d182, $this, 'getConsoleDir', array('returnRelativePath' => $returnRelativePath), $this->initializer92fcc) || 1) && $this->valueHolder0d182 = $valueHolder0d182;
        return $this->valueHolder0d182->getConsoleDir($returnRelativePath);
    }
    public function getCacheDir(bool $returnRelativePath = true) : string
    {
        $this->initializer92fcc && ($this->initializer92fcc->__invoke($valueHolder0d182, $this, 'getCacheDir', array('returnRelativePath' => $returnRelativePath), $this->initializer92fcc) || 1) && $this->valueHolder0d182 = $valueHolder0d182;
        return $this->valueHolder0d182->getCacheDir($returnRelativePath);
    }
    public function createConsoleApplicationForCurrentKernel() : \Symfony\Bundle\FrameworkBundle\Console\Application
    {
        $this->initializer92fcc && ($this->initializer92fcc->__invoke($valueHolder0d182, $this, 'createConsoleApplicationForCurrentKernel', array(), $this->initializer92fcc) || 1) && $this->valueHolder0d182 = $valueHolder0d182;
        return $this->valueHolder0d182->createConsoleApplicationForCurrentKernel();
    }
    public function getRootDir() : string
    {
        $this->initializer92fcc && ($this->initializer92fcc->__invoke($valueHolder0d182, $this, 'getRootDir', array(), $this->initializer92fcc) || 1) && $this->valueHolder0d182 = $valueHolder0d182;
        return $this->valueHolder0d182->getRootDir();
    }
    public function getFrameworkRootDir() : string
    {
        $this->initializer92fcc && ($this->initializer92fcc->__invoke($valueHolder0d182, $this, 'getFrameworkRootDir', array(), $this->initializer92fcc) || 1) && $this->valueHolder0d182 = $valueHolder0d182;
        return $this->valueHolder0d182->getFrameworkRootDir();
    }
    public function getLogger() : \Psr\Log\LoggerInterface
    {
        $this->initializer92fcc && ($this->initializer92fcc->__invoke($valueHolder0d182, $this, 'getLogger', array(), $this->initializer92fcc) || 1) && $this->valueHolder0d182 = $valueHolder0d182;
        return $this->valueHolder0d182->getLogger();
    }
    public function getTemplateRenderer() : \Twig\Environment
    {
        $this->initializer92fcc && ($this->initializer92fcc->__invoke($valueHolder0d182, $this, 'getTemplateRenderer', array(), $this->initializer92fcc) || 1) && $this->valueHolder0d182 = $valueHolder0d182;
        return $this->valueHolder0d182->getTemplateRenderer();
    }
    public function getMemoryLimitInBytes() : int
    {
        $this->initializer92fcc && ($this->initializer92fcc->__invoke($valueHolder0d182, $this, 'getMemoryLimitInBytes', array(), $this->initializer92fcc) || 1) && $this->valueHolder0d182 = $valueHolder0d182;
        return $this->valueHolder0d182->getMemoryLimitInBytes();
    }
    public function isMemoryUsageHigh() : bool
    {
        $this->initializer92fcc && ($this->initializer92fcc->__invoke($valueHolder0d182, $this, 'isMemoryUsageHigh', array(), $this->initializer92fcc) || 1) && $this->valueHolder0d182 = $valueHolder0d182;
        return $this->valueHolder0d182->isMemoryUsageHigh();
    }
    public function getDefaultAccountForCliOperations() : ?\DDD\Domain\Common\Entities\Accounts\Account
    {
        $this->initializer92fcc && ($this->initializer92fcc->__invoke($valueHolder0d182, $this, 'getDefaultAccountForCliOperations', array(), $this->initializer92fcc) || 1) && $this->valueHolder0d182 = $valueHolder0d182;
        return $this->valueHolder0d182->getDefaultAccountForCliOperations();
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
            $reflection = $reflection ?? new \ReflectionClass('App\\Infrastructure\\Services\\AppService');
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
        $realInstanceReflection = new \ReflectionClass('App\\Infrastructure\\Services\\AppService');
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
        $realInstanceReflection = new \ReflectionClass('App\\Infrastructure\\Services\\AppService');
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
        $realInstanceReflection = new \ReflectionClass('App\\Infrastructure\\Services\\AppService');
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
        $realInstanceReflection = new \ReflectionClass('App\\Infrastructure\\Services\\AppService');
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

if (!\class_exists('AppService_05c3deb', false)) {
    \class_alias(__NAMESPACE__.'\\AppService_05c3deb', 'AppService_05c3deb', false);
}
