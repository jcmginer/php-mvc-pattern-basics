<?php

class SubscriberModel extends Model
{
    function get()
    {
        $query = $this->db->connect()->prepare("SELECT e.id, e.brand, e.model, e.plate, e.year, e.color
        FROM subscriber e
        ORDER BY e.id ASC;");

        try {
            $query->execute();
            $subscribers = $query->fetchAll();
            return $subscribers;
        } catch (PDOException $e) {
            return [];
        }
    }

    function getById($id)
    {
        $query = $this->db->connect()->prepare("SELECT id, brand, model, plate, year, color
        FROM subscriber e
        WHERE id = $id;");

        try {
            $query->execute();
            $subscriber = $query->fetch();
            return $subscriber;
        } catch (PDOException $e) {
            return [];
        }
    }

    function create($subscriber)
    {
        $query = $this->db->connect()->prepare("INSERT INTO subscriber (brand, model, plate, year, color)
        VALUES
        (?, ?, ?, ?, ?);");

        $query->bindParam(1, $subscriber["brand"]);
        $query->bindParam(2, $subscriber["model"]);
        $query->bindParam(3, $subscriber["plate"]);
        $query->bindParam(4, $subscriber["year"]);
        $query->bindParam(5, $subscriber["color"]);

        try {
            $query->execute();
            return [true];
        } catch (PDOException $e) {
            return [false, $e];
        }
    }

    function update($subscriber)
    {
        $query = $this->db->connect()->prepare("UPDATE subscriber
        SET brand = ?, model = ?, plate = ?, year = ?, color = ?
        WHERE id = ?;");

        $query->bindParam(1, $subscriber["brand"]);
        $query->bindParam(2, $subscriber["model"]);
        $query->bindParam(3, $subscriber["plate"]);
        $query->bindParam(4, $subscriber["year"]);
        $query->bindParam(5, $subscriber["color"]);
        $query->bindParam(6, $subscriber["id"]);

        try {
            $query->execute();
            return [true];
        } catch (PDOException $e) {
            return [false, $e];
        }
    }

    function delete($id)
    {
        $query = $this->db->connect()->prepare("DELETE FROM subscriber WHERE id = ?");
        $query->bindParam(1, $id);

        try {
            $query->execute();
            return [true];
        } catch (PDOException $e) {
            return [false, $e];
        }
    }
}