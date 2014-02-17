<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

    protected function _initAppAutoload()
    {
        $autoloader = new Zend_Application_Module_Autoloader(array(
                'namespace' => '',
                'basePath' => dirname(__FILE__),
        ));

        return $autoloader;
    }
/*
    protected function _initAutoload()
    {
        //Removed Autoloader_Resoure and Replaced with Module_Autoloader
        new Zend_Application_Module_Autoloader(array(
                'basePath'  => APPLICATION_PATH,
                'namespace' => 'Coda_',
                'resourceTypes' => array(
                        'element' => array(
                                'path'      => 'form/element', // This is custom
                                'namespace' => 'Form_Element'
                        )
                )
        ));
    }
*/

    /**
     * Set up autoloader
     */
    public function _initAutoLoader()
    {

        //Zend_Loader_Autoloader::getInstance()->registerNamespace('Coda_')->setFallbackAutoloader(true);

        Zend_Loader::loadClass('Coda_Debug');
    }

    protected function _initAcl()
    {
        $this->bootstrap('doctrine');
        $roles = ECB_Model_RoleTable::getInstance()->findAll();
        $acl = new Zend_Acl();

        foreach (ECB_Model_RoleTable::definedResources() as $resource => $data) {
            if (!$acl->has($resource)) {
                $acl->add(new Zend_Acl_Resource($resource));
            }
        }
        foreach ($roles as $role) {
            if (!$acl->hasRole($role->name)) {
                $acl->addRole($role->name);
            }

            if ($role->resources) {
                foreach (unserialize($role->resources) as $resource) {
                    $acl->allow($role->name, $resource);
                }
            } else {
                // Hack in access for now...
                if ($role->name == 'Administrator') {
                    $role->resources = serialize(array('administrators'));
                }
                else {
                    $role->resources = serialize(array('notAuthenticated', 'authenticated'));
                }
                $role->save();
            }
        }

        // NotAuthenticated Users
        $acl->addRole('notAuthenticatedUser');
        $acl->allow('notAuthenticatedUser', 'notAuthenticated');

        Zend_Registry::set('acl', $acl);

        return $acl;
    }

    // Initialises the doctrine orm framework
    protected function _initDoctrine ()
    {
        // read doctrine configuration
        $config = $this->getOption('doctrine');

        // get an instance of our manager and configure
        $manager = Doctrine_Manager::getInstance();
        $manager->setAttribute(Doctrine_Core::ATTR_MODEL_CLASS_PREFIX, 'ECB_Model_');
        $manager->setAttribute(Doctrine_Core::ATTR_MODEL_LOADING, Doctrine_Core::MODEL_LOADING_PEAR);
        $manager->setAttribute(Doctrine_Core::ATTR_VALIDATE, Doctrine_Core::VALIDATE_ALL & ~Doctrine_Core::VALIDATE_TYPES);
        $manager->setAttribute(Doctrine_Core::ATTR_USE_DQL_CALLBACKS, true);
        $manager->setAttribute(Doctrine_Core::ATTR_AUTO_FREE_QUERY_OBJECTS, true);
        $manager->setAttribute(Doctrine_Core::ATTR_AUTO_ACCESSOR_OVERRIDE, true);
        $manager->setAttribute(Doctrine_Core::ATTR_AUTOLOAD_TABLE_CLASSES, true);
        $manager->setAttribute(Doctrine_Core::ATTR_MODEL_LOADING, 'conservative');

        // optional result caching
        if (isset($config['cache']) && $config['cache'] == true) {
            $cacheDriver = new Doctrine_Cache_Apc();
            $manager->setAttribute(Doctrine_Core::ATTR_QUERY_CACHE, $cacheDriver);
        }

        // create the connection and return
        $connection = $manager->openConnection($config['connection_string'], 'doctrine');
        $connection->setAttribute(Doctrine_Core::ATTR_USE_NATIVE_ENUM, true);
        $connection->setCharset('utf8');
        return $connection;
    }

    /**
     * Attach plugins
     */
    public function _initPlugins()
    {
        $front = Zend_Controller_Front::getInstance();
        $front
              ->registerPlugin(new Coda_Plugin_InitPlugin())
        //      ->registerPlugin(new Coda_Plugin_AuthPlugin())
        //        ->registerPlugin(new CustomerPlugin())
        //        ->registerPlugin(new PageAccessPlugin())
        //        ->registerPlugin(new InitPlugin())
        ;
    }

}

