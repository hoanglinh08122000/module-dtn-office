<?php
namespace Dtn\Api\Api\Data;

interface TestApiInterface
{

    const ENTITY_ID = 'entity_id';

    const TITLE = 'title';

    const DESC = 'description';

    public function getId();

    public function setId($id);

    public function getTitle();

    public function setTitle($title);

    public function getDescription();

    public function setDescription($desc);
}
