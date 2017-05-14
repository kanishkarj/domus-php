
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- loading libraries -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../../css/create.css">
    <link rel="stylesheet" href="../../css/common.css">


    <title>
        Domus
    </title>
</head>
<body>
    <header>
        <nav class="nav-bar navbar-light">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="../../index.html">Domus</a>
                </div>
                <ul class="nav navbar-nav">
                    <li class=""><a href="php/create.php">Create</a></li>
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
        <div id="search" >
            <form id="search-form"  role="search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
                    <div class="input-group-btn">
                        <button class="btn btn-default" id="srch-btn" onclick="srch_onClick()">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
</header>
    <div id="title-bar">
        <h1>Create a new project</h1>
    </div>
    <form id="create-form" class="form-horizontal" method="post" action="create.php" enctype="multipart/form-data">
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Your name :</label>
            <div class="col-sm-10">
                <input type="text" required="required" class="form-control" name="name" id="name" placeholder="Name">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="title">Title :</label>
            <div class="col-sm-10">
                <input type="text" required="required" class="form-control" name="title" id="title" placeholder="Title">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="desc">Describe your project :</label>
            <div class="col-sm-10">
                <textarea class="form-control"  required="required" rows="15" name="desc" id="desc" placeholder="Description"></textarea>
            </div>
        </div>

        <fieldset>
            <legend>Images </legend>
            <h6>The first image will be used as your project cover.</h6>
            <a onClick="add_img()">
                <span class="glyphicon glyphicon-plus-sign" style="font-size: 2em;"></span>
                <h4> ^ Add more images</h4>
            </a>
            <br><br>
            <ol name="images" id="images">
                <li>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="img1">Select image to upload: :</label>
                        <div class="col-sm-10">
                            <input type="file" required="required" accept="image/*" name="img1" id="img1">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="desc1">Short description of image :</label>
                        <div class="col-sm-10">
                            <input type="text" required="required" name="img_desc1" class="form-control" id="desc1" placeholder="Description">
                        </div>
                    </div>
                </li>
            </ol>

        </fieldset>
        <hr>
        <br>

        <fieldset>
            <legend>Contact </legend>
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Email:</label>
                <div class="col-sm-10">
                    <input type="email" required="required"  class="form-control" name="email" id="email" placeholder="Email">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="ph_no">Phone No.(optional) :</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="ph_no" name="ph_no" placeholder="Ph no.">
                </div>
            </div>
        </fieldset>
        <hr>
        <div class="form-group">
            <label class="control-label col-sm-2" for="week_no">How many weeks are you going to recruit for ? :</label>
            <div class="col-sm-10">

                <select name="week_no" required="required"  id="week_no">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="ppl_no">How many people are you recruiting(leave empty if not applicable)? :</label>
            <div class="col-sm-10">
                <input type="number"  class="form-control" name="ppl_no" id="ppl_no" placeholder="Enter a no.">
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
                <button type="button" class="btn btn-default" onclick="submit_click()">Submit</button>
            </div>
        </div>
</form>

    <footer class="col-lg-12">
        <h4>Domus</h4>
        <a target="_blank" href="https://github.com/kanishkarj/domus"><i class="fa fa-github" aria-hidden="true"></i></a>
    </footer>

    <script src="../../js/jquery.js"></script>
    <script src="../../js/create.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/common.js"></script>
    <script src="../../js/index.js"></script>
    <script src="../../js/fontawesome.js"></script>

</body>
</html>

<?php
/**
 * Created by PhpStorm.
 * User: kanishkarj
 * Date: 8/4/17
 * Time: 3:10 PM
 */
include('../controllers/functions.php');
//checks if the submit button has been pressed or not.
if (!empty($_POST))
    uploadData();// uploads the entry from the user into the database.
?>