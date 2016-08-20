<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        @include("layouts.blocks.head")

    </head>
    <body>
        <div class="container-fuild">

            @include("layouts.blocks.header")


            <!-- CONTAINER -->
            <div class="container">
                <div class="row">
                    <!-- START SIDEBAR -->
                    <div class="sidebar"> 
                        @include("layouts.blocks.sidebar") 
                    </div>
                    <!-- END SIDEBAR -->

                    <!-- START CONTENT -->
                    <div class="content">
                        @include("layouts.blocks.content") 
                    </div>
                    <!-- END CONTENT -->
                </div>
            </div>

            <!-- START FOOTER -->
            <div class="footer">
                @include("layouts.blocks.footer") 
            </div>
            <!-- END FOOTER -->
        </div>
        @yield("scripts")
    </body>
</html>
