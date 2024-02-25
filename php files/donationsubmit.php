<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $FullName = $_POST["FullName"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $zip = $_POST["zip"];
    $cname = $_POST["cname"];
    $ccnum = $_POST["ccnum"];
    $amount = $_POST["amount"];
    $expiry = $_POST["expiry"];
    $cvv = $_POST["cvv"];

    $excelFilePath = 'D:\Kanwal-Hussain\Final-Submission\Donation.xlsx';
    $excelFile = new COM("Excel.Application");
    $excelFile->Workbooks->Open($excelFilePath);

    $sheet = $excelFile->Worksheets(1);

    $lastRow = $sheet->Cells($sheet->Rows->Count, 1)->End(-4162)->Row + 1;

    $sheet->Cells($lastRow, 1)->Value = $FullName;
    $sheet->Cells($lastRow, 2)->Value = $email;
    $sheet->Cells($lastRow, 3)->Value = $address;
    $sheet->Cells($lastRow, 4)->Value = $city;
    $sheet->Cells($lastRow, 5)->Value = $state;
    $sheet->Cells($lastRow, 6)->Value = $zip;
    $sheet->Cells($lastRow, 7)->Value = $cname;
    $sheet->Cells($lastRow, 8)->Value = $ccnum;
    $sheet->Cells($lastRow, 9)->Value = $amount;
    $sheet->Cells($lastRow, 10)->Value = $expiry;
    $sheet->Cells($lastRow, 11)->Value = $cvv;

        // Save and close the Excel file
        $excelFile->ActiveWorkbook->Save();
        $excelFile->Quit();
        echo "<h1>Thank you :)</h1>";
        echo "<p> Thank You for your contribution to better future of pakisani youth and for humanity.</p>";
    } else {
        // If the form was not submitted via POST, redirect or display an error
        echo "Invalid form submission.";
    }