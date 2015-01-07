<?php
/*  � 2007-2013 eBay Inc., All Rights Reserved */
/* Licensed under CDDL 1.0 -  http://opensource.org/licenses/cddl1.php */

    //show all errors - useful whilst developing
    error_reporting(E_ALL);

    // these keys can be obtained by registering at http://developer.ebay.com
    
    $production         = false;   // toggle to true if going against production
    $compatabilityLevel = 825;    // eBay API version
    
    if ($production) {
        $devID = '2c0a703f-4cd0-44ed-a150-4203e8f53b5a';   // these prod keys are different from sandbox keys
        $appID = 'Musiliud-6fe8-4307-9b05-1cb11c7314af';
        $certID = '056fd9ab-0676-4208-88b6-cf5445907e72';
        //set the Server to use (Sandbox or Production)
        $serverUrl = 'https://api.ebay.com/ws/api.dll';      // server URL different for prod and sandbox
        //the token representing the eBay user to assign the call with
        $userToken = 'YOUR_PROD_TOKEN'; 
        $paypalEmailAddress= 'foladas@yahoo.com';		
    } else {  
        $devID = '2c0a703f-4cd0-44ed-a150-4203e8f53b5a';         // insert your devID for sandbox
        $appID = 'Musiliud-3668-401b-8908-427911144195';   // different from prod keys
        $certID = 'b8744c62-3f4c-4b9d-82a2-fc86d7f90c24';  // need three 'keys' and one token
        //set the Server to use (Sandbox or Production)
        $serverUrl = 'https://api.sandbox.ebay.com/ws/api.dll';
        // the token representing the eBay user to assign the call with
        // this token is a long string - don't insert new lines - different from prod token
        $userToken = 'AgAAAA**AQAAAA**aAAAAA**r525Uw**nY+sHZ2PrBmdj6wVnY+sEZ2PrA2dj6wFk4GhDJSKow2dj6x9nY+seQ**tNMCAA**AAMAAA**GHBJENDpfLcR5mzgAL/CQvV9iNM2cz+6vTJPWRXz9uVDZENl1guWhaKQGIusEA3K/pPQmrXZZ2Ts/+zGbVAUdO3PwkIdOASyIeFIVYMckgWaD8w8+R58lx/uAe2Yj2yuXJyfjgJE49/INBRXc53Lia//ruCJpEzUGHTxri56soYc4PcobySHkVs/bsDqhvlUsvWePVB3RKKGBQLKmTnujHuGfWG4JlxZ4lKwGQH0kwB4AYlDEpiFp/CObu/lSknKMV7IkP57lyITWxUrAzcSIx/XXeUuuCXYEwhLHaRs4t4URVw/yZ9JqPCEz51FhPF733nSrMRKqdPBDM60R/ZnPP5+/SVfOP07WUn6Quh6AylzomJeAmtOw0OCHtzv9YFtgAz2VI2xV+iFGSN8Q+HLU7oP7mPCgKsxpLNuhm2SE1mYREB5MIZY2sIlRFK5LUKZs6quS/j4/PcqJmWyjElOslBa5ZTYdjgB52hIF5A0j0KQjBS2MBKk0VOpnnd6xpK2UdOOTdmSAL2IW67nbUrbwAxYxtFxGLNphaDFQjxVxK1qHQr4f273Biu44dGAeiCQFRUb/9L7mdyOua3f9uijZ3q2mOCCt+adbrc8VLVva/amJpYz7fU9RXBUe9SDe8Xg7lOqwKLfrmD/DKey4RHWfi8NWamCjFC3+22BucwFPp5+ZWEa1f0BO0MpDYfQVBHHgsGd/76JHsLmfR6kYoctBJIhGZVgr0G127eSiJKZnttujhE8Bq9/tEwnjJtPYf2g'; 
		$paypalEmailAddress = 'foladas-facilitator@yahoo.com';		
    }
    
    
?>