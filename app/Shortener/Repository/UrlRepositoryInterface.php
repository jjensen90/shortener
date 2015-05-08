<?php namespace Shortener\Repository;

/**
 * Interface UrlRepositoryInterface
 * @package Shortener\Repository
 */
interface UrlRepositoryInterface
{
    /**
     * @return mixed
     */
    public function all();

    /**
     * @param $id int
     * @return mixed
     */
    public function find($id);

    /**
     * @param $attribute string
     * @param $value mixed
     * @return mixed
     */
    public function findOneBy($attribute, $value);

    /**
     * @param $input mixed
     * @return mixed
     */
    public function create($input);

    /**
     * @param $id mixed
     * @param $input mixed
     * @return mixed
     */
    public function update($id, $input);

    /**
     * @param $identifier mixed
     * @return mixed
     */
    public function delete($identifier);
}