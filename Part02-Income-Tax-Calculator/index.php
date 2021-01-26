<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Income Tax Calculator</title>

    <style>
        body {
            margin-left: 10px;
            margin-top: 10px;
background: #DC2424;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #4A569D, #DC2424);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #4A569D, #DC2424); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

        }

        .container {
            display: flex;
            margin-top: 15%;
        }

        table {
            margin: 0;
            width: 35%;
            line-height: 40px;
            margin: auto;
            border-collapse: collapse;
        }


        table td {
            width: 33%;
            text-align: center;
        }

        .inline-block {
            display: inline-block;
            text-align: left;
        }

        form {
            margin-top: 20px;
            margin-left: 10%;
        }

        table,
        tr,
        td {
            border: 2px solid black;
        }

        fieldset {
            height: 200px;
        }

        button {
            width: 120px;
            height: 40px;
        }
    </style>
</head>

<body>
    <?php
         
   $salary =$salaryError = $paidType = $paidTypeError = $allowance  = $allowanceError = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST["salary"])) {
                    $salaryError = "Salary is required";
                } else {
                    $salary = test_input($_POST["salary"]);
                    if(!is_numeric($salary)){
                        $salaryError = "Please enter a number";
                    }
                }
                if (empty($_POST["type"])) {
                    $paidTypeError = "Type is required";
                } else {
                    $paidType = test_input($_POST["type"]);
                }
                if (empty($_POST["allowance"])) {
                    $allowanceError = "Tax Free Allowance is required";
                } else {
                    $allowance = test_input($_POST["allowance"]);
                    if(!is_numeric($allowance)){
                        $allowanceError = "Please enter a number";
                    }
                }
            
                $tax = $nssf = $total = $allowanceType = $yearlySalary = 0;
                if (isset($paidType) && $paidType=="yearly"){
                    $yearlySalary = $salary;
                    $allowanceType = $allowance;
                    if ($yearlySalary < 10000){
                        $total = $yearlySalary + $allowanceType;
                    }
                    elseif($yearlySalary > 10000 && $yearlySalary < 25000){
                        $tax = $yearlySalary * (11 / 100);
                        $nssf = $yearlySalary * (4 / 100);
                        $total = ($yearlySalary - ($tax + $nssf)) + $allowanceType;
                    }
                    elseif($yearlySalary > 25000 && $yearlySalary < 50000){
                        $tax = $yearlySalary * (30 / 100);
                        $nssf = $yearlySalary * (4 / 100);
                        $total = ($yearlySalary - ($tax + $nssf)) + $allowanceType;
                    }
                    else{
                        $tax = $yearlySalary * (45 / 100);
                        $nssf = $yearlySalary * (4 / 100);
                        $total = ($yearlySalary - ($tax + $nssf)) + $allowanceType;
                    }
                }
                elseif(isset($paidType) && $paidType=="monthly"){
                    $yearlySalary = $salary * 12;
                    $allowanceType = $allowance * 12;
                    if ($yearlySalary < 10000){
                        $total = $yearlySalary + $allowanceType;
                    }
                    elseif($yearlySalary > 10000 && $yearlySalary < 25000){
                        $tax = $yearlySalary * (11 / 100);
                        $nssf = $yearlySalary * (4 / 100);
                        $total = ($yearlySalary - ($tax + $nssf)) + $allowanceType;
                    }
                    elseif($yearlySalary > 25000 && $yearlySalary < 50000){
                        $tax = $yearlySalary * (30 / 100);
                        $nssf = $yearlySalary * (4 / 100);
                        $total = ($yearlySalary - ($tax + $nssf)) + $allowanceType;
                    }
                    else{
                        $tax = $yearlySalary * (45 / 100);
                        $nssf = $yearlySalary * (4 / 100);
                        $total = ($yearlySalary - ($tax + $nssf)) + $allowanceType;
                    }
                }
                $monthlySalary = $monthlyTax = $monthlyNSSF= $monthlyTotalSalary  = 0;
                $monthlySalary = $yearlySalary / 12;
                $monthlyTax = $tax / 12;
                $monthlyNSSF = $nssf / 12;
                $monthlyTotalSalary = $total / 12;

                
            }
            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
?>


    <div class="container">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <fieldset>
                <legend>Income Tax Calculator:</legend>
                <input type="text" id="salary" name="salary">
                <label for="salary">Salary in USD</label>
                <br>
                <span class="error"><?php echo $salaryError;?></span>
                <br>
                <input type="radio" name="type" id="monthly" value="monthly">
                <label for="monthly">monthly</label>
                <input type="radio" name="type" id="yearly"  value="yearly">
                <label for="yearly">yearly</label>
                <br>
                <span class="error"><?php echo $paidTypeError;?></span>
                <br>
                <input type="text" name="allowance" id="allowance">
                <label for="allowance">Tax Free Allowance in USD</label>
                <br>
                <span class="error"><?php echo $allowanceError;?></span>
                <br>
                <button class="button" type="submit" name="submit" value="Calculate">Calculate</button>
                <button type="reset">Reset</button>
            </fieldset>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ($salaryError == "" && $paidTypeError == "" && $allowanceError == ""){
            echo "<table>
            <tr>
                <td>Income with Taxes</td>
                <td>monthly</td>
                <td>yearly</td>
            </tr>
            <tr>
                <td>Total Salary</td>
                <td>$monthlySalary</td>
                <td>$yearlySalary</td>
            </tr>
            <tr>
                <td>Tax Amount</td>
                <td>$monthlyTax</td></td>
                <td>$tax</td>
            </tr>
            <tr>
                <td>Social Security Fee</td>
                <td>$monthlyNSSF</td>
                <td>$nssf</td>
            </tr>
            <tr>
                <td>Salary After Tax</td>
                <td>$monthlyTotalSalary</td>
                <td>$total</td>
            </tr>
            </table>";
            }
        }
        ?>

    </div>
</body>

</html>
