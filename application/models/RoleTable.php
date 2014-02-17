<?php
class ECB_Model_RoleTable extends Doctrine_Record
{
    public static function getInstance()
    {
        return Doctrine_Core::getTable('ECB_Model_Role');
    }

    public function getRoles()
    {
        return Doctrine_Query::create() // needs standarising
            ->select('m.*')
            ->from('ECB_Model_Role r')
            ->where('m.deleted = 0');
    }

    /**
     * Returns the defined resources for ACL in the system.
     * @return array
     */
    public static function definedResources()
    {
        return array(

                'notAuthenticated' => array(
                        'name' => 'Not Authenticated',
                        'controllerActions' => array(
                                'error' => array('error'),
                                'auth' => array(null),
                                'ajax' => array(null)
                        ),
                        'display' => false
                ),

                'authenticated' => array(
                        'name' => 'Authenticated',
                        'controllerActions' => array(
                                'index' => array('index'),
                                'account' => array(null)
                        ),
                        'display' => false
                ),

                'administrators' => array(
                        'name' => 'Administrators',
                        'controllerActions' => array(
                                'GOD' => array(null)
                        ),
                        'display' => false
                ),

        );
    }

    public static function findResource($controller, $action) {
        $resources = array();
        foreach (self::definedResources() as $resource => $resourceData) {
            foreach ($resourceData as $resourceArray => $resourceSettings) {
                // name, controllerActions, display (or not)
                if ($resourceArray == 'controllerActions') {
                    foreach ($resourceSettings as $resourceControler => $resourceActions) {
                        if ($resourceControler == $controller || $resourceControler == 'GOD') {
                            foreach ($resourceActions as $resourceAction) {
                                if ($resourceAction == $action || $resourceAction === null) {
                                    $resources[] = $resource;
                                }
                            }
                        }
                    }
                }
            }
        }
        return $resources;
    }

}