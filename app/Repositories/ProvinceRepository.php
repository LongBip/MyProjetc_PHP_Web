<?php

namespace App\Repositories;

use App\Repositories\Interfaces\ProvinceRepositoryInterface;
use App\Models\Province;
use App\Repositories\BaseRepository;
/**
 * @package App\Repositories
 */
class ProvinceRepository extends BaseRepository implements ProvinceRepositoryInterface
{
    protected $model;
public function __construct(
   Province $model 
){
$this-> model =$model;
}

}
