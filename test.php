
<?php
    $db = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = 128.199.16.193)(PORT = 1521)))(CONNECT_DATA=(SID=cdb)))" ;

    if($conn = OCILogon("SparkDatabox1", "SparkDatabox1!", $db))
    {
       // echo "Successfully connected to Oracle.\n";
       // OCILogoff($conn);
    }
    else
    {
        $err = OCIError();
        echo "Connection failed." . $err[text];
    }
    $sql = 'BEGIN GET_OPPORTUNITY_COUNT(:entries); END;';
    $stmt = oci_parse($conn, $sql);
    //oci_bind_by_name($stmt,':v_id_number',$id_number,32);
    // Create a new cursor resource
    $entries = oci_new_cursor($conn);
    // Bind the cursor resource to the Oracle argument
    oci_bind_by_name($stmt,":entries",$entries,-1,OCI_B_CURSOR);
    // Execute the statement
    oci_execute($stmt);
    // Execute the cursor
    oci_execute($entries);


    $sql = 'BEGIN GET_OPPORTUNITY_TYPE(:entriest); END;';
    $stmt = oci_parse($conn, $sql);
    $id_number = 1001;
    //oci_bind_by_name($stmt,':v_id_number',$id_number,32);
    // Create a new cursor resource
    $entriest = oci_new_cursor($conn);
    // Bind the cursor resource to the Oracle argument
    oci_bind_by_name($stmt,":entriest",$entriest,-1,OCI_B_CURSOR);
    // Execute the statement
    oci_execute($stmt);
    // Execute the cursor
    oci_execute($entriest);


    $sql = 'BEGIN GET_OPPORTUNITY_DETAILS(:v_id_number,:entriesd); END;';
    $stmt = oci_parse($conn, $sql);
    $id_number = 1001;
    oci_bind_by_name($stmt,':v_id_number',$id_number,32);
    // Create a new cursor resource
    $entriesd = oci_new_cursor($conn);
    // Bind the cursor resource to the Oracle argument
    oci_bind_by_name($stmt,":entriesd",$entriesd,-1,OCI_B_CURSOR);
    // Execute the statement
    oci_execute($stmt);
    // Execute the cursor
    oci_execute($entriesd);
  
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
        <style>
            .circle
            {
              
                width: 100px;
                height: 100px;
                line-height: 100px;
                border-radius: 50%;
                font-size: 12px;
                color: #fff;
                text-align: center;
                background: #021376;
                position: relative;
            
            }
            .circle span
            {
               /* font-weight:bold; */
            }
            .sd
            {
                position: absolute;
                top: 25px;
                left: 40%;
            }
            .c2
            {
                height: 120px;
                width: 120px;
                line-height: 120px;
            }
            .circles
            {
                display: grid;
                grid-template-columns: auto auto;
                align-items: center;
                justify-content: flex-start;
                grid-gap:10px;
            }
            .mybutton
            {
                background: darkblue;
                color: white;
                height: 40px;
                /* line-height: 40px; */
                /* cursor: pointer; */
                margin: 5px;
                border-radius: 5px;
            }
            .mybutton:hover
            {
                background:white;
                border:1px solid darkblue;
            }
            .mybutton:active {
                background:white;
                border:1px solid darkblue;
                color:black;
                }
                .mybutton:focus {
                background:white;
                border:1px solid darkblue;
                color:black;
                }
        </style>
    </head>
    <body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item active">
            <a class="nav-link" href="#">Oppurtunites</a>
            </li>
           
        </ul>
        </nav>
        <div class="container-fluid mt-2">
       
            <div class="row">
                <div class="col-md-6">
                    <h4>Opportunities Count</h4>
                    <div class="circles">
                    <?php
                    $count = 0;
                    while ($entry = oci_fetch_array($entries))
                        {
                            $count++;
                            echo "<div class='circle c".$count."'><span>".$entry[0]."</span><span class='sd'>".$entry[1]."</span></div>";
                        }
                    ?>
                    </div>
                    
                </div>
                <div class="col-md-6">
                <h4>Opportunities Types</h4>
                <?php
                    $count = 0;
                    while ($entryt = oci_fetch_array($entriest))
                        {
                            $count++;
                            echo "<button class='btn mybutton' data-id='".$entryt[0]."'><span class=''>".$entryt[1]."</span></button>";
                        }
                    ?>
                    <button class='btn mybutton' data-id='all'><span class=''>Show All</span></button>
                </div>
                <div class="col-md-12 mt-5">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>email</th>
                        <th>phone</th>
                        <th>age</th>
                        <th>DOB</th>
                        <th>spouse name</th>
                        <th>wedding date</th>
                        <th>account number</th>
                        <th>balance</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $count = 0;
                    while ($row = oci_fetch_array($entriesd))
                    {?>
                    <tr class="row-tr" id="row-<?php echo $row['0'];?>">
                        <td><?php echo $row['0'];?></td>
                        <td><?php echo $row['1'];?></td>
                        <td><?php echo $row['2'];?></td>
                        <td><?php echo $row['3'];?></td>
                        <td><?php echo $row['4'];?></td>
                        <td><?php echo $row['5'];?></td>
                        <td><?php echo $row['6'];?></td>
                        <td><?php echo $row['7'];?></td>
                        <td><?php echo $row['8'];?></td>
                        <td><?php echo $row['9'];?></td>
                    </tr>
                    <?php
                    }
                    ?>
                    
                   
                    </tbody>
                </table>
                </div>
            </div>
        </div>
       <script>
           $(document).ready(function(){
            $(".mybutton").click(function(e)
            {
                var id = $(this).attr("data-id");
                if(id != "all")
                {
                    $(".row-tr").hide();
                    $("#row-"+id).show();
                }
                else{
                    $(".row-tr").show();
                }
               
            });
            });
       </script>
      
    </body>
    </html>