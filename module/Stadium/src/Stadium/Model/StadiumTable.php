<?php
namespace Stadium\Model;

use Zend\Db\TableGateway\TableGateway;

class StadiumTable
{
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }

    public function getStadium($id)
    {
        $id  = (int) $id;
        $rowset = $this->tableGateway->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }

    public function saveStadium(Stadium $stadium)
    {
        $data = array(
            'title' => $stadium->title,
            'address'  => $stadium->address,
            'info'  => $stadium->info,
        );

        $id = (int)$stadium->id;
        if ($id == 0) {
            $this->tableGateway->insert($data);
        } else {
            if ($this->getStadium($id)) {
                $this->tableGateway->update($data, array('id' => $id));
            } else {
                throw new \Exception('Form id does not exist');
            }
        }
    }

    public function deleteStadium($id)
    {
        $this->tableGateway->delete(array('id' => $id));
    }
}