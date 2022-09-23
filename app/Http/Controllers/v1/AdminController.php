<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Interfaces\IAppointmentRepository;
use App\Interfaces\IDoctorRepository;
use App\Interfaces\IDrugListRepository;
use App\Interfaces\ILabTestRequestRepository;
use App\Interfaces\IPharmacyOrderRepository;
use App\Interfaces\ITenantRepository;
use App\Interfaces\IUserRepository;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private $appointment;
    private $user;
    private $doctor;
    private $tenant;
    private $drug;
    private $labtest;
    private $prescription;

    public function __construct(IUserRepository $user, IAppointmentRepository $appointment, IDoctorRepository $doctor, ITenantRepository $tenant, IDrugListRepository $drug, ILabTestRequestRepository $labtest, IPharmacyOrderRepository $prescription)
    {
        $this->appointment = $appointment;
        $this->user = $user;
        $this->doctor = $doctor;
        $this->tenant = $tenant;
        $this->drug = $drug;
        $this->prescription = $prescription;
        $this->labtest = $labtest;
    }



 /**
     * @OA\Get(
     *      path="/api/v1/administrator/summary",
     *      operationId="getSummary",
     *      tags={"Administrator"},
     *      summary="To get count of summary of the application",
     *      description="Returns counts",
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
    public function summary(){
        $users = $this->user->getAll()->count();
        $doctors = $this->doctor->getAll()->count();
        $appointments = $this->appointment->getAll()->count();
        $drug = $this->drug->getAll()->count();
        $tenant = $this->tenant->getAll()->count();
        $labtest = $this->labtest->getAll()->count();
        $prescription = $this->prescription->getAll()->count();

        $message =  [
            'users' => $users,
            'doctors' => $doctors,
            'appointments' => $appointments,
            'drugs' => $drug,
            'tenant' => $tenant,
            'labtest' => $labtest,
            'prescription' => $prescription
        ];

        return response()->json($message, 200);

    }
    /**
     * @OA\Get(
     *      path="/api/v1/administrator/appointments",
     *      operationId="getAppointments",
     *      tags={"Administrator"},
     *      summary="To get all appointments details",
     *      description="Returns Appointments",
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

    public function getappointments(){
        $appointment = $this->appointment->querable()->where('id', '>', 0)->with(['doctor' => function($query){
            $query->with('users');
        }])->with('user')->paginate(10);

        return response()->json($appointment, 200);
    }


}

