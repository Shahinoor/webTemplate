<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Bootstrap 101 Template</title>

        <!-- Bootstrap -->
        <link href="<?php echo base_url()?>/assets/css/bootstrap.min.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="container-fluid"> 
            <div class="row">

                <div class="row">
                    <div class="col-xs-6 col-md-4"></div>
                    <div class="col-xs-6 col-md-4">
                        <table border="1">
                            <tbody>
                                <tr>
                                    <th>Customer Name </th>
                                    <td> <?php echo $data->name; ?></td>
                                </tr>
                                <tr>
                                    <th> Email </th>
                                    <td> <?php echo $data->email; ?></td>
                                </tr>
                                <tr>
                                    <th> Phone no </th>
                                    <td> <?php echo $data->phone; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-xs-6 col-md-4"></div>
                    <a href="<?php echo site_url('controller/view_studentinfo');?>">View All Information</a>
                </div>
            </div>
        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="<?php echo base_url()?>/assets/js/bootstrap.min.js"></script>
    </body>
</html>