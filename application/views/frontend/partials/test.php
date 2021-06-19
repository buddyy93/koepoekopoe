Skip to content
Features
Business
Explore
Marketplace
Pricing
This repository
Search
Sign in or Sign up
Watch 1  Star 0  Fork 2 satyakresna/ci-dompdf8
Code  Issues 0  Pull requests 0  Projects 0  Insights
Branch: master Find file Copy pathci-dompdf8/application/views/table_report.php
d7138b7  on Jun 23, 2017
@satyakresna satyakresna Initial commit
1 contributor
RawBlameHistory
77 lines (69 sloc)  1.58 KB
<!DOCTYPE html>
<html>
<head>
    <title>Report Table</title>
    <style type="text/css">
        #outtable{
            padding: 20px;
            border:1px solid #e3e3e3;
            width:600px;
            border-radius: 5px;
        }
        .short{
            width: 50px;
        }
        .normal{
            width: 150px;
        }
        table{
            border-collapse: collapse;
            font-family: arial;
            color:#5E5B5C;
        }
        thead th{
            text-align: left;
            padding: 10px;
        }
        tbody td{
            border-top: 1px solid #e3e3e3;
            padding: 10px;
        }
        tbody tr:nth-child(even){
            background: #F6F5FA;
        }
        tbody tr:hover{
            background: #EAE9F5
        }
    </style>
</head>
<body>
<!-- In production server. If you choose this, then comment the local server and uncomment this one-->
<!-- <img src="<?php // echo $_SERVER['DOCUMENT_ROOT']."/media/dist/img/no-signal.png"; ?>" alt=""> -->
<!-- In your local server -->
<img src="<?php echo $_SERVER['DOCUMENT_ROOT']."/ci-dompdf8/media/dist/img/no-signal.png"; ?>" alt="">
<div id="outtable">
    <table>
        <thead>
        <tr>
            <th class="short">#</th>
            <th class="normal">First Name</th>
            <th class="normal">Last Name</th>
            <th class="normal">Username</th>
        </tr>
        </thead>
        <tbody>
        <?php $no=1; ?>
        <?php foreach($users as $user): ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $user['firstname']; ?></td>
            <td><?php echo $user['lastname']; ?></td>
            <td><?php echo $user['email']; ?></td>
        </tr>
        <?php $no++; ?>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
© 2018 GitHub, Inc.
Terms
Privacy
Security
Status
Help
Contact GitHub
API
Training
Shop
Blog
About