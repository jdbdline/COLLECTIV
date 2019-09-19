
<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>OBERHOLSTER COLLECTIV</title>
  <meta name="description" content="COLLECTIV">
  <meta name="author" content="JD Oberholster">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" ></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="<?=base_url('application/assets/js/bootbox.min.js');?>" ></script>

    <style>
        .inline-block {
            display: inline-block;
        }
        .pill{
            text-align: center;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 20px;
            padding-left: 40px;
            padding-right: 40px;

        }
        .form-container{
            align-items: center;
            justify-content: space-around;
            display: flex;

        }
        #footer_bar{
            background-color:#4D4D4D;
            padding: 15px;
            color:#A0A0A0;
        }
        label{
            color: #7E7E7E;
        }
        .error-class{
            color: #656162;
            border-left : 5px solid #FF0000;
        }
        .success-class{
            color: #656162;
            border-left : 5px solid #00BC4E;
        }
        table{
            margin-top  :80px;
            margin-left : 30px;
            margin-right: 30px;
            color : #949494 !important;
            width: 97% !important;
        }
        tr:nth-child(odd) {
            background: #EFEFEF
        }
        .table td{
            border: 0px solid #ffffff !important;
        }
        .table th{
            border: 0px solid #ffffff !important;
        }
    </style>
</head>

<body>


<div id = "header" class="fixed-top" style="border-bottom: 2px solid #ABABAB;">

    <img src="<?=base_url('application/assets/img/logo.svg');?>" style="height:30px; margin:15px;" class="pull-left inline-block">
    <div class="inline-block" style="float: right; margin-top: 15px; margin-right: 15px; ">
        <h9 >PHP Test</h9>
    </div>
</div>