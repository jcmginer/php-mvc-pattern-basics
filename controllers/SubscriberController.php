<?php

class SubscriberController
{
    use Controller;

    /* ~~~ CONTROLLER METHODS ~~~ */

    function getAllSubscribers()
    {
        $subscribers = $this->model->get();
        if (isset($subscribers)) {
            $this->view->data = $subscribers;
            $this->view->render("subscriber/subscriberDashboard");
        }
    }

    function getSubscriber($request)
    {
        $subscriber = null;
        if (isset($request["id"])) {
            $subscriber = $this->model->getById($request["id"]);
        }

        $this->view->action = $request["action"];
        $this->view->data = $subscriber;
        $this->view->render("subscriber/subscriber");
    }

    function createSubscriber($request)
    {
        if (sizeof($_POST) > 0) {
            $subscriber = $this->model->create($_POST);

            if ($subscriber[0]) {
                header("Location: index.php?controller=Subscriber&action=getAllSubscribers");
            } else {
                echo $subscriber[1];
            }
        } else {
            $this->view->action = $request["action"];
            $this->view->render("subscriber/subscriber");
        }
    }

    function updateSubscriber($request)
    {
        if (sizeof($_POST) > 0) {
            $subscriber = $this->model->update($_POST);

            if ($subscriber[0]) {
                header("Location: index.php?controller=Subscriber&action=getAllSubscribers");
            } else {
                $this->action = $request["action"];
                $this->error = "The data entered is incorrect, check that there is no other subscriber with that plate.";
                $this->view->render("subscriber/subscriber");
            }
        } else {
            $this->view->render("subscriber/subscriber");
        }
    }

    function deleteSubscriber($request)
    {
        $action = $request["action"];
        $subscriber = null;
        if (isset($request["id"])) {
            $subscriber = $this->model->delete($request["id"]);
            header("Location: index.php?controller=Subscriber&action=getAllSubscribers");
        }
    }
}