<?php
session_start();
include "connection.php";
header('Content-type: application/json');



$output = array();

if (isset($_POST["hfAction"]) && $_POST["hfAction"] != "") {
    $finalname = "";
    if ($_POST["hfAction"] == "add") {
        $id = $_POST["txtticket"];
		
		
		
        $sql = "";        
        if ($id == "") {
            $sql = "insert into tbl_ticket values(NULL,'" . $_REQUEST['txtuname'] . "','" . $_REQUEST['txtprodname'] . "','" . $_REQUEST['txtproblem'] . "',NOW(),NULL,'" . mysql_real_escape_string($_REQUEST["txtdate"]) . "','" . $_REQUEST['txttime'] . "','pending',NULL,NULL,NULL,'" . mysql_real_escape_string($_REQUEST["txtadd"]) . "','" . $_REQUEST['txtland'] . "','".$_REQUEST['txtpincode']."','".$_REQUEST['txtcontact']."')";
        } else {

            $sql = "update tbl_ticket set emp_id='" . $_REQUEST["txtemp"] . "',status='assign',assign_date= NOW() where ticket_id='" . $id . "'";
        }

        $res = mysql_query($sql) or die(mysql_error());
        if ($res) {
		
       		 $output["msg"] = "Success";
        } else {
            createLog(mysql_error(), $sql);
            $output["msg"] = "error";
        }
    } else {
        $output["msg"] = "error";
    }    
} else if (isset($_POST["ajaxdata"])) {
    $ajaxdata = json_decode($_POST["ajaxdata"]);
    $action = $ajaxdata->action;
    $mydata = array();
    $mydata = $ajaxdata->mydata;

    if ($action == "getdata") {
        $query = "SELECT *, (select user_name from tbl_user where user_id=tbl_ticket.user_id) as username, (select product_name from tbl_products where product_id=tbl_ticket.product_id) as productname, (select emp_name from tbl_employee where emp_id=tbl_ticket.emp_id) as employeename from tbl_ticket ";
        $result = mysql_query($query);
        while ($row = mysql_fetch_assoc($result)) {
            $output[] = $row;
        }
    } else if($action == "getitemwithdate"){
	   $sdate = $mydata[0]->sdate;
	   $edate = $mydata[0]->edate;
        $query = "SELECT *, (select user_name from tbl_user where user_id=tbl_ticket.user_id) as username, (select product_name from tbl_products where product_id=tbl_ticket.product_id) as productname, (select emp_name from tbl_employee where emp_id=tbl_ticket.emp_id) as employeename from tbl_ticket where ticket_date BETWEEN '".$sdate."' AND '".$edate."'";
        $result = mysql_query($query);
        while ($row = mysql_fetch_assoc($result)) {
            $output[] = $row;
        }
	 } else if ($action == "getitem") {
        $id = $mydata[0]->id;
        $query = "SELECT * from tbl_ticket where ticket_id=" . $id;
        $result = mysql_query($query);
        while ($row = mysql_fetch_assoc($result)) {
            $output[] = $row;
        }
    } else if ($action == "setactive") {
        $id = $mydata[0]->id;
        $activeval = $mydata[0]->activevflag;
        $sql = "UPDATE tbl_employee set IsActive='" . $activeval . "' where EmployeeId=" . $id;
        $sql = mysql_query($sql) or die(mysql_error());
        if ($sql) {
            $output["msg"] = "Success";
        } else {
            $output["msg"] = "Fail";
        }
    } else if ($action == "remove") {
        $id = $mydata[0]->id;
        $img = mysql_query("select * from tbl_ticket where ticket_id='" . $id . "'");
        while ($r = mysql_fetch_array($img)) {            
            $sql = "DELETE FROM tbl_ticket where ticket_id=" . $id;
            $sql = mysql_query($sql) or die(mysql_error());
            if ($sql) {
                $output["msg"] = "Success";

            } else {
                $output["msg"] = "Fail";
            }
        }
    }
} else {
    $output["msg"] = "Fail";
}
echo json_encode($output);
?>
