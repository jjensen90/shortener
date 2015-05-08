<?php namespace Shortener\Repository;

use Shortener\Models\Url;
use DB;
use Hashids;

/**
 * Class EloquentUrlRepository
 * @package Shortener\Repository
 */
class EloquentUrlRepository implements UrlRepositoryInterface
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all()
    {
        return Url::all();
    }

    /**
     * {@inheritdoc}
     *
     * @param int $id
     * @return \Illuminate\Support\Collection|mixed|static
     */
    public function find($id)
    {
        return Url::find($id);
    }

    /**
     * {@inheritdoc}
     *
     * @param string $attribute
     * @param mixed $value
     * @return \Illuminate\Support\Collection|mixed|static
     */
    public function findOneBy($attribute, $value)
    {
        return Url::where($attribute, '=', $value)->first();
    }

    /**
     * {@inheritdoc}
     *
     * @param mixed $input
     * @return \Illuminate\Support\Collection|mixed|static
     */
    public function create($input)
    {
        $shortened_url = DB::transaction(function() use ($input)
        {
            // Remove trailing slash to avoid duplicate URLs with/without
            $input['original_url'] = rtrim($input['original_url'],"/");

            // If this original URL has already been saved, retrieve that record
            // rather than create a new one.
            $url = Url::firstOrCreate(['original_url' => $input['original_url']]);

            // If this is truly a new URL, set shortened attribute
            if (empty($url->shortened_url)) {
                // Hash the shortened URL to a Base62-encoded string, this guarantees uniqueness
                // since our primary id CANNOT be duplicated
                $url->setAttribute("shortened_url", Hashids::encode($url->id));
                $url->save();
            }

            return $url;
        });
        return $shortened_url;
    }

    /**
     * {@inheritdoc}
     *
     * @param int $id
     * @return \Illuminate\Support\Collection|mixed|static
     */
    public function update($id, $input)
    {
        $url = Url::find($id);
        $url->fill($input);
        $url->save();
        return $url;
    }

    /**
     * {@inheritdoc}
     *
     * @param int $id
     * @return bool
     */
    public function delete($id)
    {
        Url::destroy($id);
    }
}
