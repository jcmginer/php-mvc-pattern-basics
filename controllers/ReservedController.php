<?php

class ReservedController
{
    use Controller;

    /* ~~~ CONTROLLER METHODS ~~~ */

    function getAllReserveds()
    {
        $reserveds = $this->model->get();
        if (isset($reserveds)) {
            $this->view->data = $reserveds;
            $this->view->render("reserved/reservedDashboard");
        }
    }

    function getReserved($request)
    {
        $reserved = null;
        if (isset($request["id"])) {
            $reserved = $this->model->getById($request["id"]);
        }

        $this->view->action = $request["action"];
        $this->view->data = $reserved;
        $this->view->render("reserved/reserved");
    }

    function createReserved($request)
    {
        if (sizeof($_POST) > 0) {
            $reserved = $this->model->create($_POST);

            if ($reserved[0]) {
                header("Location: index.php?controller=Reserved&action=getAllReserveds");
            } else {
                echo $reserved[1];
            }
        } else {
            $this->view->action = $request["action"];
            $this->view->render("reserved/reserved");
        }
    }

    function updateReserved($request)
    {
        if (sizeof($_POST) > 0) {
            $reserved = $this->model->update($_POST);

            if ($reserved[0]) {
                header("Location: index.php?controller=Reserved&action=getAllReserveds");
            } else {
                $this->action = $request["action"];
                $this->error = "The data entered is incorrect, check that there is no other reserved with that brand.";
                $this->view->render("reserved/reserved");
            }
        } else {
            $this->view->render("reserved/reserved");
        }
    }

    function deleteReserved($request)
    {
        $action = $request["action"];
        $reserved = null;
        if (isset($request["id"])) {
            $reserved = $this->model->delete($request["id"]);
            header("Location: index.php?controller=Reserved&action=getAllReserveds");
        }
    }
}