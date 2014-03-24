<?php
class ECB_Model_CcarsTable extends Doctrine_Record
{
    public static function getInstance()
    {
        return Doctrine_Core::getTable('ECB_Model_Ccars');
    }

public function getPairs() 
{
    $query = $this->getInstance()
            ->createQuery('cc')
            ->select();
        $statuses = $query->execute();

        $array = array();
        foreach ($statuses as $status) {
            $array[$status->reg] = $status->reg;
        }

        return $array;
}
}