<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Saha Maid Service Form</title>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
    }

    .container {
        width: 800px;
        margin: auto;
        border: 1px solid #000;
        padding: 15px;
    }

    h2, h3 {
        text-align: center;
        margin: 5px 0;
    }

    .header {
        text-align: center;
        font-size: 13px;
    }
    
    .top-header {
        display: grid;
        grid-template-columns: 1fr 3fr 1fr;
        align-items: start;
    }

    .company-info {
        text-align: center;
    }

    .photo-box {
        justify-self: end;
        width: 100px;
        height: 120px;
        border: 1px solid #000;
        text-align: center;
        line-height: 120px;
        font-size: 12px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    table, td, th {
        border: 1px solid #000;
    }

    td {
        padding: 6px;
        font-size: 13px;
    }

    .label {
        width: 30%;
        font-weight: bold;
    }

    .checkbox {
        margin-right: 10px;
    }

    .section-title {
        text-align: center;
        font-weight: bold;
        margin-top: 10px;
    }

    @media print {
        body {
            margin: 0;
        }
    }
</style>
</head>

<body>

<div class="container">

    <div class="top-header">
    
        <div></div> <!-- empty left space -->

        <div class="company-info">
            <h2>SAHA MAID SERVICE AND ENTERPRISE</h2>
            <div class="header">
                Registration No - 2621 Company<br>
                Pan No - AFYES5433H<br>
                Service Area - Howrah, Kolkata, Delhi, Chennai, Bangalore, Hyderabad, Mumbai (Pan India)<br>
                Email ID - 24x7@sahamaidservice.com<br>
                Website - www.sahamaidservice.com<br>
                Phone No - 7003662260 / 8906165191
            </div>
            <h3>Personal Information Full Details of Candidate</h3>
        </div>

        <div class="photo-box">PHOTO</div>

    </div>

    <table>
        <tr>
            <td class="label">Name:</td>
            <td></td>
        </tr>
        <tr>
            <td class="label">Father’s / Husband’s Name:</td>
            <td></td>
        </tr>
        <tr>
            <td class="label">Date of Birth:</td>
            <td></td>
        </tr>
        <tr>
            <td class="label">Gender:</td>
            <td>
                <input type="checkbox"> Male
                <input type="checkbox"> Female
                <input type="checkbox"> Transgender
            </td>
        </tr>
        <tr>
            <td class="label">Marital Status:</td>
            <td>
                <input type="checkbox"> Married
                <input type="checkbox"> Unmarried
                <input type="checkbox"> Widow
                <input type="checkbox"> Divorced
            </td>
        </tr>
        <tr>
            <td class="label">Permanent Address (Native Place):</td>
            <td></td>
        </tr>
        <tr>
            <td class="label">Pin:</td>
            <td></td>
        </tr>
    </table>

    <table>
        <tr>
            <th>Work</th>
            <th>Work Details</th>
        </tr>
        <tr>
            <td style="height:50px;"></td>
            <td></td>
        </tr>
    </table>

    <table>
        <tr>
            <td class="label">Total Work Experience:</td>
            <td></td>
            <td class="label">Qualification:</td>
            <td></td>
        </tr>
        <tr>
            <td class="label">Family Background with Information:</td>
            <td></td>
            <td class="label">Religion:</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td class="label">Nationality:</td>
            <td></td>
        </tr>
    </table>

    <table>
        <tr>
            <td class="label">Language Known:</td>
            <td>
                <input type="checkbox"> Hindi
                <input type="checkbox"> Bengali
                <input type="checkbox"> English
            </td>
        </tr>

        <tr>
            <td class="label">Applied Post For:</td>
            <td>
                <input type="checkbox"> Housemaid
                <input type="checkbox"> Cook
                <input type="checkbox"> Nanny
                <input type="checkbox"> Patient Care
                <br>
                <input type="checkbox"> Japa
                <input type="checkbox"> Pet Care
                <input type="checkbox"> Elder Care
            </td>
        </tr>

        <tr>
            <td class="label">Nurses:</td>
            <td>
                <input type="checkbox"> GNM
                <input type="checkbox"> GDA
                <input type="checkbox"> ANM
                <input type="checkbox"> BSC
                <input type="checkbox"> Para Medical
                <input type="checkbox"> Dialysis Technician
            </td>
        </tr>

        <tr>
            <td class="label">Working Hours in a day:</td>
            <td>
                <input type="checkbox"> 6 HRS
                <input type="checkbox"> 8 HRS
                <input type="checkbox"> 10 HRS
                <input type="checkbox"> 12 HRS
                <input type="checkbox"> 24 HRS
                <input type="checkbox"> Out of Kolkata
            </td>
        </tr>

        <tr>
            <td class="label">Documents Details:</td>
            <td>
                <input type="checkbox"> Aadhar Card
                <input type="checkbox"> Voter Card
                <input type="checkbox"> Pan Card
                <input type="checkbox"> Affidavit
            </td>
        </tr>

        <tr>
            <td class="label">Aadhar Card Number:</td>
            <td></td>
        </tr>

        <tr>
            <td class="label">Remarks:</td>
            <td style="height:50px;"></td>
        </tr>
    </table>

</div>

</body>
</html>