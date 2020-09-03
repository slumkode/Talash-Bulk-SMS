<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class My_database extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }
    public function dbInsert($table_name, $data)
    {
        $insertData = $this->db->insert($table_name, $data);
        return $insertData;
    }

    public function dbInsertReturn($table_name, $data)
    {
        $insertData = $this->db->insert($table_name, $data);
        $last_id = $this->db->insert_id();
        return $last_id;
    }

    public function dbReplace($table_name, $data)
    {
        $insertData = $this->db->replace($table_name, $data);
        return $insertData;
    }

    public function updateData($table_name, $column, $key, $data)
    {
        $this->db->where($column, $key);
        $result = $this->db->update($table_name, $data);
        return $result;
    }

    public function sqlUpdate($sql)
    {
        $result = $this->db->query($sql);
        return $result;
    }

    public function getSpecific($table_name, $array)
    {
        $query = $this->db->get_where($table_name, $array);
        if ($query) {
            if ($query->num_rows() > 0) {
                $rows = $query->row();
                return $rows;
            }
        }
    }

    public function getAllSpecific($table, $array)
    {
        $query = $this->db->get_where($table, $array);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $rows) {
                $data[] = $rows;
            }
            return $data;
        }
    }

    public function getAll($db)
    {
        $query = $this->db->get($db);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $rows) {
                $data[] = $rows;
            }
            return $data;
        }
    }

    public function passSQL($sql)
    {
        $query = $this->db->query($sql);

        if ($query)
            if ($query->num_rows() > 0) {
                $rows = $query->row();
                return $rows;
            } else
                return FALSE;
    }

    public function passSQLAll($sql)
    {
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $rows) {
                $data[] = $rows;
            }
            return $data;
        } else {
            return false;
        }
    }

    public function deleteFrom($table_name, $array)
    {
        $result = $this->db->delete($table_name, $array);
        return $result;
    }
}
