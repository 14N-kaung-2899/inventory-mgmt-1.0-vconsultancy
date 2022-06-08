
        $countstorage = Storage::count();
        $storageidlist = Storage::orderBy('id','asc')->get(['storageid']);

        //Creating Storage Abbr List (From Database Existing Storage ID)
        for ($loop1 = 0; $loop1 < $countstorage; $loop1++) {
            $storageabbrlist[($loop1)] = substr($storageidlist[$loop1]->storageid,0,3);
        }  

        //Removing space and getting character countsof input category
        $nospaceinput = str_replace(" ", "", request('name'));
        $length = strlen($nospaceinput);

        //Adding default
        $checking[(0)] = 'D';
        $checking[(1)] = 'D';

        //Adding single character to array
        for ($loop2 = 0; $loop2 < $length; $loop2++) {
            $input[($loop2)] = strtoupper (substr($nospaceinput,($loop2),1));
        }  
        
        if($countstorage>0){
            if($countcategory==0){
                $inputabbr = strtoupper (substr(request('name'),0,3));
            }else{
                for ($loop3 = 0; $loop3 < ($length-2); $loop3++) {
                    for ($loop4 = 0; $loop4 < $countstorage; $loop4++) {
                        if($storageabbrlist[$loop4] == ($input[0].$input[1].$input[($loop3+2)])){
                            $checking[($loop3+2)] = 'F';
                            break;
                        }else{
                            $checking[($loop3+2)] = 'NF';
                        }
                    }  
                }              
            }
        }else{
            $storage->storageid = strtoupper (substr(request('name'),0,3)).'-'.(request('sid'));
        }


        for($loop5 = 0; $loop5 < count($checking); $loop5++){
            if( $checking[$loop5] == 'NF'){
                $storageid = ($input[0].$input[1].$input[$loop5]).request('sid');
                break;
            }
        }