<?php

namespace App\Manager;

use App\Entity\Contact;
use App\Manager\ManagerInterface;
use Vendor\database\Database;
use Vendor\database\Manager;

class ContactManager extends Manager implements ManagerInterface
{
    /**
     * Find one contact by id
     * @param Contact $entity
     * @return mixed
     */
    public function findOne($entity)
    {
        $statement = "SELECT * FROM contact WHERE id = :id LIMIT 1";
        $prepare = $this->db->prepare($statement);
        $prepare->bindValue(":id", $entity->getId());
        $prepare->execute();
        return $prepare->fetch(\PDO::FETCH_CLASS, Contact::class);
    }

    /**
     * Get all contacts
     * @return array|mixed
     */
    public function findAll()
    {
        $query = $this->db->query("SELECT * FROM contact");
        return $query->fetchAll(\PDO::FETCH_CLASS, Contact::class);
    }

    /**
     * Insert a new contact
     * @param Contact $entity
     */
    public function add($entity)
    {
        $statement = "INSERT INTO contact (message, user_id) 
                        VALUES (:message, :user)";

        $prepare = $this->db->prepare($statement);
        $prepare->bindValue(":message", $entity->getMessage());
        $prepare->bindValue(":user", $entity->getUser());
        $prepare->execute();
    }

    /**
     * Edit a contact by id
     * @param Contact $entity
     * @return mixed|void
     */
    public function edit($entity)
    {
        $statement = "UPDATE contact SET 
                message = :message
                WHERE id=:id LIMIT 1";
        $prepare = $this->db->prepare($statement);
        $prepare->bindValue(":message", $entity->getMessage());
        $prepare->bindValue(":id", $entity->getId());
        $prepare->execute();
    }

    /**
     * Delete a contact by id
     * @param Contact entity
     * @return mixed|void
     */
    public function delete($entity)
    {
        $statement = "DELETE FROM contact WHERE id = :id";
        $prepare = $this->db->prepare($statement);
        $prepare->bindValue(":id", $entity->getId());
        $prepare->execute();
    }

    public function findFirst()
    {
        // TODO: Implement findFirst() method.
    }
}
