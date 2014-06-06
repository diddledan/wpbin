<?php

namespace WPBin\Usecase\Paste;

use WPBin\Usecase\Paste\CreateData;
use WPBin\Usecase\Paste\CreateRepository;
use WPBin\Tool\Validator;

class Create
{
    private $repo;
    private $valid;

    public function __construct(CreateRepository $repo, Validator $valid)
    {
        $this->repo = $repo;
        $this->valid = $valid;
    }

    public function interact(CreateData $data)
    {
        $this->valid->check($data);

        return $this->repo->create(
            $data->title,
            $data->content,
            $data->parent_id,
            $data->user_id
        );
    }
}