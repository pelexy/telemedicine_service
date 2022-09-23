<?php

namespace App\Repositories;

use App\Models\DrugPrescriptionItem;

use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\Hash;
use App\Interfaces\IDrugPrescriptionItemRepository;

class DrugPrescriptionItemRepository implements IDrugPrescriptionItemRepository
{

    private $drug_prescription;


    public function __construct(DrugPrescriptionItem $drug_prescription_item) 
    {
        $this->$drug_prescription_item = $drug_prescription_item;
    }


    public function add(array $attributes)
    {
 
    }

    public function delete($id){

    }

}