@extends('layout.master')

@section('additionalCSS')
    {{ HTML::style('/public/assets/css/module-template.css') }}
    {{ HTML::style('/public/assets/css/jquery.scrollbar.css') }}
    <!--<script type="text/javascript" src="/public/assets/js/jquery-ui-1.10.3.custom.js"></script>-->
    <!--<script type="text/javascript" src="/public/assets/lib/simulator/jquery-2.1.1.js"></script>-->
    <script type="text/javascript" src="/public/assets/css/simulator/custom-theme/jquery-ui.min.js"></script>

@stop

@section('content')
    <!--<script type="text/javascript" src="/public/assets/lib/simulator/jquery-2.1.1.js"></script>-->
    <!--<script type="text/javascript" src="/public/assets/css/simulator/custom-theme/jquery-ui.js"></script>-->
    <script type="text/javascript" src="/public/assets/lib/simulator/three.js"></script>
    <script type="text/javascript" src="/public/assets/lib/simulator/context_menu/jquery.contextMenu.js"></script>
    {{--<script type="text/javascript" src="/public/assets/lib/simulator/jquery.appendGrid-1.5.2.js"></script>--}}

    <script src="/public/assets/lib/simulator/THREEx.FullScreen.js"></script>
    <script src="/public/assets/lib/simulator/THREEx.KeyboardState.js"></script>
    <script src="/public/assets/lib/simulator/THREEx.WindowResize.js"></script>
    <script src="/public/assets/lib/simulator/Detector.js"></script>

    <script type="text/javascript" src="/public/assets/js/simulator/DLD.js"></script>
    <script type="text/javascript" src="/public/assets/js/simulator/AJmatrix.js"></script>
    <script type="text/javascript" src="/public/assets/js/simulator/element_node.js"></script>
    <script type="text/javascript" src="/public/assets/js/simulator/utilities.js"></script>
    <script type="text/javascript" src="/public/assets/js/simulator/SIM_counters.js"></script>
    <script type="text/javascript" src="/public/assets/js/simulator/Simulator.js"></script>
    <script type="text/javascript" src="/public/assets/js/simulator/data_table.js"></script>

    <!--<script type="text/javascript" src="js/senario_light.js"></script>-->
    <script type="text/javascript" src="/public/assets/js/simulator/DLDtools.js"></script>
    <script type="text/javascript" src="/public/assets/js/simulator/DLD_counter.js"></script>
    <script type="text/javascript" src="/public/assets/js/simulator/DLD_resets.js"></script>
    <script type="text/javascript" src="/public/assets/js/simulator/DLD_math.js"></script>
    <script type="text/javascript" src="/public/assets/js/simulator/DLD_mcr.js"></script>
    <script type="text/javascript" src="/public/assets/js/simulator/DLD_jmp.js"></script>
    <script type="text/javascript" src="/public/assets/js/simulator/DLD_lbl.js"></script>
    <script type="text/javascript" src="/public/assets/js/simulator/DLD_tnd.js"></script>
    <script type="text/javascript" src="/public/assets/js/simulator/SIM_math.js"></script>

    <script type="text/javascript" src="/public/assets/js/simulator/jquery_widgets_control.js"></script>

    <link href="/public/assets/css/simulator/custom-theme/jquery-ui.css" rel="stylesheet">
    <link href="/public/assets/css/simulator/jquery.contextMenu.css" rel="stylesheet" type="text/css"/>
    <link href="/public/assets/css/simulator/simulator.css" rel="stylesheet" type="text/css"/>
    <link href="/public/assets/css/simulator/sim_counter.css" rel="stylesheet" type="text/css"/>
    <link href="/public/assets/css/simulator/sim_math.css" rel="stylesheet" type="text/css"/>
    {{--<link rel="stylesheet" type="text/css" href="/public/assets/css/simulator/jquery.appendGrid-1.5.2.css"/>--}}

    <script type="text/javascript" src="/public/assets/js/simulator/m4_ex/verification_common.js"></script>
    <script type="text/javascript" src="/public/assets/js/simulator/m4_ex/m4_ex_setup.js"></script>
    <script type="text/javascript" src="/public/assets/js/simulator/m4_ex/m4_ex.js"></script>


    <div class="fixed-mask">
        <table class="grid" border="0">
            <tbody>
            <tr>
                <td class="left-cell" valign="top" style="padding:0">
                    <div class="top-bar">
                        <div class="center-content">
                            <div style="display: block; margin-left: 30px;" id="btn-lessons"
                                 class="btn-group pull-left">
                                <button type="button" class="btn btn-sm btn-default dropdown-toggle"
                                        data-toggle="dropdown">
									<span>
										Sections
										<b class="caret"></b>
									</span>
                                </button>

                                <ul class="dropdown-menu" id='section-menu' role="menu">
                                    @yield('section-menu')
                                </ul>
                            </div>
                        </div>

                        <div id="min-left" class="arrows" title="Slide Left" data-placement="left" data-toggle="tooltip"
                             style="color: rgb(90, 97, 101); float: right; margin-right: 0px;">
                            <span id="min-icon" class="glyphicon glyphicon-chevron-left"></span>
                        </div>
                    </div>

                    <div class="content content-view wt">
                        <div class="mywrapper center-content"
                             style="border-left: 1px solid #D9D9D9; border-right: 1px solid #D9D9D9">
                            <div style="height:62%; border-bottom: 1px solid #D9D9D9">
                                <div class="scrollable scrollbar-macosx">
                                    <div class="content ">
                                        @yield('lesson')
                                    </div>
                                </div>
                            </div>

                            <div style="height:38%; border-bottom: 1px solid #D9D9D9;">
                                <div class="scrollable scrollbar-macosx">
                                    <div class="content" style="background-color: #F0FAFF">
                                        @yield('instructions')
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </td>
                <td class="right-cell wt" valign="top" style="padding:0">
                    <div class="mywrapper">
                        <div class="exercise-panel">
                            <div id="min-right" class="arrows" data-toggle="tooltip" data-placement="right"
                                 title="Slide Right">
                                <span id="min-icon" class="glyphicon glyphicon-chevron-right"></span>
                            </div>
                        </div>
                        <div id="editor">
                            <div class="exercise-pane center-content" style="min-height:400px">
                                @yield('exercise')
                            </div>
                        </div>
                        <div class="submit-panel">
                            <div class="submit-drag">
                            </div>
                            <div class="eval-nav center-content">
                                {{-- @yield('submit', '<button id="submit" class="btn btn-primary" type="button">Submit Answers</button>') --}}
                                <!-- <button id="continue" class="btn btn-success" type="button">Continue</button> -->
                                <button id="trouble_btn" class='btn btn-success' type='button'>Having Trouble</button>

                                <button class='continue btn btn-success' type='button'>Continue</button>
                                {{--<div id='submit-new' class='submit-section'>--}}
                                    {{--<!-- Case: section has not been submitted -->--}}
                                    {{--<button class="@yield('submit-class', 'submit') btn btn-primary" type='button'>--}}
                                        {{--Submit--}}
                                    {{--</button>--}}
                                {{--</div>--}}

                                {{--<div id='submit-correct' class='submit-section'>--}}
                                    {{--<!-- Case: section has been correctly answered previously -->--}}
                                    {{--<button class="@yield('submit-class', 'submit') btn btn-success" type='button'><span--}}
                                                {{--class="glyphicon glyphicon-ok"></span> Resubmit--}}
                                    {{--</button>--}}
                                    {{--<button class='continue btn btn-success' type='button'>Continue</button>--}}
                                {{--</div>--}}

                                {{--<div id='submit-incorrect' class='submit-section'>--}}
                                    {{--<!-- Case: sectino hs been incorrectly answered previously -->--}}
                                    {{--<button class="@yield('submit-class', 'submit') btn btn-danger" type='button'><span--}}
                                                {{--class="glyphicon glyphicon-remove"></span> Resubmit--}}
                                    {{--</button>--}}
                                    {{--<button class='continue btn btn-danger' type='button'>Skip <span--}}
                                                {{--class="glyphicon glypihcon-step-forward"></span></button>--}}
                                    {{--<label style="color: #d9534f">Incorrect. You may try again, or skip to the next--}}
                                        {{--section</label>--}}
                                {{--</div>--}}

                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

@stop

@section('script')
    {{ HTML::script('/public/assets/js/jquery.scrollbar.min.js') }}
    <script type="text/JAVASCRIPT">
        $(document).ready(function() {
            $('.scrollbar-macosx').scrollbar();
            $('.result').tooltip({
                placement: 'auto bottom',
                trigger: 'hover focus',
                title: 'javascript tooltip'
            });

            $(".label").hide();
            //init tooltip
            $('[data-toggle="tooltip"]').tooltip();

            // display correct submit button grouping
            $('.submit-section').hide();
            @if($submitstatus == 1)
            $('#submit-correct').show();
            @elseif($submitstatus == 0)
            $('#submit-incorrect').show();
            @else
           $('#submit-new').show();
            @endif

            $(".fixed-mask").css('bottom', '0px');
       });

        $("#min-left").click( function() {
            if($("#min-right").hasClass("minimized")) {
                $(".content").fadeOut(function() {
                    $(".right-cell").css("width", "62%");
                    $(".content-view").css("width", "38%");

                }).delay(500).fadeIn();

                $("#editor").delay(1100).queue(function() {
                    $("#editor").toggleClass("minimize-editor").dequeue();
                });

                $("#min-right").toggleClass("minimized");
            }
            else {
                $(".top-bar").fadeOut();
                $(".content").fadeOut(function() {
                    $(".right-cell").css("width", "100%");
                    $(".lesson-view").css("width", "0%");
                });
                $("#min-left").toggleClass("minimized");
            }

        });

        $("#min-right").click( function() {
            if($("#min-left").hasClass("minimized")) {
                $(".right-cell").css("width", "62%");
                $(".content-view").css("width", "38%");
                $(".content").delay(600).fadeIn();
                $(".top-bar").delay(600).fadeIn();

                $("#min-left").toggleClass("minimized");
            }
            else {
                $(".content").fadeOut(function() {
                    $("#editor").toggleClass("minimize-editor");
                    $(".right-cell").css("width", "0%");
                    $(".content-view").css("width", "100%");
                }).delay(500).fadeIn();
                $("#min-right").toggleClass("minimized");
            }


        });

        $(".lesson.remove").click( function() {
            var id = $(this).attr("data-target");
            var target = "span[id="+ id +"]";
            var previous = "span[id="+$(".active").attr("id")+"]";

            if(! $(target).hasClass("active")) {
                $(previous).fadeOut( function() {
                    $(target).fadeIn();
                    $(target).addClass("active");
                    $(".scrollable").scrollTop(0);
                });
                $(previous).removeClass("active");
                $("#submit").attr("form", id);
            }
        });

        $(".submit").click(function() {
            var form = $('#exercise');
            var values = $(form).serialize();
            $.ajax({
                url: "{{URL::to('modules/submit/'.$sec->id)}}",
                type: "post",
                data: values,
                dataType: "json",
                success: function(data) {
                    var currentSuccess = 1;
                    data.forEach(function(entry) {
                        if (entry[1] != 'success') {
                            currentSuccess = 0;
                        }
                        var question = "#question" + entry[0];
                        var label = question + " .label-" + entry[1];
                        $(label).show();
                        $(label).siblings().hide();
                        $(question).removeClass();
                        $(question).addClass('has-' + entry[2]);
                    });
                    // $('#continue').show();
                    if (currentSuccess) {
                        $('.submit-section').hide();
                        $('#submit-correct').show();
                    } else {
                        $('.submit-section').hide();
                        $('#submit-incorrect').show();
                    }
                },
                error: function(data) {
                    alert("An unexpected error has occured. Please try submitting the form again.");
                }
            });

        });

        $('.continue').click(function() {
            @if($next)
            window.location.replace("{{URL::to('/modules/'.$mod->url_name.'/'.$next->url_name)}}");
            @else
            window.location.replace("{{URL::to('modules')}}");
            @endif
        });

        $(".btn-vertical").click( function() {
            var num = +($("#decimalNum").text());

            if($(this).attr('id') == "btn-up") { num += 1; }
            else                               { num -= 1; }

            if(num >= 255) {
                $("#btn-up").prop("disabled", true);
                num = 255;
            }
            else {
                $("#btn-up").prop("disabled", false);
            }

            if(num <= 0) {
                $("#btn-down").prop("disabled", true);
                num = 0;
            }
            else {
                $("#btn-down").prop("disabled", false);
            }

            $("#decimalNum").text(num);

            var binary = num.toString(2);
            for (i = 8; i > binary.length; i--) {
                var bit = "#bit"+(i-1);
                $(bit).text(0);
            }
            for (i = 0; i < binary.length; i++) {
                var index = binary.length - 1 - i;
                var bit = "#bit"+(index);
                $(bit).text(binary.charAt(i));
            }
        });

        function submit_post(correct) {
            var crypt = ["{{Crypt::encrypt('1'.uniqid())}}"];
            var question = [String(correct)];
            if (correct) {
                $('.submit-section').hide();
                $('#submit-correct').show();
            } else {
                $('.submit-section').hide();
                $('#submit-incorrect').show();
            }
            $.ajax({
                url: "{{URL::to('modules/submit/'.$sec->id)}}",
                type: "post",
                data: {crypt:crypt, question:question},
                dataType: "json",
                success: function(data) {
                    $('#continue').show();
                },
                error: function(data) {
                    alert("An unexpected error has occured. Please try submitting the form again.");
                }
            });
        }



    </script>

    @yield('additional_script')
@stop

