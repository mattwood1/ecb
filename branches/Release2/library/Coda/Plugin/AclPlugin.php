<?php
class Coda_Plugin_AclPlugin extends Zend_Controller_Plugin_Abstract
{
    /**
     * Checks the ACL based on User, Controller and Action
     * @param object | string $user
     * @param string $controller
     * @param string $action
     * @return boolean
     */
    public static function _checkAccess($user, $controller, $action)
    {
        if (!Zend_Registry::isRegistered('acl')) die ('ACL is not ready');
        $acl = Zend_Registry::get('acl');
        $allowed = false;
        if ($user != 'notAuthenticatedUser') {
            foreach ($user->roles as $role) {
                foreach (ECB_Model_RoleTable::findResource($controller, $action) as $resource) {
                    $acl->isAllowed($role->name, $resource) ? $allowed = true : '';
                }
            }
        } else {
            // Unauthenticated users
            foreach (ECB_Model_RoleTable::findResource($controller, $action) as $resource) {
                $acl->isAllowed($user, $resource) ? $allowed = true : '';
            }
        }

        return $allowed;
    }
}
