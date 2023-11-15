<?php  
//select.php  
include('../../includes/config.php');
if(isset($_POST["uni_id"]))
{
 $output = '';
 $query = "SELECT * FROM `employee` JOIN `walkin` ON employee.uni_id = walkin.uni_id WHERE walkin.uni_id = '".$_POST["uni_id"]."'";
 $result = mysqli_query($con, $query);
 while($row = mysqli_fetch_array($result))
    {
     $output .= '
                 <input type="hidden" name="uni_id" value="'.$_POST["uni_id"].'">
                 <label class="form-label" for="inputEmail4">Employee Name</label>
                 <input class="form-control" disabled type="text" id="hr_name" value="'.$row['f_name'].' '.$row['m_name'].' '.$row['l_name'].'">
                 <label class="form-label" for="inputEmail4">Department<span class="text-danger"> *</span></label>
                 <select class="form-control" name="department" id="edit_department">
                    <option value="" >.....Select Department....</option>';
                    $sel1=mysqli_query($con,"SELECT * FROM `department`");
                    while($row1=mysqli_fetch_assoc($sel1)){
                    $selected = ( $row['department']==$row1['department'] ? 'selected' : '' );    
                    $output .= '<option value="'.$row1['department'].'" '.$selected.'>'.$row1['department'].'</option>';
                    }
                    $output .= '</select>

                 <label class="form-label" for="inputEmail4">Designation<span class="text-danger"> *</span></label>
                 <select class="form-control" name="post" id="edit_designation">
                <option value="" >.....Select Designation....</option>';
                    $sel1=mysqli_query($con,"SELECT * FROM `designation`");
                    while($row1=mysqli_fetch_assoc($sel1)){
                    $selected = ( $row['post']==$row1['ds_id'] ? 'selected' : '' );    
                    $output .= '<option value="'.$row1['ds_id'].'" '.$selected.'>'.$row1['designation'].'</option>';
                    }
                $output .= '</select>
     ';
     }
    echo $output;
}
?>