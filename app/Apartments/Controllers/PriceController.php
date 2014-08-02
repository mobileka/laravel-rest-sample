<?php namespace Apartments\Controllers;

use Apartments\Models\Price;
use Apartments\Facades\Input;

/**
 * @SWG\Resource(
 *   apiVersion="1.0.0",
 *   basePath="http://local.apartments/api/v1",
 *   resourcePath="/prices",
 *   description="Operations about apartment prices",
 *   produces="['application/json']"
 * )
 */
class PriceController extends BaseController
{

    /**
     * @SWG\Api(
     *   path="/apartments/{apartmentId}/prices",
     *   @SWG\Operation(
     *     method="GET",
     *     summary="Find prices of a particular apartment by apartment ID",
     *     notes="Finds prices of a particular apartment by apartment ID",
     *     nickname="index",
     *     @SWG\Parameter(
     *       name="apartmentId",
     *       description="ID of apartment which prices need to be fetched",
     *       required=true,
     *       type="integer",
     *       format="int",
     *       paramType="path"
     *     ),
     *   )
     * )
     */
    public function index($apartmentId)
    {
        return $this->response->api(Price::whereApartmentId($apartmentId)->get());
    }

    /**
     * @SWG\Api(
     *   path="/apartments/{apartmentId}/prices/{priceId}",
     *   @SWG\Operation(
     *     method="GET",
     *     summary="Find apartment by ID",
     *     notes="Returns an apartment based on ID",
     *     nickname="show",
     *     @SWG\Parameter(
     *       name="apartmentId",
     *       description="ID of apartment we are interacting with",
     *       required=true,
     *       type="integer",
     *       format="int",
     *       paramType="path"
     *     ),
     *     @SWG\Parameter(
     *       name="priceId",
     *       description="ID of apartment price that needs to be fetched",
     *       required=true,
     *       type="integer",
     *       format="int",
     *       paramType="path"
     *     ),
     *     @SWG\ResponseMessage(code=404, message="Not found")
     *   )
     * )
     */
    public function show($apartmentId, $priceId)
    {
        return $this->response->api(Price::whereId($priceId)->whereApartmentId($apartmentId)->get());
    }

    /**
     * @SWG\Api(
     *   path="/apartments/{apartmentId}/prices/{priceId}",
     *   @SWG\Operation(
     *     method="POST",
     *     summary="Create a new apartment price",
     *     notes="Creates a new apartment price",
     *     nickname="store",
     *     @SWG\Parameter(
     *       name="apartmentId",
     *       description="ID of apartment we are interacting with",
     *       required=true,
     *       type="integer",
     *       format="int",
     *       paramType="path"
     *     ),
     *     @SWG\Parameter(
     *       name="price",
     *       description="Actual price value",
     *       required=true,
     *       type="float",
     *       format="float",
     *       paramType="query"
     *     ),
     *     @SWG\Parameter(
     *       name="valid_from",
     *       description="A price is valid from this date",
     *       type="string",
     *       format="date",
     *       paramType="query"
     *     ),
     *     @SWG\Parameter(
     *       name="valid_to",
     *       description="A price is valid until this date",
     *       type="string",
     *       format="date",
     *       paramType="query"
     *     )
     *   )
     * )
     */
    public function store($apartmentId)
    {
        $price = new Price;
        $price->saveData(Input::appendParam($this->request->all(), ['appartment_id' => $apartmentId]));

        return $this->response->api($price, $price->errors()->all());
    }

    /**
     * @SWG\Api(
     *   path="/apartments/{apartmentId}/prices/{priceId}",
     *   @SWG\Operation(
     *     method="PUT",
     *     summary="Update an apartment price",
     *     notes="Updates an apartment price",
     *     nickname="show",
     *     @SWG\Parameter(
     *       name="apartmentId",
     *       description="ID of apartment we are interacting with",
     *       required=true,
     *       type="integer",
     *       format="int",
     *       paramType="path"
     *     ),
     *     @SWG\Parameter(
     *       name="priceId",
     *       description="ID of apartment price that needs to be fetched",
     *       required=true,
     *       type="integer",
     *       format="int",
     *       paramType="path"
     *     ),
     *     @SWG\Parameter(
     *       name="price",
     *       description="Actual price value",
     *       required=true,
     *       type="float",
     *       format="float",
     *       paramType="query"
     *     ),
     *     @SWG\Parameter(
     *       name="valid_from",
     *       description="A price is valid from this date",
     *       type="string",
     *       format="date",
     *       paramType="query"
     *     ),
     *     @SWG\Parameter(
     *       name="valid_to",
     *       description="A price is valid until this date",
     *       type="string",
     *       format="date",
     *       paramType="query"
     *     ),
     *     @SWG\ResponseMessage(code=404, message="Not found")
     *   )
     * )
     */
    public function update($apartmentId, $priceId)
    {
        if ($price = Price::find($priceId)) {
            $price->saveData(Input::appendParam($this->request->all(), ['appartment_id' => $apartmentId]));
        }

        return $this->response->api($price, $price->errors()->all());
    }

    /**
     * @SWG\Api(
     *   path="/apartments/{apartmentId}/prices/{priceId}",
     *   @SWG\Operation(
     *     method="DELETE",
     *     summary="Delete an apartment price",
     *     notes="Deletes an apartment price",
     *     nickname="show",
     *     @SWG\Parameter(
     *       name="apartmentId",
     *       description="ID of apartment we are interacting with",
     *       required=true,
     *       type="integer",
     *       format="int",
     *       paramType="path"
     *     ),
     *     @SWG\Parameter(
     *       name="priceId",
     *       description="ID of apartment price that needs to be fetched",
     *       required=true,
     *       type="integer",
     *       format="int",
     *       paramType="path"
     *     ),
     *     @SWG\ResponseMessage(code=404, message="Not found")
     *   )
     * )
     */
    public function destroy($apartmentId, $priceId)
    {
        if ($price = Price::find($id)) {
            $price->saveData(Input::appendParam($this->request->all(), ['appartment_id' => $apartmentId]));
        }

        $price->delete();

        return $this->response->api($price, $price->errors()->all());
    }
}
