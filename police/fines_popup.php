<?php  
require '../config.php';

 if(isset($_POST["fine_number"]))  
 {  
      $output = '';  
     
      $query = "SELECT * FROM fines WHERE fine_number = ".$_POST["fine_number"]."";  
      $result = mysqli_query($conn, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= ' 

          <div class="form-group">
               <div class="form-row">
                    <div class="col-md-5">
                         <label>Fine Number</label> 
                         <div class="h5 mb-0 font-weight-bold text-gray-800">'.$row["fine_number"].'</div>   
                    </div>
                    <div class="col-md-5">
                         <label>Vehicle Number</label> 
                         <div class="h5 mb-0 font-weight-bold text-gray-800">'.$row["vehicle_number"].'</div>   
                    </div>
                
               </div>
             </div>

             <div class="form-group">
               
                         <label>Status</label> 
                         <div class="h5 mb-0 font-weight-bold text-gray-800">'.$row["status"].'</div>   
               
             </div>

             <div class="form-group">
               <div class="form-row">
                    <div class="col-md-5">
                         <label>Date of Offence</label>   
                         <div class="h5 mb-0 font-weight-bold text-gray-800">'.$row["date_of_offence"].'</div>
                    </div>
                    <div class="col-md-5">
                         <label>Time</label> 
                         <div class="h5 mb-0 font-weight-bold text-gray-800">'.$row["time"].'</div>               
                    </div>

               </div>
             </div>

             <div class="form-group">
               <div class="form-row">
                    <div class="col-md-5">
                         <label>Amount</label>  
                         <div class="h5 mb-0 font-weight-bold text-gray-800">'.$row["amount"].'</div>               
               </div>
               <div class="col-md-5">
               <label>License Number</label>   
               <div class="h5 mb-0 font-weight-bold text-gray-800">'.$row["license_number"].'</div>               
               </div>

               </div>
             </div>


             <div class="form-group">
               
             <label>Nature of offence</label> 
             <div class="h5 mb-0 font-weight-bold text-gray-800">'.$row["nature"].'</div>   
   
          </div>

          <div class="form-group">
               
             <label>Place</label> 
             <div class="h5 mb-0 font-weight-bold text-gray-800">'.$row["place"].'</div>   
   
          </div>

             <div class="form-group">
               <div class="form-row">
                    <div class="col-md-5">
                         <label>Valid From</label>         
                         <div class="h5 mb-0 font-weight-bold text-gray-800">'.$row["date_issue"].'</div>               
               </div>
               <div class="col-md-5">
                         <label>Valid To</label>   
                         <div class="h5 mb-0 font-weight-bold text-gray-800">'.$row["date_expire"].'</div>               
               </div>

               </div>
             </div>

             <div class="form-group">
               <div class="form-row">
                    <div class="col-md-5">
                         <label>Court</label>         
                         <div class="h5 mb-0 font-weight-bold text-gray-800">'.$row["court"].'</div>               
               </div>
               <div class="col-md-5">
                         <label>Court Date</label>   
                         <div class="h5 mb-0 font-weight-bold text-gray-800">'.$row["court_date"].'</div>               
               </div>

               </div>
             </div>

             <div class="form-group">
               <div class="form-row">
                    <div class="col-md-5">
                         <label>Police Station</label>         
                         <div class="h5 mb-0 font-weight-bold text-gray-800">'.$row["police_station"].'</div>               
               </div>
               <div class="col-md-5">
                         <label>Police Officer</label>   
                         <div class="h5 mb-0 font-weight-bold text-gray-800">'.$row["police_id"].'</div>               
               </div>

               </div>
             </div>
                
                ';  
      }  
      $output .= "</table></div>";  
      echo $output;  
 }  
 ?>