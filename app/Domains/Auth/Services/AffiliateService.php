<?php

namespace App\Domains\Auth\Services;

use Illuminate\Support\Facades\Storage;
use App\Domains\Auth\Models\Affiliate;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserService.
 */
class AffiliateService extends BaseService
{
    /**
     * UserService constructor.
     *
     * @param  Affiliate  $affiliate
     */
    public function __construct(Affiliate $affiliate)
    {
        $this->model = $affiliate;
    }

    /**
     * @param  
     * @return mixed
     *
     * @throws GeneralException
     */
    public function loadFromFile()
    {
        if (Storage::disk('local')->exists('affiliates.txt')) {
            $contentJson = Storage::get('affiliates.txt');

            foreach(explode(PHP_EOL, $contentJson) as $line) {
                $affiliate = json_decode($line);
                
                if(!$affiliate) break;

                $dist = $this->affiliateInRangeToInvite($affiliate->latitude, $affiliate->longitude);

                if($dist <= 100){
                    $affiliatesToInsert = ['affiliate_id' => $affiliate->affiliate_id, 'name' => $affiliate->name, 'latitude' => $affiliate->latitude, 'longitude' => $affiliate->longitude]; 
                    $this->model::firstOrCreate($affiliatesToInsert);
                }   
            }
        }
        else{
            return false;
        }

        return true;

    }

    /**
     * @param  string lat
     * @param  string lon
     * @return mixed
     *
     * @throws 
     */
    public function affiliateInRangeToInvite($lat, $lon)
    {
        // Dublin office location
        $dublinOfficeLat=53.3340285;
        $dublinOfficeLon=-6.2535495;

        $theta = $dublinOfficeLon - $lon;

        $dist = sin(deg2rad($dublinOfficeLat)) * sin(deg2rad($lat)) +  cos(deg2rad($dublinOfficeLat)) * cos(deg2rad($lat)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $kms = $miles * 1.609344;
  
        return $kms;

    }

}
