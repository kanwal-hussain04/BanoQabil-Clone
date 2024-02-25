<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Username = $_POST["Username"];
    $Phonenumber = $_POST["Phonenumber"];
    $Email = $_POST["Email"];
    $Gender = $_POST["Gender"];
    $Course = $_POST["Course"];

    $excelFilePath = 'D:\Kanwal-Hussain\Final-Submission\Registration.xlsx';
    $excelFile = new COM("Excel.Application");
    $excelFile->Workbooks->Open($excelFilePath);

    $sheet = $excelFile->Worksheets(1);

    $lastRow = $sheet->Cells($sheet->Rows->Count, 1)->End(-4162)->Row + 1;

    $sheet->Cells($lastRow, 1)->Value = $Username;
    $sheet->Cells($lastRow, 2)->Value = $Phonenumber;
    $sheet->Cells($lastRow, 3)->Value = $Email;
    $sheet->Cells($lastRow, 4)->Value = $Gender;
    $sheet->Cells($lastRow, 5)->Value = $Course;

        // Save and close the Excel file
        $excelFile->ActiveWorkbook->Save();
        $excelFile->Quit();
        echo "<h1>Thank you :)</h1>";
        echo "<p> Bano Qabil team has recieved your request will get back to you shortly.</p>";
    } else {
        // If the form was not submitted via POST, redirect or display an error
        echo "Invalid form submission.";
    }
    

    