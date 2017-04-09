<?php
/**
 * Created by PhpStorm.
 * User: kanishkarj
 * Date: 8/4/17
 * Time: 3:10 PM
 */
include('functions.php');
if (!empty($_POST))
    uploadData();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- loading libraries -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../css/create.css">
    <script src="../js/jquery.js"></script>
    <script src="../js/create.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/common.css">
    <script src="../js/common.js"></script>
    <script src="../js/index.js"></script>
    <script src="https://use.fontawesome.com/4b257711cc.js"></script>
    <title>
        Domus
    </title>
</head>
<body>
    <header>
    <nav class="nav-bar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="../index.html">Domus</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Create</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a onClick="a_onClick()" href="#">
                        <span class="glyphicon glyphicon-search"></span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>
    <div id="search" >
    <form role="search">
        <div class="input-group">
            <input style="border-radius: 0px;" type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit">
                    <i class="glyphicon glyphicon-search"></i>
                </button>
            </div>
        </div>
    </form>
</div>
    <div id="title-bar">
        <h1>Create a new project</h1>
    </div>
    <form class="form-horizontal" method="post" action="create.php" id="form-create" enctype="multipart/form-data">
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Name of the uploader:</label>
            <div class="col-sm-10">
                <input type="text" required="required" class="form-control" name="name" id="name" placeholder="Enter name">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="title">Title of the project :</label>
            <div class="col-sm-10">
                <input type="text" required="required" class="form-control" name="title" id="title" placeholder="Enter title">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="desc">What project about ? :</label>
            <div class="col-sm-10">
                <textarea class="form-control"  required="required" rows="15" name="desc" id="desc" placeholder="Enter the description"></textarea>
            </div>
        </div>

        <fieldset>
            <legend>Images </legend>
            <a onClick="add_img()" href="#">
                <span class="glyphicon glyphicon-plus-sign" style="font-size: 2em;"></span>
            </a>
            <br><br>
            <ul name="images" id="images">
                <li>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="img1">Select image to upload: :</label>
                        <div class="col-sm-10">
                            <input type="file" required="required" name="img1" id="img1">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="desc1">Short description of image :</label>
                        <div class="col-sm-10">
                            <input type="text" required="required" name="img_desc1" class="form-control" id="desc1" placeholder="Enter description">
                        </div>
                    </div>
                </li>
            </ul>

        </fieldset>
        <hr>

        <fieldset>
            <legend>Contact </legend>
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Email:</label>
                <div class="col-sm-10">
                    <input type="email" required="required"  class="form-control" name="email" id="email" placeholder="Enter email">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="ph_no">Phone No. :</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="ph_no" name="ph_no" placeholder="Enter phone no.">
                </div>
            </div>
        </fieldset>
        <hr>
        <div class="form-group">
            <label class="control-label col-sm-2" for="week_no">How long will you recruit ? :</label>
            <div class="col-sm-10">
                <input type="number" required="required" class="form-control" name="week_no" id="week_no" placeholder="Enter a no.">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="ppl_no">How many people would work on this project ? :</label>
            <div class="col-sm-10">
                <input type="number" required="required" class="form-control" name="ppl_no" id="ppl_no" placeholder="Enter a no.">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="tags">Tags :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="tags" id="tags" placeholder="Enter tags separated by space">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" onclick="submit_click()" class="btn btn-default" >Submit</button>
            </div>
        </div>
</form>
    <footer class="col-lg-12">
        <h4>Domus</h4>
        <a><i class="fa fa-github" aria-hidden="true"></i></a>
    </footer>
</body>
</html>