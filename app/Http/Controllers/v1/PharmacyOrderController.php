<?php

namespace App\Http\Controllers\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\IPharmacyOrderRepository;
use App\Http\Requests\RatingRequest\CreatePharmacyOrderRequest;

class PharmacyOrderController extends Controller
{
    private $pharmacyorderRepository;

    public function __construct(IPharmacyOrderRepository $pharmacyorderRepository) {
        $this->pharmacyorderRepository = $pharmacyorderRepository;
    }

      /**
     * @OA\Get(
     *      path="/api/v1/pharmacy/requests/all",
     *      operationId="index",
     *      tags={"Pharmacy"},
     *      summary="Get list of pharmacy requests",
     *      description="Returns list all pharmacy requests",
     *      @OA\Parameter(
     *         name="page",
     *         in="query",
     *         description="Page Size",

     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
   
    public function index(){
        $pharmacyorder = $this->pharmacyorderRepository->getAll();
        return response()->json($pharmacyorder, 200);
    }

    public function show(CreatePharmacyOrderRequest $request){

    }
}

