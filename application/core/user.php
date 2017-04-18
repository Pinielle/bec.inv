<?php

/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 13.02.17
 * Time: 12:40
 */
class User extends Connector
{
    /*
* Select from data base
*/

    public function getAll()
    {
        var_dump($this->email);
        $selectFields = implode(", ", $this->data);
        $sql = "SELECT " . $selectFields . " FROM $this->_table";

        $result = $this->db->query($sql);
        $users = $result->fetchAll(PDO::FETCH_ASSOC);

        foreach ($users as $user)
        {
            echo " 
                ID:         {$user['id']}.<br> 
                email:      {$user['email']},<br> 
                password:   {$user['password']},<br>
                name:       {$user['firstname']},<br>
                lastname:       {$user['lastname']},<br>
                acl:       {$user['acl']},<br>
                logintime:       {$user['logintime']}";



        }
    }

    public function getField()
    {
        $selectFields = implode(", ", $this->data);
        $sql = "SELECT " . $selectFields . " FROM $this->_table" . " WHERE " . $this->condition;
        $result = $this->db->query($sql);
        $users = $result->fetchAll(PDO::FETCH_ASSOC);

        foreach ($users as $user)
        {
            echo " 
                ID:         {$user['id']}.<br> 
                email:      {$user['email']},<br> 
                password:   {$user['password']},<br>
                name:       {$user['firstname']},<br>
                lastname:   {$user['lastname']},<br>
                acl:        {$user['acl']},<br>
                logintime:       {$user['logintime']}";


        }
    }

    public function insertData()
    {
        $insertFields = implode(", ", array_keys($this->insertData));
        $sql = "INSERT INTO " . $this->_table . " (" . $insertFields . ") 
        VALUES ("   . self::EMAIL . ","
            . self::PASSWORD . "," . self::FIRSTNAME . ","
            . self::LASTNAME . "," . self::ACL . "," . self::LOGINTIME .")";
        var_dump($sql);
        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(self::EMAIL, $this->email);
        $stmt->bindValue(self::PASSWORD, $this->password);
        $stmt->bindValue(self::FIRSTNAME, $this->firstname);
        $stmt->bindValue(self::LASTNAME, $this->lastname);
        $stmt->bindValue(self::ACL, $this->acl);
        $stmt->bindValue(self::LOGINTIME, $this->logintime);
        $stmt->execute();

        echo '<p> Затронуто строк:' . $stmt->rowCount() . "<p>";
        echo '<p> ID вставленной записи:' . $this->db->lastInsertId() . "<p>";
    }

    public function updateField()
    {
        $sql = "UPDATE " . $this->_table . " SET "
            . "email = " . self::EMAIL . ","
            . " password = " . self::PASSWORD . ","
            . " firstname = " . self::FIRSTNAME . ","
            . " lastname = " . self::LASTNAME . ","
            . " acl = " . self::ACL
            . " WHERE  " . "id= " . self::USER_ID;
        $stmt = $this->db->prepare($sql);

        $_table = $this->_table;
        $email = $this->email;
        $id = $this->id;
        $password = $this->password;
        $firstname = $this->firstname;
        $lastname = $this->lastname;
        $acl = $this->acl;

        $stmt->bindValue(self::EMAIL,$email);
        $stmt->bindValue(self::USER_ID,$id);
        $stmt->bindValue(self::PASSWORD,$password);
        $stmt->bindValue(self::FIRSTNAME,$firstname);
        $stmt->bindValue(self::LASTNAME,$lastname);
        $stmt->bindValue(self::ACL,$acl);

        $stmt->execute();

        echo '<p> Было затронуто: ' . $stmt->rowCount() . "</p>";
    }

    public function deleteField($id)
    {
        $sql = "DELETE FROM " . $this->_table . " WHERE id= " . self::USER_ID ;
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(self::USER_ID,$id);

        $stmt->execute();
    }

}
