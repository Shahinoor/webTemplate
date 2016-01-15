<!doctype html>
<html>
    <head>
        <style type="text/css">
            body {font-family:Arial, Sans-Serif;}

            #container {width:400px; margin:0 auto;}

            /* Nicely lines up the labels. */
            form label {display:inline-block; width:140px;}

            /* You could add a class to all the input boxes instead, if you like. That would be safer, and more backwards-compatible */
            form input[type="text"],
            form input[type="password"],
            form input[type="email"] {width:177px;}
            form .line {clear:both;}
            form .line.submit {text-align:center; margin-right: 58px;}

        </style>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script>
            $(function () {
                $("#datepicker").datepicker({
                    changeMonth: true,
                    changeYear: true
                });
            });


            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#blah')
                                .attr('src', e.target.result)
                                .width(100)
                                .height(80);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>
    </head>
    <body>  
        <div id="container">
            <form  action="<?php echo site_url('controller/insert_stdInfo'); ?>" method="post" enctype="multipart/form-data">
                <h1>Student form</h1>
                <div class="line"><label for="username">Student name: </label><input type="text" id="name" name="name" /></div>
                <div class="line"><label for="username">University: </label>
                    <select name="unv">
                        <?php foreach ($uv as $d) { ?>
                            <option value="<?php echo $d->id ?>"><?php echo $d->uvn_name ?></option>
                        <?php } ?>
                    </select> 
                </div>
                <div class="line"><label for="username">Department: </label>
                    <select name="dept">
                        <?php foreach ($department as $d) { ?>
                            <option value="<?php echo $d->id ?>"><?php echo $d->dept_name ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="line"><label for="email">Email: </label><input type="email" id="email" name="email" /></div>
                <div class="line"><label for="pwd">Password: </label><input type="password" id="pwd" name="password" /></div>
                <div class="line"><label for="tel">Telephone: </label><input type="text" id="tel" name="phone" /></div>
                <div class="line"><label for="dob">Date of Birth: </label><input type="text" id="datepicker" name="dob"/></div>
                <div class="line"><label for="add">Address: </label><textarea name="add"> </textarea></div>
                <div class="line"><label for="ptc">Post Code: </label><input type="text" id="ptc" name="postcode" /></div>
                <div class="line"><label for="ptc">Image Upload: </label><input type="file" name="fileToUpload" id="fileToUpload" onchange="readURL(this);">
                    <img id="blah" src="" alt=" " style=" float:bottom; margin-left: 30px;margin-left: 141px" />
                </div>
                <div> <label>Genders</label> 
                    <?php foreach ($gender as $d) { ?>
                        <input type="radio" name="sex" value="<?php echo $d->id ?>"><?php echo $d->gender_name ?>
                    <?php } ?>
                </div>
                <div> <label>Meritial Status</label>
                    <?php foreach ($status as $d) { ?>
                        <input type="checkbox" name="status" value="<?php echo $d->id ?>"><?php echo $d->status_name ?>
                    <?php } ?>
                </div>
                <div class="line submit"><input type="submit" value="Submit" /></div> 
            </form>
        </div>
    </body>
</html>