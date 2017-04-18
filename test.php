<?php
class qwe
{
    public function selectAll()
    {
        $sql = "SELECT * FROM $this->_table";
        $result = $this->db->query($sql);

        while ($user = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "{$user['id']}.username:{$user['email']}, password: {$user['password']}";
        }
    }
}