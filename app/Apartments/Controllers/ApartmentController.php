<?php namespace Apartments\Controllers;

use Apartments\Models\Apartment;
use Swagger\Annotations as SWG;

/**
 * @SWG\Resource(
 *   apiVersion="1.0.0",
 *   basePath="http://local.apartments/api/v1",
 *   resourcePath="/apartments",
 *   description="Operations about apartments",
 *   produces="['application/json']"
 * )
 */
class ApartmentController extends BaseController
{
    /**
     * @SWG\Api(
     *   path="/apartments",
     *   @SWG\Operation(
     *     method="GET",
     *     summary="Get all apartments",
     *     notes="Returns an array of all apartments",
     *     type="array",
     *     nickname="index"
     *   )
     * )
     */
    public function index()
    {
        return $this->response->api(Apartment::all());
    }

    /**
     * @SWG\Api(
     *   path="/apartments/{id}",
     *   @SWG\Operation(
     *     method="GET",
     *     summary="Find apartment by ID",
     *     notes="Returns an apartment based on ID",
     *     nickname="show",
     *     @SWG\Parameter(
     *       name="id",
     *       description="ID of apartment that needs to be fetched",
     *       required=true,
     *       type="integer",
     *       format="int",
     *       paramType="path"
     *     ),
     *     @SWG\ResponseMessage(code=404, message="Not found")
     *   )
     * )
     */
    public function show($id)
    {
        return $this->response->api(Apartment::find($id));
    }

    /**
     * @SWG\Api(
     *   path="/apartments",
     *   @SWG\Operation(
     *     method="POST",
     *     summary="Create a new apartment",
     *     notes="Creates a new apartment",
     *     nickname="store",
     *     @SWG\Parameters(
     *       @SWG\Parameter(
     *         name="name",
     *         description="A name of an apartment",
     *         required=true,
     *         type="string",
     *         paramType="query"
     *       ),
     *       @SWG\Parameter(
     *         name="description",
     *         description="A description of an apartment",
     *         type="string",
     *         paramType="query"
     *       ),
     *       @SWG\Parameter(
     *         name="rooms",
     *         description="How many rooms in an apartment",
     *         type="float",
     *         format="int",
     *         paramType="query"
     *       ),
     *       @SWG\Parameter(
     *         name="persons",
     *         description="How much people can apartment accomodate",
     *         type="integer",
     *         format="int",
     *         paramType="query"
     *       )
     *     )
     *   )
     * )
     */
    public function store()
    {
        $apartment = new Apartment;
        $apartment->saveData($this->request->all());

        return $this->response->api($apartment, $apartment->errors()->all());
    }

    /**
     * @SWG\Api(
     *   path="/apartments/{id}",
     *   @SWG\Operation(
     *     method="PUT",
     *     summary="Update apartment data by ID",
     *     notes="Updates an apartment based on ID",
     *     nickname="update",
     *     @SWG\Parameters(
     *       @SWG\Parameter(
     *         name="id",
     *         description="ID of apartment that needs to be updated",
     *         required=true,
     *         type="integer",
     *         format="int",
     *         paramType="path"
     *       ),
     *       @SWG\Parameter(
     *         name="name",
     *         description="A name of an apartment",
     *         required=true,
     *         type="string",
     *         paramType="query"
     *       ),
     *       @SWG\Parameter(
     *         name="description",
     *         description="A description of an apartment",
     *         type="string",
     *         paramType="query"
     *       ),
     *       @SWG\Parameter(
     *         name="rooms",
     *         description="How many rooms in an apartment",
     *         type="float",
     *         format="int",
     *         paramType="query"
     *       ),
     *       @SWG\Parameter(
     *         name="persons",
     *         description="How much people can apartment accomodate",
     *         type="integer",
     *         format="int",
     *         paramType="query"
     *       )
     *     ),
     *     @SWG\ResponseMessage(code=404, message="Not found")
     *   )
     * )
     */
    public function update($id)
    {
        if ($apartment = Apartment::find($id)) {
            $apartment->saveData($this->request->all());
        }

        return $this->response->api($apartment, $apartment->errors()->all());
    }

    /**
     * @SWG\Api(
     *   path="/apartments/{id}",
     *   @SWG\Operation(
     *     method="DELETE",
     *     summary="Delete apartment data by ID",
     *     notes="Deletes an apartment based on ID",
     *     nickname="destroy",
     *     @SWG\Parameter(
     *       name="id",
     *       description="ID of apartment that needs to be deleted",
     *       required=true,
     *       type="integer",
     *       format="int",
     *       paramType="path"
     *     ),
     *     @SWG\ResponseMessage(code=404, message="Not found")
     *   )
     * )
     */
    public function destroy($id)
    {
        if ($apartment = Apartment::find($id)) {
            $apartment->saveData($this->request->all());
        }

        $apartment->delete();

        return $this->response->api($apartment, $apartment->errors()->all());
    }
}
