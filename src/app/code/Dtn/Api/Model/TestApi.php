<?php

namespace Dtn\Api\Model;

class TestApi implements \Webkul\TestApi\Api\Data\TestApiInterface
{
    public function getId()
    {
        return 10;
    }

    public function setId($id)
    {
    }

    public function getTitle()
    {
        return 'this is test title';
    }

    public function setTitle($title)
    {
    }

    public function getDescription()
    {
        return 'this is test api description';
    }

    public function setDescription($desc)
    {
    }
}
