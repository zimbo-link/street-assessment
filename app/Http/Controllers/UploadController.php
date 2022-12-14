<?php

namespace App\Http\Controllers;
 
use App\Models\FileUpload;
use App\Models\HomeOwners;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class UploadController extends Controller
{
 

    public function fileview(Request $request)
    {
        $homeowners = HomeOwners::paginate(15);
        return view('file-upload', compact(['homeowners']) );
    }

    private function processSep(&$data, $sep_data, $dta = null){
        $total0 = count($sep_data);
        $title0 = $sep_data[0];
        if(isset($dta)){
            $lastname0 = $dta['lastname'];    
        } else { 
            $lastname0 = $sep_data[$total0-1];
        }
        $initial0 = null;
        if(!isset($dta)){
            for ($i = 1; $i < $total0; $i++) {
                if (strlen($sep_data[$i]) < 3) {
                    $initial0 = $sep_data[$i];
                }
            }
        }
        $firstname0 = null;
        if (!isset($dta)) {
            if (!isset($initial0) && $total0 > 2) {
                $firstname0 = $sep_data[$total0 - 2];
            }
        }
        $data0 = [
            "title" => $title0,
            "firstname" => $firstname0,
            "initial" => $initial0,
            "lastname" => $lastname0
        ];
        HomeOwners::create($data0);
        $data[] = $data0;
        return $data0;
    }

    private function processFile($path){
        $data = [];
        $count = 0;
        
        $file = fopen($path, 'r');
        while (($line = fgetcsv($file)) !== FALSE) {
            if($count > 0){
                $line_data = explode(" ", $line[0]);
                $processed = false;
                if(in_array("and", $line_data)){
                    $sep_data = explode("and", $line[0]);
                    $sep_data0 = explode(" ", trim($sep_data[0]));
                    $sep_data1 = explode(" ", trim($sep_data[1]));
                    if(count($sep_data0) > 1 && count($sep_data1) > 1){
                        $this->processSep($data, $sep_data0);
                        $this->processSep($data, $sep_data1);
                        $processed = true;
                    }
                    if(!$processed){
                        $dta = $this->processSep($data, $sep_data1);
                        if(count($sep_data0) > 1){
                            $this->processSep($data, $sep_data0);
                        } else {
                            $this->processSep($data, $sep_data0, $dta);
                        }
                        $processed = true;
                    }
                } 
                if(!$processed && in_array("&", $line_data)){
                    $sep_data = explode("&", $line[0]);
                    $sep_data0 = explode(" ", trim($sep_data[0]));
                    $sep_data1 = explode(" ", trim($sep_data[1]));
                    if(count($sep_data0) > 1 && count($sep_data1) > 1){
                        $this->processSep($data, $sep_data0);
                        $this->processSep($data, $sep_data1);
                        $processed = true;
                    }
                    if(!$processed){
                        $dta = $this->processSep($data, $sep_data1);
                        if(count($sep_data0) > 1){
                            $this->processSep($data, $sep_data0);
                        } else {
                            $this->processSep($data, $sep_data0, $dta);
                        }
                        $processed = true;
                    }
                }
                if(!$processed){
                    $sep_data = explode(" ", $line[0]);
                    $this->processSep($data, $sep_data);
                    $processed = true;
                }
            } 
            $count++;
        }
        fclose($file); 
    }
    
    public function uploadTheFile(Request $request)
    {
            $rules = array(
                'attachment' => 'mimes:csv|max:1000',
            );
            $messages = array(
                'attachment' => ' Image need Less then 1Mb.',
            );

            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return redirect()->route('fileviews')->with('success', 'Successfully Added');
                return redirect()->route('fileviews')->withErrors($validator);
            } else {
                $fileName = time() . '.' . $request->attachment->extension();
                $path = $request->attachment->move(public_path('storage/attachment/'), $fileName);
                $this->processFile('storage/attachment/'.$fileName);
                 
                $upload['file_name'] = $fileName;
                $upload['file_path_location'] = $path;
                FileUpload::create($upload);
                return redirect()->route('fileviews');
            }

    }
}
