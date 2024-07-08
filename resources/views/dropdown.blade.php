<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style type="text/css">
        @import url('https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            background-image: linear-gradient(to right, blue, cyan);
        }

        nav {
            width: 95%;
            height: 710px;
            margin: 25px auto;
            background: white;
            border-radius: 5px;
            overflow: hidden;
        }
        aside {
            width: 20%;
            height: 100%;
            background: #000d33;
            float: left;
        }

        aside h1 img {
            width: 51px;
            float: left;
        }

        aside h1 span {
            font-size: 30px;
            line-height: 30px;
            margin-left: 6px;
            color: #fff;
        }

        aside ul {
            padding: 5px 0 5px 30px;
        }

        aside ul li {
            list-style: none;
            font-weight: bold;
            margin: 20px auto;
            position: relative;
            overflow: hidden;
            max-height: 35px;
            line-height: 35px;
            transition: 1s;
            text-transform: capitalize;
        }
        aside ul:first-child li{
            max-height: 50px;
        }
        aside ul li:hover {
            background: #d1d1d173;
        }
        aside ul:first-child li:hover {
            background: none;
        }

        aside ul li a {
            text-decoration: none;
            color: wheat;
        }

        aside ul li a li {
            width: 30px;
            padding: 5px;
            margin-right: 10px;
        }

        aside ul li a.fa-angle-right {
            position: absolute;
            right: 0;
            top: 5px;
            transition: 0.5s;
        }
        aside ul li>ul {
            padding: 1px;
            margin: 0 0 0 2px;
        }

        aside ul li>ul li {
            height: 25px;
            line-height: 20px;
            font-size: 16px;
            padding: 1px 1px 1px 20px;
            font-weight: normal;
            margin: 0 0 0 2px;
            border-left: 1px solid #fff0f0;
            margin: 5px;
            color: #fff0f0;
            cursor: pointer;
        }

        aside ul li>ul li a,
        aside ul li:target>ul li a{
            background: transparent;
        }

        aside ul li:target {
            max-height: 300px;
            border-radius: 5px 0 0 5px;
        }

        aside ul li:target a {
            color: #444;
            display: inherit;
            background: #fff;
        }

        aside ul li:target a i.fa-angle-right{
           transform: rotate(90deg);
           top: 10px;
        }

        aside ul li:target:hover {
            background: initial;
        }
    </style>
</head>
<body>


    <nav>
        <aside>
            <ul>
                <li>
                    <h1><img src="wojrklccd894zgpoapwsfkj0jusn.png" alt=""><span>Coding</span></img></h1>
                </li>
            </ul>
            <ul>
                <li id="home">
                    <a href="#home">
                        <i class="fa fa-home"></i>
                        <span>Coding</span>
                        <i class="fa fa-angle-right"></i>
                    </a>
                    <ul>
                        <li><p>Commercials</p></li>
                        <li><p>Products</p></li>
                        <li><p>Other</p></li>
                    </ul>
                </li>
            </ul>
            <ul>
                <li id="ecom">
                    <a href="#ecom">
                        <i class="fa fa-shopping-cart"></i>
                        <span>E-Commerce</span>
                        <i class="fa fa-right"></i>
                    </a>
                    <ul>
                        <li><p>Products</p></li>
                        <li><p>Credit</p></li>
                        <li><p>Sell</p></li>
                    </ul>
                </li>
                 <li id="comp">
                    <a href="#comp">
                        <i class="fa fa-diamond"></i>
                        <span>Components</span>
                        <i class="fa fa-right"></i>
                    </a>
                    <ul>
                        <li><p>gemeral</p></li>
                        <li><p>panels</p></li>
                        <li><p>table</p></li>
                    </ul>
                </li>
            </ul>


        </aside>

        </header>
    </nav>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>
</html>
