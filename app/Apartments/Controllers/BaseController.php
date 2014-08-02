<?php namespace Apartments\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Apartments\Services\ResponseInterface;

class BaseController extends Controller
{
    /**
     * Response handler
     *
     * @var ResponseInterface
     */
    public $response;

    /**
     * Request handler
     *
     * @var Illuminate\Http\Request
     */
    public $request;

    /**
     * Construct
     *
     * @param ResponseInterface $response
     */
    public function __construct(ResponseInterface $response, Request $request)
    {
        $this->response = $response;
        $this->request = $request;
    }

    /**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
    protected function setupLayout()
    {
        if (!is_null($this->layout)) {
            $this->layout = View::make($this->layout);
        }
    }
}
