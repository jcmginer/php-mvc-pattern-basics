<?php

class ReservedModel extends Model
{
    function get()
    {
        $query = $this->db->connect()->prepare("SELECT e.id, e.brand, e.model, e.plate, e.year, e.color
        FROM reserved e
        ORDER BY e.id ASC;");

        try {
            $query->execute();
            $reserveds = $query->fetchAll();
            return $reserveds;
        } catch (PDOException $e) {
            return [];
        }
    }

    function getById($id)
    {
        $query = $this->db->connect()->prepare("SELECT id, brand, model, plate, year, color,
        FROM reserved e
        WHERE id = $id;");

        try {
            $query->execute();
            $reserved = $query->fetch();
            return $reserved;
        } catch (PDOException $e) {
            return [];
        }
    }

    function create($reserved)
    {
        $query = $this->db->connect()->prepare("INSERT INTO reserved (brand, model, plate, year, color)
        VALUES
        (?, ?, ?, ?, ?);");

        $query->bindParam(1, $reserved["brand"]);
        $query->bindParam(2, $reserved["model"]);
        $query->bindParam(3, $reserved["plate"]);
        $query->bindParam(4, $reserved["year"]);
        $query->bindParam(5, $reserved["color"]);

        try {
            $query->execute();
            return [true];
        } catch (PDOException $e) {
            return [false, $e];
        }
    }

    function update($reserved)
    {
        $query = $this->db->connect()->prepare("UPDATE reserved
        SET brand = ?, model = ?, plate = ?, year = ?, color = ?
        WHERE id = ?;");

        $query->bindParam(1, $reserved["brand"]);
        $query->bindParam(2, $reserved["model"]);
        $query->bindParam(3, $reserved["plate"]);
        $query->bindParam(4, $reserved["year"]);
        $query->bindParam(5, $reserved["color"]);
        $query->bindParam(6, $reserved["id"]);

        try {
            $query->execute();
            return [true];
        } catch (PDOException $e) {
            return [false, $e];
        }
    }

    function delete($id)
    {
        $query = $this->db->connect()->prepare("DELETE FROM reserved WHERE id = ?");
        $query->bindParam(1, $id);

        try {
            $query->execute();
            return [true];
        } catch (PDOException $e) {
            return [false, $e];
        }
    }
}